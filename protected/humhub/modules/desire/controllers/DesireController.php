<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\desire\controllers;

use const Couchbase\ENCODER_FORMAT_JSON;
use humhub\components\GeneralController;
use humhub\modules\content\components\ContentContainerController;
use humhub\modules\content\models\Category;
use humhub\modules\desire\models\Desire;
use humhub\modules\user\models\User as UserModel;
use humhub\modules\user\components\User;
use Yii;

/**
 * @package humhub.modules_core.desire.controllers
 * @since 0.5
 */
class DesireController extends GeneralController {

	public $submitUrl = 'desire/create';

	public function behaviors()
	{
		return [
			'acl' => [
				'class' => \humhub\components\behaviors\AccessControl::className(),
				'guestAllowedActions' => ['index', 'stream', 'about']
			]
		];
	}



	public function actionCreate() {

		$model = new Desire();
		$this->setContentSettings($model);

		if ( $model->load( Yii::$app->request->post() ) && $model->validate() && $model->save() ) {

			$this->view->saved();
			$model->saveFiles();
			$model->saveTags();
			$model->saveGreatestDesire();

			return $this->redirect( [ 'view', 'id' => $model->id ] );
		}

		return $this->render( 'create',
			[
				'model' => $model,
				'contentContainer' => $this->contentContainer,
				'submitUrl' => $this->generateSubmitUrl()
			]
		);
	}

	public function actionView( $id ) {

		$model = $this->findModel($id);



		return $this->render( 'view', [
			'model' => $model,
		] );
	}

	public function actionUpdate( $id ) {

		$model = $this->findModel( $id );

		if ( ! $model->content->canEdit() ) {
			$this->forbidden();
		}

		$this->setContentSettings($model);

		if ( $model->load( Yii::$app->request->post() ) && $model->validate() && $model->save() ) {

			$this->view->saved();
			$model->saveFiles();
			$model->saveTags();

			return $this->redirect( [ 'view', 'id' => $model->id ] );
		}

		return $this->render( 'update',
			[
				'model' => $model,
				'contentContainer' => $this->contentContainer,
				'submitUrl' => $this->generateSubmitUrl()
			]
		);
	}

	public function actionDelete($id)
	{

		$model = $this->findModel( $id );

		if ( ! $model->content->canEdit() ) {
			$this->forbidden();
		}
		$model->delete();
		$user = Yii::$app->user->getIdentity();
		return $this->redirect($user->createUrl('/user/profile/desires'));
	}

	public function actionList()
	{

		//Yii::$app->assetManager->forceCopy = true; // for develepment
		$data = Desire::getAll(10);
		$articles = $data['articles'];
		$count = $data['count'];



		return $this->render('list', [
			'articles' => $articles,
			'count' => $count,
			'ajaxUrl' => '/desire/desire/list-ajax'
		]);
	}

	public function actionListAjax($offset)
	{
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		$data = Desire::getAll(10, $offset);
		$articles = $data['articles'];
		$result['html'] = $this->renderAjax('list-ajax', [
			'articles' => $articles,
		]);
		$result['count'] = count($articles);

		return $result;
	}

	protected function findModel($id)
	{
		if (($model = Desire::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}





}
