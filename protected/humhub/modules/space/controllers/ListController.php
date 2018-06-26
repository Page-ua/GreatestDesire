<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2016 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\space\controllers;

use humhub\components\GeneralController;

class ListController extends GeneralController {

	public function actionIndex() {
		return $this->render('index', [

		]);
	}

}