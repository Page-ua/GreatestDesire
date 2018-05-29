<?php

namespace humhub\modules\rating\widgets;

use humhub\modules\rating\models\Rating;
use Yii;

class RatingLink extends \yii\base\Widget
{

	public $object;

	public function run()
	{
		$currentUserVoice = false;

		$voices = Rating::getRating($this->object->id);

		$model = new Rating();

		foreach ($voices as $voice) {

			if ($voice->created_by == Yii::$app->user->id) {

				$currentUserVoice = $voice->rating;

			}

		}

		return $this->render('rating-link',['currentUserVoice' => $currentUserVoice, 'model' => $model]);
	}

}