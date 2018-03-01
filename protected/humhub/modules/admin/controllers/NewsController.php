<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 16.02.18
 * Time: 18:02
 */

namespace humhub\modules\admin\controllers;


use humhub\modules\admin\components\Controller;

class NewsController extends Controller {

	public function init()
	{
		$this->subLayout = '@admin/views/layouts/guest-question';
		return parent::init();
	}

}