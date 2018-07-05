<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\blog\controllers;

use humhub\components\GeneralController;
use humhub\components\Response;
use humhub\modules\blog\models\Blog;
use humhub\modules\content\models\Category;
use Yii;

/**
 * @package humhub.modules_core.blog.controllers
 * @since 0.5
 */
class BlogController extends GeneralController {

	public $submitUrl = 'blog/create';

	public function behaviors()
	{
		return [
			'acl' => [
				'class' => \humhub\components\behaviors\AccessControl::className(),
				'guestAllowedActions' => ['index', 'stream', 'about']
			]
		];
	}

	public function actionIndex() {

		$data = Blog::getAllPublic();

		$category = new Category();
		$category = $category->getAllCurrentLanguage(Yii::$app->language, 'blog');

		return $this->render('list', [
			'articles' => $data['blog'],
			'count' => $data['count'],
			'category' => $category,
			'ajaxUrl' => '/blog/blog/ajax-list',
		]);

	}

	public function actionAjaxList($offset) {
		$data = Blog::getAllPublic($offset);

		$category = new Category();
		$category = $category->getAllCurrentLanguage(Yii::$app->language, 'blog');

		Yii::$app->response->format = Response::FORMAT_JSON;

		$result['html'] = $this->renderPartial('_list', [
			'articles' => $data['blog'],
			'category' => $category,
		]);
		$result['count'] = $data['count'];

		return $result;

	}

	public function actionCreate() {

		$model = new Blog();

		$category = new Category();
		$category = $category->getAllCurrentLanguage(Yii::$app->language, 'blog');

		if ( $model->load( Yii::$app->request->post() ) && $model->validate() && $model->save() ) {

			$this->view->saved();
			$model->saveFiles();
			$model->saveTags();

			return $this->redirect( [ 'view', 'id' => $model->id ] );
		}

		return $this->render( 'create',
			[
				'model' => $model,
				'category'  => $category,
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

		return $this->redirect(['list']);
	}

	protected function findModel($id)
	{
		if (($model = Blog::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}





}
