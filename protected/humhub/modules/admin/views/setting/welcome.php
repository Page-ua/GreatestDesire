<?php

use humhub\libs\TimezoneHelper;
use yii\widgets\ActiveForm;
use humhub\compat\CHtml;
?>

<div class="panel-body">
    <h4><?= Yii::t('AdminModule.setting', 'Settings start page'); ?></h4>
    <div class="help-block">
        <?= Yii::t('AdminModule.setting', 'Here you can configure public start page of your social network.'); ?>
    </div>

    <br>

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4 col-sm-4"><?= $form->field($model, 'totalRegisters'); ?></div>
        <div class="col-md-4 col-sm-4"><?= $form->field($model, 'conceivedDesires'); ?></div>
        <div class="col-md-4 col-sm-4"><?= $form->field($model, 'successStories'); ?></div>
    </div>



    <?= $form->field($model, 'firstTestimonials'); ?>
    <?= $form->field($model, 'twoTestimonials'); ?>
    <?= $form->field($model, 'threeTestimonials'); ?>
    <?= $form->field($model, 'slides'); ?>



    <?= CHtml::submitButton(Yii::t('AdminModule.views_setting_index', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => ""]); ?>

    <!-- show flash message after saving -->
    <?php \humhub\widgets\DataSaved::widget(); ?>

    <?php ActiveForm::end(); ?>
</div>