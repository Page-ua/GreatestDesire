<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2017 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\desire;

/**
 * Desire Submodule
 *
 * @author Luke
 * @since 0.5
 */
class Module extends \humhub\components\Module
{

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'humhub\modules\desire\controllers';

    /**
     * @inheritdoc
     */
    public function getPermissions($contentContainer = null)
    {
        if ($contentContainer !== null) {
            return [
                new permissions\CreateDesire(['contentContainer' => $contentContainer])
            ];
        }

        return [];
    }

}
