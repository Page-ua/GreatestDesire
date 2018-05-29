<?php

use yii\helpers\Html;
use humhub\widgets\RichText;
use humhub\modules\user\models\fieldtype\MarkdownEditor;
use humhub\widgets\MarkdownView;
?>

<?php var_dump($user->profile->getProfileField('firstname')); ?>
<div class="page-content">
    <div class="content-wrap">
        <div class="personal-profile-info">
            <div class="title">Information</div>
            <div class="info-block">
                <div class="item">
                    <div class="label">Gender</div>
                    <div class="text">Male</div>
                </div>
                <div class="item location">
                    <div class="label">From</div>
                    <div class="text">
                        <svg class="icon icon-location">
                            <use xlink:href="./svg/sprite/sprite.svg#location"></use>
                        </svg>
                        Sydney
                    </div>
                </div>
                <div class="item">
                    <div class="label">Birth</div>
                    <div class="text">1998-05-29</div>
                </div>
                <div class="item">
                    <div class="label">Age</div>
                    <div class="text">25</div>
                </div>
            </div>
            <div class="creation-date">
                <div class="label">Joined</div>
                <div class="text">Aug 11, 2009</div>
            </div>
            <div class="description">
                <div class="desc-title">Description</div>
                <div class="text">I am a heavy-bodied tree-kangaroo found in rain forests of the Atherton
                    Tableland Region of Queensland. My status is classified as least concern by the IUCN,
                    although local authorities classify me as rare.  I am named after
                    the Norwegian explorer Carl Sofus Lumholtz.
                </div>
            </div>
            <div class="sub-context-menu">
                <div class="context-menu-btn"><span></span><span></span><span></span></div>
                <ul class="context-menu">
                    <li><a href="#">Edit</a></li>
                    <li><a href="#">Edit 2</a></li>
                    <li><a href="#">Edit 3</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>




<div class="panel panel-default">
    <div
        class="panel-heading"><?php echo Yii::t('UserModule.views_profile_about', '<strong>About</strong> this user'); ?></div>
    <div class="panel-body">
        <?php $firstClass = "active"; ?>
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <?php foreach ($user->profile->getProfileFieldCategories() as $category): ?>
                <li class="<?php echo $firstClass; ?>">
                    <a href="#profile-category-<?php echo $category->id; ?>" data-toggle="tab"><?php echo Html::encode(Yii::t($category->getTranslationCategory(), $category->title)); ?></a>
                </li>
                <?php
                $firstClass = "";
            endforeach;
            ?>
        </ul>
        <?php $firstClass = "active"; ?>
        <div class="tab-content">
            <?php foreach ($user->profile->getProfileFieldCategories() as $category): ?>
                <div class="tab-pane <?php
                echo $firstClass;
                $firstClass = "";
                ?>" id="profile-category-<?php echo $category->id; ?>">
                    <form class="form-horizontal" role="form">
                        <?php foreach ($user->profile->getProfileFields($category) as $field) : ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    <?php echo Html::encode(Yii::t($field->getTranslationCategory(), $field->title)); ?>
                                </label>
                                <?php if (strtolower($field->title) == 'about'): ?>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?php echo RichText::widget(['text' => $field->getUserValue($user, true)]); ?></p>
                                    </div>
                                <?php else: ?>
                                    <div class="col-sm-9">
                                        <?php if ($field->field_type_class == MarkdownEditor::className()): ?>
                                            <p class="form-control-static" style="min-height: 0 !important;padding-top:0;">
                                                <?= MarkdownView::widget(['markdown' => $field->getUserValue($user, false)]); ?>
                                            </p>
                                        <?php else: ?>
                                            <p class="form-control-static"><?php echo $field->getUserValue($user, false); ?></p>                     
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
