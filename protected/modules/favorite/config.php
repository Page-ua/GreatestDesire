<?php

use humhub\components\ActiveRecord;
use humhub\commands\IntegrityController;
use humhub\modules\like\Module;
use humhub\modules\user\models\User;
use humhub\modules\content\widgets\WallEntryLinks;

return [
	'id' => 'favorite',
	'class' => 'humhub\modules\favorite\Module',
	'namespace' => 'humhub\modules\favorite'
];
?>