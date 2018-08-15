<?php

namespace humhub\modules\favorite\widgets;

use humhub\modules\blog\models\Blog;
use humhub\modules\desire\models\Desire;
use humhub\modules\favorite\models\Favorite;
use humhub\modules\gallery\models\CustomGallery;
use humhub\modules\gallery\models\Media;
use humhub\modules\polls\models\Poll;
use humhub\modules\space\models\Space;
use humhub\modules\user\models\User;
use Yii;
use humhub\modules\like\models\Like;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * This widget is used to show a favorite link inside the wall entry controls.
 *
 * @package humhub.modules_core.like
 * @since 0.5
 */
class   TopWindows extends \yii\base\Widget
{


	public function run()
	{

		$user = Yii::$app->user->getIdentity();

		$counts['photo'] = Favorite::getCountObjectsByUser($user, Media::className());

		$counts['gallery'] = Favorite::getCountObjectsByUser($user, CustomGallery::className());

		$counts['blog'] = Favorite::getCountObjectsByUser($user, Blog::className());

		$counts['desire'] = Favorite::getCountObjectsByUser($user, Desire::className());

		$counts['poll'] = Favorite::getCountObjectsByUser($user, Poll::className());

		$counts['space'] = Favorite::getCountObjectsByUser($user, Space::className());

		$latest = Favorite::find();
		$latest->limit(3);
		$latest->orderBy('created_at DESC');
		$latest = $latest->all();

		return $this->render('topWindows', array(
			'user' => $user,
			'counts' => $counts,
			'latest' => $latest,
		));
	}



}

?>