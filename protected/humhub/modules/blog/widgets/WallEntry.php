<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\blog\widgets;

/**
 * @inheritdoc
 */
class WallEntry extends \humhub\modules\content\widgets\WallEntry
{

    /**
     * @inheritdoc
     */
    public $editRoute = "/blog/blog/edit";

    /**
     * @inheritdoc
     */
    public function run()
    {
        return $this->render('wallEntry', array('blog' => $this->contentObject, 'justEdited' => $this->justEdited));
    }

}
