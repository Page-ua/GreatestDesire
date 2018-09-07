<?php

use humhub\modules\content\widgets\BottomPanelContent;
use humhub\modules\favorite\widgets\FavoriteLink;
use humhub\modules\like\widgets\LikeLink;
use yii\helpers\Html;
?>


<li class="group">
    <a href="<?php echo $space->getUrl(); ?>">
        <div class="photo">
	        <?php echo \humhub\modules\space\widgets\Image::widget([
		        'space' => $space,
		        'width' => 99,
	        ]); ?>
        </div>
        <div class="group-wrap">
            <div class="title"><a href="<?php echo $space->getUrl(); ?>"><?php echo Html::encode($space->displayName); ?></a></div>
            <div class="text"><?php echo Html::encode($space->description); ?></div>
        </div>
    </a>
    <div class="statistic-info">
        <div class="subscribers"><svg class="icon icon-members"><use xlink:href="./svg/sprite/sprite.svg#members"></use></svg>
            <div class="val"><?= $space->getMemberships()->count(); ?></div>
        </div>
	    <?= LikeLink::widget(['object' => $space, 'mode' => BottomPanelContent::SMALL_MODE]); ?>
	    <?= FavoriteLink::widget(['object' => $space, 'mode' => BottomPanelContent::SMALL_MODE]); ?>
    </div>
</li>