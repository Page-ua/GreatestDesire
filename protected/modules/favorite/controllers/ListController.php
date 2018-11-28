<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\favorite\controllers;

use humhub\components\GeneralController;
/**
 * @package humhub.modules_core.blog.controllers
 * @since 0.5
 */
class ListController extends GeneralController {

	public function behaviors()
	{
		return [
			'acl' => [
				'class' => \humhub\components\behaviors\AccessControl::className(),
				'guestAllowedActions' => ['index', 'stream', 'about']
			]
		];
	}

	public function actionIndex()
	{
		return $this->render('index',
			[

			]);
	}






}
