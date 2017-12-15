<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 13.12.17
 * Time: 16:29
 */

namespace humhub\modules\admin\controllers;


use humhub\modules\admin\components\Controller;

class BlogController extends Controller
{
    public function init()
    {
        $this->subLayout = '@admin/views/layouts/blog';
        return parent::init();
    }

    public function actionIndex()
    {
        return $this->redirect(['basic']);
    }

    /**
     * Basic Settings
     */
    public function actionBasic()
    {
//        $form = new \humhub\modules\admin\models\forms\BasicSettingsForm();
//        if ($form->load(Yii::$app->request->post()) && $form->validate() && $form->save()) {
//            $this->view->saved();
//            return $this->redirect(['/admin/setting/basic']);
//        }

        return $this->render('basic');
    }

}