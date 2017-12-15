<?php
\humhub\modules\admin\widgets\AdminMenu::markAsActive(['/admin/blog']);
?>

<?php $this->beginContent('@admin/views/layouts/main.php') ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Yii::t('AdminModule.user', '<strong>Blog</strong>'); ?>
        </div>
<!--        --><?//= \humhub\modules\admin\widgets\BlogMenu::widget(); ?>

        <?= $content; ?>
    </div>
<?php $this->endContent(); ?>