<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\news\controllers;

use humhub\components\GeneralController;
use humhub\components\Response;
use humhub\modules\news\models\News;
use humhub\modules\content\models\Category;
use Yii;

/**
 * @package humhub.modules_core.news.controllers
 * @since 0.5
 */
class NewsController extends GeneralController {

	public $submitUrl = 'news/create';

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

		$data = News::getAllPublic();

		$category = new Category();
		$category = $category->getAllCurrentLanguage(Yii::$app->language, 'news');

		return $this->render('list', [
			'articles' => $data['news'],
			'count' => $data['count'],
			'category' => $category,
			'ajaxUrl' => '/news/news/ajax-list',
		]);

	}

	public function actionAjaxList($offset) {
		$data = News::getAllPublic($offset);

		$category = new Category();
		$category = $category->getAllCurrentLanguage(Yii::$app->language, 'news');

		Yii::$app->response->format = Response::FORMAT_JSON;

		$result['html'] = $this->renderPartial('_list', [
			'articles' => $data['news'],
			'category' => $category,
		]);
		$result['count'] = $data['count'];

		return $result;

	}


	public function actionView( $id ) {

		$model = $this->findModel($id);


		return $this->render( 'view', [
			'model' => $model,
		] );
	}





	protected function findModel($id)
	{
		if (($model = News::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}





}
