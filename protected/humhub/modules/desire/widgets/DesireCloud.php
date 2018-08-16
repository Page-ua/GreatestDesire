<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\desire\widgets;

use humhub\modules\desire\models\Desire;
use Yii;
use yii\helpers\Url;
use humhub\modules\content\components\ContentContainerController;

/**
 * PinLinkWidget for Wall Entries shows a pin link.
 *
 * This widget will attached to the WallEntryControlsWidget and displays
 * the "Pin or Unpin" Link to the Content Objects.
 *
 * @package humhub.modules_core.wall.widgets
 * @since 0.5
 */
class DesireCloud extends \yii\base\Widget
{

	/**
	 * @inheritdoc
	 */
	public function run()
	{

		$desires = Desire::find();
		$desires->orderBy('created_at DESC');
		$desires->limit(10);
		$desires = $desires->all();

		return $this->render('desireCloud', array(
			'desires' => $desires,
		));
	}

}

?>