<?php

namespace humhub\modules\polls\controllers;

use humhub\components\GeneralController;
use Yii;
use humhub\modules\polls\models\Poll;

/**
 * PollController handles all poll related actions.
 *
 * @package humhub.modules.polls.controllers
 * @since 0.5
 * @author Luke
 */
class ListController extends GeneralController
{

	public function actionIndex()
	{
		return $this->render('index', [

		]);
	}



}
