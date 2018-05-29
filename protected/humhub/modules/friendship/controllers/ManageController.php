<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2016 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\friendship\controllers;


use humhub\modules\desire\models\Desire;
use humhub\modules\user\components\Session;
use Yii;
use yii\data\ActiveDataProvider;

use humhub\modules\user\components\BaseAccountController;
use humhub\modules\friendship\models\Friendship;
use humhub\modules\friendship\models\SettingsForm;
use yii\helpers\ArrayHelper;


/**
 * Membership Manage Controller
 *
 * @author luke
 */
class ManageController extends BaseAccountController
{

	public function actionIndex()
	{
		return $this->redirect(['list']);
	}

	public function actionList()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => Friendship::getFriendsQuery($this->getUser()),
			'pagination' => [
				'pageSize' => 20,
			],
		]);

		return $this->render('list', [
			'user' => $this->getUser(),
			'dataProvider' => $dataProvider
		]);
	}

	public function actionRequests()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => Friendship::getReceivedRequestsQuery($this->getUser()),
			'pagination' => [
				'pageSize' => 20,
			],
		]);

		return $this->render('requests', [
			'user' => $this->getUser(),
			'dataProvider' => $dataProvider
		]);
	}

	public function actionSentRequests()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => Friendship::getSentRequestsQuery($this->getUser()),
			'pagination' => [
				'pageSize' => 20,
			],
		]);

		return $this->render('sent-requests', [
			'user' => $this->getUser(),
			'dataProvider' => $dataProvider
		]);
	}

	public function actionGetNewRequestsCountJson()
	{
		Yii::$app->response->format = 'json';

		$json = array();
		$json['newRequests'] = Friendship::getReceivedRequestsQuery(Yii::$app->user->getIdentity())->count();

		return $json;
	}

	public function actionRequestsList()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => Friendship::getReceivedRequestsQuery($this->getUser()),
			'pagination' => [
				'pageSize' => 5,
			],
		]);

		$requests = $dataProvider->getModels();
		$users = $this->loadDesire($requests);
		return $this->renderAjax('requests-list', ['users' => $users]);
	}

	public function actionOnlineList()
	{

		$online_freinds = Friendship::getOnlineFriends($this->getUser())->all();

		$online_freinds = $this->loadDesire($online_freinds);

		return $this->renderAjax('online-list', ['online' => $online_freinds]);
	}

	public function loadDesire($users) {
		$result = ArrayHelper::getColumn($users, function($element) {

			$element->greatest_desire = Desire::getGreatestDesire($element);

			return $element;
		});

		return $result;
	}

}
