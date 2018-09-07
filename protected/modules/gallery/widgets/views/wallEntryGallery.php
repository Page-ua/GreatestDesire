<?php
use humhub\modules\file\libs\FileHelper;
use humhub\libs\Html;
?>
<div class="wraper-albums">
<div class="pull-left" style="min-height:133px;">
    <a href="<?= $gallery->content->container->createUrl('/user/profile/photos', ['id' =>$gallery->id]); ?>">

            <img src="<?= $gallery->previewImageUrl; ?>" alt="">

    </a>
</div>

<span></span>

<?php if (!empty($gallery->description)): ?>
	<?= Html::encode($gallery->description); ?>
    <br /><br>
<?php endif; ?>

<small>
	<?php if($gallery->title) : ?>
        <strong><?= Yii::t('GalleryModule.base', 'Gallery:'); ?></strong> <a href="<?php $gallery->content->container->createUrl('/user/profile/photos', ['id' =>$gallery->id]); ?>"><?= Html::encode($gallery->title) ?></a><br />
	<?php endif ?>
    <div class="subtitle"><?= $category; ?></div>
</small><br />


<br />

<?= Html::a(Yii::t('GalleryModule.base', 'Open Gallery'), $gallery->content->container->createUrl('/user/profile/photos', ['id' =>$gallery->id]), ['class' => 'btn btn-sm btn-default', 'data-ui-loader' => '']); ?>

<div class="clearfix"></div>
</div>