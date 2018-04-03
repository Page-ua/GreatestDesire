<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\like\models;

use Yii;
use humhub\modules\content\components\ContentAddonActiveRecord;

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'like':
 * @property integer $id
 * @property integer $title
 *
 * @package humhub.modules_core.category.models
 * @since 0.5
 */
class Category extends ContentAddonActiveRecord
{

	/**
	 * @inheritdoc
	 */

	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
		return 'category';
	}

	/**
	 * @inheritdoc
	 */
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

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array(['object_model', 'object_id'], 'required'),
		);
	}



}
