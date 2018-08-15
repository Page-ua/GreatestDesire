<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\favorite\models;

use Codeception\Lib\Generator\Shared\Classname;
use humhub\modules\gallery\models\CustomGallery;
use humhub\modules\user\models\User;
use Yii;
use humhub\modules\content\components\ContentAddonActiveRecord;
use humhub\modules\content\interfaces\ContentOwner;
use humhub\modules\like\notifications\NewLike;

/**
 * This is the model class for table "favorite".
 *
 * The followings are the available columns in table 'favorite':
 * @property integer $id
 * @property integer $target_user_id
 * @property string $object_model
 * @property integer $object_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @package humhub.modules_core.favorite.models
 * @since 0.5
 */
class Favorite extends ContentAddonActiveRecord
{

	/**
	 * @inheritdoc
	 */
	protected $updateContentStreamSort = false;

	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
		return 'favorite';
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
			array(['id', 'object_id', 'target_user_id'], 'integer'),
		);
	}

	public function afterSave( $insert, $changedAttributes ) { }

	public static function getFavoriteContent($objectName, $userId)
	{
		$favorite = (new \yii\db\Query())->from('favorite');
		$object = $objectName::find();
		$object->leftJoin(['f' => $favorite], 'f.object_id = '.$objectName::tableName().'.id');
		$object->andWhere(['f.object_model' => $objectName::className()]);
		$object->andWhere(['f.created_by' => $userId]);


		return $object->all();
	}

	public static function getCountObjectsByUser(User $user, string $classname)
	{
		$query = self::find();
		$query->where(['object_model' => $classname]);
		$query->andWhere(['created_by' => $user->id]);

		return $query->count();
	}

}
