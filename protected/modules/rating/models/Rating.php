<?php

namespace humhub\modules\rating\models;


use humhub\modules\content\components\ContentAddonActiveRecord;

class Rating extends ContentAddonActiveRecord {

	public static function tableName() {
		return 'rating';
	}

	public function rules()
	{
		return [
			[['message'], 'safe'],
		];
	}

	public function behaviors()
	{
		return [
			[
				'class' => \humhub\components\behaviors\PolymorphicRelation::className(),
				'mustBeInstanceOf' => [
					\yii\db\ActiveRecord::className(),
				]
			]
		];
	}

	public static function getRating($desire_id)
	{
		return self::findAll(array('desire_id' => $desire_id));
	}

}