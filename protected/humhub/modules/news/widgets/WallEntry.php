<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\news\widgets;

/**
 * @inheritdoc
 */
class WallEntry extends \humhub\modules\content\widgets\WallEntry
{

    /**
     * @inheritdoc
     */
    public $editRoute = "/news/news/edit";

    /**
     * @inheritdoc
     */
    public function run()
    {
        return $this->render('wallEntry', array('news' => $this->contentObject, 'justEdited' => $this->justEdited));
    }

}
