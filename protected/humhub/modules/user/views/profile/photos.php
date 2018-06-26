<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 21.06.18
 * Time: 14:46
 */
?>
<div class="content-wrap">
    <div class="personal-profile-photos comments-node">
        <ul class="small-tabs-controls">
            <li class="<?= ($this->context->action->id === 'photos')? 'active': ''; ?>"><a href="<?= $this->context->contentContainer->createUrl('/user/profile/photos'); ?>"><?= $album->title; ?></a></li>
            <li class="<?= ($this->context->action->id === 'favorite-photos')? 'active': ''; ?>"><a href="<?= $this->context->contentContainer->createUrl('/user/profile/favorite-photos'); ?>">Favorite photos</a></li>
        </ul>

        <div class="albums-img-layout">
            <?php $counter = 1; ?>
            <?php foreach($photos as $photo) { ?>

            <div class="item">
                <a href="<?= $this->context->contentContainer->createUrl('/user/profile/photo-one', ['id' => $photo->id]); ?>">
                    <img src="<?= $photo->getSquarePreviewImageUrl(($counter === 1)?true:false); ?>">
                </a>
            </div>
            <?php $counter++; ?>
            <?php } ?>
        </div>


        <div class="footer">
            <?= \humhub\modules\content\widgets\BottomPanelContent::widget(['object' => $album]); ?>
        </div>
        <?= \humhub\modules\comment\widgets\Comments::widget(['object' => $album]); ?>



    </div>
</div>
