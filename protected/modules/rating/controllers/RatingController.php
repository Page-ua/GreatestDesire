<?php

namespace modules\rating\controllers;


class RatingController extends \humhub\modules\content\components\ContentAddonController {

	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
			'acl' => [
				'class'               => \humhub\components\behaviors\AccessControl::className(),
				'guestAllowedActions' => [ 'show-likes' ]
			]
		];
	}
}