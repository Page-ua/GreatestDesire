<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2016 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\user\controllers;

use humhub\modules\blog\models\Blog;
use humhub\modules\content\models\Category;
use humhub\modules\desire\models\Desire;
use humhub\modules\favorite\models\Favorite;
use humhub\modules\user\components\Session;
use humhub\modules\user\models\Profile;
use UserModel;
use Yii;
use humhub\modules\content\components\ContentContainerController;
use humhub\modules\stream\actions\ContentContainerStream;
use humhub\modules\user\models\User;
use humhub\modules\user\widgets\UserListBox;

/**
 * ProfileController is responsible for all user profiles.
 * Also the following functions are implemented here.
 *
 * @author Luke
 * @package humhub.modules_core.user.controllers
 * @since 0.5
 */
class ProfileController extends ContentContainerController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'acl' => [
                'class' => \humhub\components\behaviors\AccessControl::className(),
                'guestAllowedActions' => ['index', 'stream', 'about']
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return array(
            'stream' => array(
                'class' => ContentContainerStream::className(),
                'mode' => ContentContainerStream::MODE_NORMAL,
                'contentContainer' => $this->contentContainer
            ),
        );
    }

    /**
     * User profile home
     * 
     * @todo Allow change of default action
     * @return string the response
     */
    public function actionIndex()
    {
        if ($this->module->profileDefaultRoute !== null) {
            return $this->redirect($this->getUser()->createUrl($this->module->profileDefaultRoute));
            return $this->redirect($this->getUser()->createUrl($this->module->profileDefaultRoute));
        }

        return $this->actionHome();
    }

    public function actionHome()
    {
	    $settings = new \humhub\modules\user\models\forms\AccountSettings();
	    $isProfileOwner = false;
	    $user = $this->user;
	    $settings->status_online = $user->status_online;
	    $settings->info_status = $user->info_status;
	    if(!Yii::$app->user->isGuest) {
		    if ( Yii::$app->user->id == $this->user->id ) {
			    $isProfileOwner = true;
		    } elseif(!$user->status_online) {
			    $online_user = Session::getOnlineUsers();
			    if ( empty( $online_user->andWhere( [ 'user.id' => $this->user->id ] )->all() ) ){
			    	$settings->status_online = 1;
			    }
	        }
	    }

	     if (Yii::$app->request->isAjax)
	     {
		     if ($settings->load(Yii::$app->request->post()) && $settings->validate())
		     {
			     $user->status_online = $settings->status_online;
			     $user->info_status = $settings->info_status;
			     $user->save();
			     $this->view->saved();
			     return $this->asJson('successful');
		     }

	     }

        return $this->render('home', ['user' => $this->contentContainer, 'settings' => $settings, 'isProfileOwner' => $isProfileOwner]);
    }

    public function actionAbout()
    {
        if (!$this->contentContainer->permissionManager->can(new \humhub\modules\user\permissions\ViewAboutPage())) {
            throw new \yii\web\HttpException(403, 'Forbidden');
        }

	    $birthDate = new \DateTime($this->contentContainer->profile->birthday);
	    $lifeSpan = $birthDate->diff(new \DateTime());
	    $age = $lifeSpan->format("%y");

        return $this->render('about', ['user' => $this->contentContainer, 'age' => $age]);
    }

    public function actionBlog()
    {
		$blogListRequest = Blog::find();
	    $blogListRequest->where(['created_by' => $this->contentContainer->id]);
	    $blogListRequest->orderBy('created_at DESC');
	    $blogList = $blogListRequest->all();

	    $category = new Category();
	    $category = $category->getAllCurrentLanguage(Yii::$app->language, 'blog');

    	return $this->render('blog', [
    		'blogList' => $blogList,
		    'category' => $category,
		    'contentContainer' => $this->contentContainer,
		    ]);
    }

	public function actionFavoriteBlog()
	{
		$this->subLayout = "@humhub/modules/user/views/profile/_layoutDesire";

		$blogList = Blog::find();
		$favorite = (new \yii\db\Query())->from('favorite');
		$blogList->leftJoin(['f' => $favorite], 'f.object_id = blog.id');
		$blogList->andWhere(['f.object_model' => Blog::className()]);
		$blogList = $blogList->all();

		$category = new Category();
		$category = $category->getAllCurrentLanguage(Yii::$app->language, 'blog');

		return $this->render('blog', [
			'category' => $category,
			'blogList' => $blogList,
			'contentContainer' => $this->contentContainer,
		]);
	}

    public function actionBlogOne($id)
    {
    	$model = Blog::findOne($id);

	    $category = new Category();
	    $category = $category->getAllCurrentLanguage(Yii::$app->language, 'blog');

    	return $this->render('blogOne', [
			'model' => $model,
		    'category' => $category,
	    ]);
    }

    public function actionDesires()
    {
    	$desireList = '';
	    $this->subLayout = "@humhub/modules/user/views/profile/_layoutDesire";

	    $desireList = Desire::find();
	    $desireList->where(['created_by' => $this->contentContainer->id]);
	    $desireList->andWhere(['<>', 'id', $this->contentContainer->greatest_desire]);
	    $desireList = $desireList->all();

	    $greatestDesire = Desire::getGreatestDesire($this->user);

    	return $this->render('desires', [
    		'desireList' => $desireList,
		    'greatestDesire'    => $greatestDesire,
		    'contentContainer' => $this->contentContainer,
		    ]);
    }

    public function actionFavoriteDesires()
    {
	    $this->subLayout = "@humhub/modules/user/views/profile/_layoutDesire";

	    $desireList = Desire::find();
	    $favorite = (new \yii\db\Query())->from('favorite');
	    $desireList->leftJoin(['f' => $favorite], 'f.object_id = desire.id');
	    $desireList->andWhere(['<>', 'desire.id', $this->contentContainer->greatest_desire]);
	    $desireList->andWhere(['f.object_model' => Desire::className()]);
	    $desireList = $desireList->all();

	    $greatestDesire = Desire::getGreatestDesire($this->user);

	    return $this->render('desires', [
		    'desireList' => $desireList,
		    'greatestDesire'    => $greatestDesire,
		    'contentContainer' => $this->contentContainer,
	    ]);
    }

    public function actionDesireOne($id)
    {
	    $this->subLayout = "@humhub/modules/user/views/profile/_layoutDesire";

	    $model = Desire::findOne($id);

	    $this->contentContainer = User::findOne(['id' => $model->created_by]);

	    return $this->render( 'desireOne', [
		    'model' => $model,
		    'user' => $this->contentContainer,
	    ] );

    }

    public function actionFollow()
    {
        if(Yii::$app->getModule('user')->disableFollow) {
            throw new \yii\web\HttpException(403, Yii::t('ContentModule.controllers_ContentController', 'This action is disabled!'));
        }
        
        $this->forcePostRequest();
        $this->getUser()->follow(Yii::$app->user->getIdentity(), false);

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = 'json';
            return ['success' => true];
        }

        return $this->redirect($this->getUser()->getUrl());
    }

    public function actionUnfollow()
    {
        $this->forcePostRequest();
        $this->getUser()->unfollow();

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = 'json';
            return ['success' => true];
        }

        return $this->redirect($this->getUser()->getUrl());
    }

    public function actionFollowerList()
    {
        $query = User::find();
        $query->leftJoin('user_follow', 'user.id=user_follow.user_id and object_model=:userClass and user_follow.object_id=:userId', [':userClass' => User::className(), ':userId' => $this->getUser()->id]);
        $query->orderBy(['user_follow.id' => SORT_DESC]);
        $query->andWhere(['IS NOT', 'user_follow.id', new \yii\db\Expression('NULL')]);
        $query->active();

        $title = Yii::t('UserModule.widgets_views_userFollower', '<strong>User</strong> followers');
        return $this->renderAjaxContent(UserListBox::widget(['query' => $query, 'title' => $title]));
    }

    public function actionFollowedUsersList()
    {
        $query = User::find();
        $query->leftJoin('user_follow', 'user.id=user_follow.object_id and object_model=:userClass and user_follow.user_id=:userId', [':userClass' => User::className(), ':userId' => $this->getUser()->id]);
        $query->orderBy(['user_follow.id' => SORT_DESC]);
        $query->andWhere(['IS NOT', 'user_follow.id', new \yii\db\Expression('NULL')]);
        $query->active();

        $title = Yii::t('UserModule.widgets_views_userFollower', '<strong>Following</strong> user');
        return $this->renderAjaxContent(UserListBox::widget(['query' => $query, 'title' => $title]));
    }

    public function actionSpaceMembershipList()
    {
        $query = \humhub\modules\space\models\Membership::getUserSpaceQuery($this->getUser());

        if (!$this->getUser()->isCurrentUser()) {
            $query->andWhere(['!=', 'space.visibility', \humhub\modules\space\models\Space::VISIBILITY_NONE]);
        }

        $title = Yii::t('UserModule.widgets_views_userSpaces', '<strong>Member</strong> in these spaces');
        return $this->renderAjaxContent(\humhub\modules\space\widgets\ListBox::widget(['query' => $query, 'title' => $title]));
    }

}

?>
