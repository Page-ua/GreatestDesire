<?php

use yii\helpers\Html;
use humhub\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= Html::encode($this->pageTitle); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php $this->head() ?>
        <?= $this->render('@humhub/views/layouts/head'); ?>

        <link href="<?= $this->theme->getBaseUrl(); ?>/css/main.css" rel="stylesheet">
        <link href="<?= $this->theme->getBaseUrl(); ?>/css/media.css" rel="stylesheet">
        <meta charset="<?= Yii::$app->charset ?>">

        <style>
            body {
                padding-top: 0px;
            }
        </style>

    </head>

    <body>
        <?php $this->beginBody() ?>
        <?= $content; ?>
        <?php $this->endBody() ?>

    </body>

</html>
<?php $this->endPage() ?>
