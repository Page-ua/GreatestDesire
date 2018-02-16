<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 08.02.18
 * Time: 17:22
 */

namespace humhub\modules\user\controllers;


use humhub\components\Controller;
use humhub\modules\admin\models\AdminDesires;
use humhub\modules\admin\models\forms\PagesInfoForm;
use humhub\modules\admin\models\GuestQuestion;
use Yii;

class InfoController  extends Controller{

	public $layout = "@humhub/modules/user/views/layouts/info";
	public $form;

	public function init()
	{
		$this->form = new PagesInfoForm();
		return parent::init();
	}

	public function actionIndex()
	{
		$stories = AdminDesires::find()->limit(9)->orderBy('date DESC')->all();
		return $this->render('index', ['model' => $stories]);
	}

	public function actionView($id)
	{
		$article = AdminDesires::findOne($id);

		return $this->render('article', ['model' => $article]);
	}

	public function actionPolicy()
	{
		$layout = "@humhub/modules/user/views/layouts/info";
		return $this->render('info', ['form' => $this->form->policy]);
	}

	public function actionAnetwork()
	{
		return $this->render('info', ['form' => $this->form->anetwork]);
	}

	public function actionConditions()
	{
		return $this->render('info', ['form' => $this->form->conditions]);
	}

	public function actionFaq()
	{
		return $this->render('info', ['form' => $this->form->faq]);
	}

	public function actionContact()
	{
		$model = new GuestQuestion();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->render('successful_question');
		}

		return $this->render('contact',['model' => $model]);
	}
}