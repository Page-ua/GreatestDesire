<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 09.02.18
 * Time: 13:08
 */

namespace humhub\modules\user\widgets;



use humhub\modules\blog\models\Blog;
use humhub\modules\friendship\models\Friendship;
use humhub\modules\gallery\models\Media;
use humhub\modules\polls\models\Poll;
use humhub\modules\space\models\Membership;
use humhub\modules\space\models\Space;
use humhub\modules\user\models\User;

class RightSidebar extends \yii\base\Widget
{


	public function run()
	{
		$user = \Yii::$app->user->getIdentity();

		$userInfo = $user->profile;

		$friends = Friendship::getPartFriends($user, 0, 4);

		$blogs = Blog::getAll(3);

		$media = new Media();

		$media = $media->getMyLastPhoto(9);

		$spaces = $this->getUserSpace($user);

		$polls = $this->getUserPoll($user);

		$statistic = $this->getStatistic();

		return $this->render('rightSidebar', [
			'user' => $user,
			'userInfo' => $userInfo,
			'friends' => $friends,
			'blogs' => $blogs['articles'],
			'media' => $media,
			'spaces' => $spaces,
			'polls' => $polls,
			'statistic' => $statistic,
		]);
	}

	private function getUserPoll($user)
	{
		$polls = Poll::find();

		$polls->where(['created_by' => $user->id]);
		$polls->orderBy('created_at DESC');
		$polls->limit(2);
		return $polls->all();
	}

	private function getUserSpace($user)
	{
		$spaces = Membership::getUserSpaceQuery($user);

		$spaces->limit(3);

		return $spaces->all();
	}

	private function getStatistic()
	{

		$result['members'] = User::find()->count();
		$result['blogs'] = Blog::find()->count();
		$result['polls'] = Poll::find()->count();
		$result['news'] = 0; //TODO Get counted news in to statistic;
		$result['groups'] = Space::find()->count();
		$result['photos'] = Media::find()->count();

		return $result;
	}


}