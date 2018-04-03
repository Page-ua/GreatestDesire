<?php
namespace humhub\modules\tags\models;

use humhub\components\ActiveRecord;
use humhub\modules\desire\models\Desire;

class Tags extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tags';
	}
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title'], 'string', 'max' => 255],
		];
	}
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'title' => 'Title',
		];
	}
	/**
	 * @return \yii\db\ActiveQuery
	 */

	public function getArticles()
	{
		return $this->hasMany(Desire::className(), ['id' => 'desire_id'])
		            ->viaTable('tags_relationship', ['tags_id' => 'id']);
	}

	/**
	 * Returns static class instance, which can be used to obtain meta information.
	 *
	 * @param bool $refresh whether to re-create static instance even, if it is already cached.
	 *
	 * @return static class instance.
	 */
	public static function instance( $refresh = false ) {
		// TODO: Implement instance() method.
}}