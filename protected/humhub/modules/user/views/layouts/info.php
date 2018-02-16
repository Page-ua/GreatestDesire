<?php

use humhub\modules\user\widgets\AuthMenuTop;
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
    <style>
        body {
            padding-top: 0px;
        }
    </style>
	<link href="<?= $this->theme->getBaseUrl(); ?>/css/main.css" rel="stylesheet">
	<meta charset="<?= Yii::$app->charset ?>">
</head>

<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-3">
                <div class="header-logo_holder">
                    <a href="http://gd.page.ua/index.php/user/auth/login" data-pjax="0">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 314.3 169" style="enable-background:new 0 0 314.3 169; fill:#000;" xml:space="preserve">
								<path d="M71.3,0c0.6,0.3,1.1,0.7,1.8,0.9c15.2,3,18.2,16.5,13.3,28.1c-2.8,6.6-5.9,7.6-12.9,4c1.7-3,3.5-5.9,5-9
									c2.1-4.3,3.6-8.9,0.6-13.3c-3.2-4.6-8.4-4.5-13.1-4.2c-12.5,0.9-22.9,6.7-32.1,14.7C22,31.4,13.1,43.5,9.7,58.9
									c-2.6,11.6,1.9,20.4,11.6,22.5c3.1,0.7,6.7,0.3,9.8-0.4c13.3-3.2,24.6-10,33.5-20.5c2.6-3.1,4.2-6.9,6.3-10.4
									c-0.3-0.5-0.7-0.9-1-1.4c-8.6,2-17.2,4.1-25.7,6.1c-1.6-6-0.3-8.7,5-9.4c10.2-1.3,20.5-2.2,30.8-2.9c4.8-0.3,6.1,2.2,4,6.2
									c-8.4,15.9-16.8,31.7-25,47.7c-1.8,3.5-3.8,4.8-7.4,2.7c-3.7-2.2-2.7-4.7-0.8-7.5c3.6-5.4,7.1-10.8,9.8-17.2c-1.5,1-3.1,2-4.6,2.9
									C46.7,83,37.2,88.1,25.9,88.2C5.7,88.3-2.9,77.7,0.8,57.8c5.6-30,31.2-53.3,56.7-56.9c0.6-0.1,1.1-0.6,1.7-0.9C63.3,0,67.3,0,71.3,0
									z"/>
                            <path d="M74.3,169c-2.3-1.5-4.5-2.9-6.2-4c10.2-24,20-47.1,30.3-71.4c-13.9,3-24.7,9.9-35.9,17c-2.1-6-0.8-9.6,3.3-12.8
									C78.5,87.9,93.4,84,109,83.3c9-0.4,18.5-0.1,27.2,2c22.7,5.5,30.8,29,17.3,48.2c-11.2,15.8-27.2,24.7-45.1,30.4
									c-6.9,2.2-14.1,3.4-21.1,5.1C82.9,169,78.6,169,74.3,169z M78.3,162.9c22.8-3.1,42.9-9.3,59.6-23.8c4.2-3.6,7.9-8.2,10.7-13
									c8-13.8,2.3-29.5-13-34c-7-2-14.7-1.6-22.1-1.6c-1.7,0-4,2.7-5,4.6c-7.2,15.2-14.1,30.5-21,45.8C84.4,147.7,81.7,154.7,78.3,162.9z"
                            />
                            <path d="M141.5,65c-2.4,2.8-4.1,5-6.1,6.9c-2.2,2.2-4.5,4.5-7.1,6.2c-6.8,4.5-13.8,1.7-15.9-6.2c-0.6-2.5-0.8-5.1-1.4-9
									c-3.8,5.1-7,9.3-10,13.5c-2.7,3.7-5.5,4-7.5-0.2c-1.4-3.1-2.1-7.1-1.6-10.4c0.9-4.9,3.2-9.6,5-14.7c-6.1,4.4-8.7,13-16.8,14.2
									c-0.4-0.4-0.8-0.8-1.2-1.2c1.3-1.9,2.6-3.9,4-5.8c4.9-6.6,10.8-12.3,12-21.4c0.6-5.2,6.1-6.5,10.6-3.8c2.4,1.4,3.3,3.3,1.1,5.1
									c-5,4.2-3,7.6,0.8,11c0.6,0.5,1,1.3,1.2,1.5c-2.9,4.6-5.7,9-8.4,13.3c0.5,0.4,0.9,0.8,1.4,1.1c5.1-5,10.5-9.8,15.2-15.2
									c4.4-5.1,8.5-9.8,15.8-10c6.6-0.2,10,4.4,8,10.8c-2.4,7.9-9.2,13.1-19.1,14.1c0.6,2.8,1.2,5.4,2.1,9.4c3.5-3.1,6.2-5,8.3-7.4
									c7-8,13.6-16.2,20.5-24.2c2-2.4,4.2-4.9,6.7-6.6c6.6-4.6,12.3-2,12.9,6c0.2,3,0.5,5.3,4,6.3c2.7,0.8,2.8,2.7,1.2,5.1
									c-1.6,2.5-2.9,5.2-4.3,7.9c-0.6,1.3-1,2.8-1.8,5.3c5.9-4.7,11.8-8.1,15.7-13.1c4.1-5.1,6.2-11.7,8.8-16.8c-1.1-2.6-1.9-4.6-3.2-7.8
									c6.9,1.4,8.9-2.4,10.9-6.6c1-2,3.2-4.9,4.5-4.7c2.2,0.3,4.9,2.3,6.1,4.3c0.7,1.2-1.1,3.8-2,6.3c3.4,0,6.9,0,10.5,0
									c3.6,0,7.3,0,10.9,0c0.1,0.4,0.2,0.7,0.3,1.1c-2,0.6-4,1.4-6.1,1.7c-5.1,0.7-10.2,1.6-15.4,1.8c-4.3,0.1-6.6,2.1-8.4,5.7
									c-4.5,9.2-9.1,18.3-13.7,27.5c0.7,0.5,1.3,1,2,1.4c5-4.9,10.6-9.3,14.9-14.8c4.6-5.9,8.7-11.9,17-12.5c7.1-0.4,10.6,4.5,8.3,11.3
									c-2.7,7.8-9,12.5-19,13.6c0.7,2.8,1.3,5.4,2.3,9.7c4.5-4.5,7.9-7.8,11.2-11.1c4.7-4.6,9.4-9.1,13.9-13.9c1.3-1.3,1.7-3.5,2.4-5.3
									c1-2.4,1.6-5.1,2.9-7.3c4-6.5,9.4-6.3,14.1,0.7c-10.2,5.5-10.1,14.4-7.6,24c0.5,2.1,0.9,4.2,1.1,6.4c0.7,7.2-1.6,10.6-7.4,11.3
									c-6.9,0.9-12.1-2.8-13.5-10.8c2.4,1.2,4.2,1.9,5.9,2.9c4.3,2.5,6.8,1.4,6.7-3.6c-0.1-3.7-1-7.4-1.7-12.3
									c-5.6,5.5-10.3,10.3-15.2,14.9c-3.1,2.9-6.1,6.2-9.8,8.3c-5.8,3.4-11.8,0.8-14-5.7c-0.9-2.8-1.2-5.7-1.9-9.4
									c-3.7,4.5-6.9,8.7-10.4,12.6c-1.6,1.8-4,2.8-6,4.2c-1.7-2.7-4-5.2-4.9-8.1c-0.7-2.1,0.4-4.7,0.9-8.7c-3.7,4.8-6.6,8.4-9.3,12.1
									c-3.7,5-6.9,4.8-9.7-0.9c-1-2-1.1-4.3-1.8-7.3c-2.2,3.2-4,6.1-6,8.9c-1.6,2.3-2.4,6-6.6,4.7c-4.1-1.3-7.1-3.8-7.6-8.3
									C141.3,70.7,141.5,68.4,141.5,65z M152.1,70.5c4.7-5.3,9.7-10.4,14.1-15.9c2.5-3.1,1.4-9.8-1.5-13.2C156.3,49,153.6,59.1,152.1,70.5
									z M134.1,45.5c-6.1,1.9-10.2,7.5-10.6,14.2C129.2,57.7,134.3,50.8,134.1,45.5z M227.1,45.4c-7,1.7-11.9,8.4-11.2,14.9
									C221.3,56.6,225.2,52.2,227.1,45.4z"/>
                            <path d="M256.9,143.1c-3.7,5-6.8,9.1-9.8,13.2c-2.8,3.9-5.7,4.1-7.7-0.2c-1.4-2.9-2.1-6.8-1.5-9.9c0.9-5,3.2-9.7,4-15.4
									c-0.6,1-1.2,2.1-1.9,3.1c-6.5,9.2-17.6,14.1-23.1,24.4c-0.4,0.8-4.5,0.6-5.9-0.4c-3.9-2.9-3.6-7.5-2.1-11.4
									c2.2-6.1,4.8-12.1,7.8-17.8c1.9-3.5,5.1-2,7.7-0.3c2.8,1.8,1.8,3.4,0,5.6c-2.7,3.3-4.8,7-7.8,11.5c11.2-4.3,21.5-16.4,23.5-26.8
									c1-4.9,4.6-7.7,8.7-6.7c5,1.2,6,3.8,2.5,7.5c-2.6,2.8-2.6,5.1-0.1,7.7c1.2,1.3,2.4,2.7,3.1,3.5c-3,4.8-5.7,9.2-8.4,13.5
									c0.5,0.4,1,0.8,1.5,1.1c5.3-5.4,10.8-10.6,15.8-16.2c4.2-4.8,8.4-9,15.3-9.1c6.4-0.1,9.7,4.3,8,10.5c-2.1,7.9-9.1,13.3-19.3,14.5
									c0.6,2.7,1.2,5.2,2,8.9c2.6-1.9,4.6-3,6.1-4.6c4.3-4.6,8.3-9.5,12.6-14.2c1.6-1.7,4-2.8,5.6-4.6c1.5-1.6,2.6-3.7,3.5-5.7
									c1.2-2.5,1.6-5.4,3.1-7.8c3.9-6.5,9.7-6.2,14,0.8c-9.5,5.1-10.1,13.4-8,22.6c0.6,2.6,1.3,5.2,1.5,7.8c0.3,4.2,0.4,8.5-4.5,10.5
									c-4.6,1.9-10.7,0.6-13.7-3.2c-1.3-1.6-2-3.6-2.9-5.4c0.3-0.4,0.7-0.8,1-1.2c1.6,0.7,3.2,1.6,4.9,2.2c1.6,0.6,4,1.8,4.9,1.2
									c1.3-1,2.2-3.4,2.1-5.1c-0.1-3.5-1-7.1-1.8-11.7c-5.7,5.7-10.5,10.7-15.5,15.4c-3,2.8-5.9,6-9.5,7.9c-5.9,3.3-11.8,0.6-13.9-5.8
									C257.9,150.3,257.7,147.3,256.9,143.1z M269.3,140.7c6-4.1,9.8-8.6,11.7-15.3C274.4,127,270.2,132.5,269.3,140.7z"/>
                            <path d="M184.7,149.1c1.6,0.8,3.3,1.4,4.9,2.4c4.5,2.7,7.1,1.5,6.9-3.8c-0.1-3.7-1.1-7.3-1.7-11.2c-6,5.7-11.6,10.9-17,16.2
									c-4,3.8-7.8,8.2-14,7.2c-2.2-0.4-5.1-1.6-6.2-3.3c-4.7-7.3-3.6-15,0-22.4c3.6-7.4,8.6-13.6,17.8-14.1c6.7-0.4,10.4,4.4,8.1,10.7
									c-3,8.4-8.7,14.1-19.3,14.1c0.8,3,1.4,5.6,2.3,9.1c2.6-2,4.6-3.2,6.1-4.8c4.4-4.8,8.5-9.8,12.9-14.6c1.4-1.5,3.5-2.4,4.8-3.9
									c1.5-1.8,2.8-3.9,3.8-6c1.3-2.7,1.8-5.7,3.4-8.2c3.8-6,9.9-5.3,13.5,1.4c-8.3,4.5-9.9,11.7-8.2,20.3c0.7,3.4,1.5,6.8,1.8,10.3
									c0.4,4,0.3,8.2-4.2,10.3c-4.2,1.9-10.3,0.9-13.5-2.5c-1.5-1.6-2.4-3.7-3.6-5.6C183.9,150.1,184.3,149.6,184.7,149.1z M165.7,140.4
									c7.6-3.7,12.6-11.3,10.6-15.1C170.2,128.1,167.6,133.4,165.7,140.4z"/>
                            <path d="M267.3,67.1c6-3.3,9.5-9.7,17.5-11.4c-1,1.9-1.3,2.9-2,3.7c-5.2,6.3-10.4,12.6-15.6,18.9c-3,3.7-5.4,3.8-7.5-0.5
									c-1.4-2.9-2.4-7-1.4-9.7c3.9-10.9,8.6-21.6,13-32.3c-0.7-1.5-1.5-3.5-2.9-6.8c7,1.3,9.2-2.5,11.2-7.1c0.8-1.8,3.1-4.6,4.2-4.4
									c2.3,0.4,5,2.2,6.2,4.2c0.7,1.2-1,3.9-1.8,6.4c6.8,0,14.1,0,21.3,0c0.1,0.5,0.1,1.1,0.2,1.6c-4.4,0.7-8.9,2.2-13.3,2
									c-10.3-0.4-16.7,3.9-20.3,13.5c-2.5,6.7-5.8,13.1-8.7,19.6C267.2,65.4,267.3,66.1,267.3,67.1z"/>
                            <path d="M222.5,118.3c2.4-4.7,4.7-9.7,7.6-14.2c0.7-1.1,3.9-1,5.8-0.6c0.7,0.2,1.7,3.2,1.2,4.1c-2.6,4.7-5.6,9.3-8.7,13.7
									c-0.5,0.7-2.8,0.6-4.1,0.3C223.6,121.5,223.3,119.9,222.5,118.3z"/>
							</svg>
                    </a>
                </div>
            </div>
            <div class="col-lg-7 col-sm-9">
                <nav class="header-nav">
                    <?= authMenuTop::widget(); ?>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php $this->beginBody() ?>
<?= $content; ?>
<?php $this->endBody() ?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-4">
                <div class="bottom-logo">
                    <a href="http://gd.page.ua/index.php/user/auth/login" data-pjax="0">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 314.3 169" style="enable-background:new 0 0 314.3 169; fill:#fff;" xml:space="preserve">
							<path d="M71.3,0c0.6,0.3,1.1,0.7,1.8,0.9c15.2,3,18.2,16.5,13.3,28.1c-2.8,6.6-5.9,7.6-12.9,4c1.7-3,3.5-5.9,5-9
								c2.1-4.3,3.6-8.9,0.6-13.3c-3.2-4.6-8.4-4.5-13.1-4.2c-12.5,0.9-22.9,6.7-32.1,14.7C22,31.4,13.1,43.5,9.7,58.9
								c-2.6,11.6,1.9,20.4,11.6,22.5c3.1,0.7,6.7,0.3,9.8-0.4c13.3-3.2,24.6-10,33.5-20.5c2.6-3.1,4.2-6.9,6.3-10.4
								c-0.3-0.5-0.7-0.9-1-1.4c-8.6,2-17.2,4.1-25.7,6.1c-1.6-6-0.3-8.7,5-9.4c10.2-1.3,20.5-2.2,30.8-2.9c4.8-0.3,6.1,2.2,4,6.2
								c-8.4,15.9-16.8,31.7-25,47.7c-1.8,3.5-3.8,4.8-7.4,2.7c-3.7-2.2-2.7-4.7-0.8-7.5c3.6-5.4,7.1-10.8,9.8-17.2c-1.5,1-3.1,2-4.6,2.9
								C46.7,83,37.2,88.1,25.9,88.2C5.7,88.3-2.9,77.7,0.8,57.8c5.6-30,31.2-53.3,56.7-56.9c0.6-0.1,1.1-0.6,1.7-0.9C63.3,0,67.3,0,71.3,0
								z"/>
                        <path d="M74.3,169c-2.3-1.5-4.5-2.9-6.2-4c10.2-24,20-47.1,30.3-71.4c-13.9,3-24.7,9.9-35.9,17c-2.1-6-0.8-9.6,3.3-12.8
								C78.5,87.9,93.4,84,109,83.3c9-0.4,18.5-0.1,27.2,2c22.7,5.5,30.8,29,17.3,48.2c-11.2,15.8-27.2,24.7-45.1,30.4
								c-6.9,2.2-14.1,3.4-21.1,5.1C82.9,169,78.6,169,74.3,169z M78.3,162.9c22.8-3.1,42.9-9.3,59.6-23.8c4.2-3.6,7.9-8.2,10.7-13
								c8-13.8,2.3-29.5-13-34c-7-2-14.7-1.6-22.1-1.6c-1.7,0-4,2.7-5,4.6c-7.2,15.2-14.1,30.5-21,45.8C84.4,147.7,81.7,154.7,78.3,162.9z"
                        />
                        <path d="M141.5,65c-2.4,2.8-4.1,5-6.1,6.9c-2.2,2.2-4.5,4.5-7.1,6.2c-6.8,4.5-13.8,1.7-15.9-6.2c-0.6-2.5-0.8-5.1-1.4-9
								c-3.8,5.1-7,9.3-10,13.5c-2.7,3.7-5.5,4-7.5-0.2c-1.4-3.1-2.1-7.1-1.6-10.4c0.9-4.9,3.2-9.6,5-14.7c-6.1,4.4-8.7,13-16.8,14.2
								c-0.4-0.4-0.8-0.8-1.2-1.2c1.3-1.9,2.6-3.9,4-5.8c4.9-6.6,10.8-12.3,12-21.4c0.6-5.2,6.1-6.5,10.6-3.8c2.4,1.4,3.3,3.3,1.1,5.1
								c-5,4.2-3,7.6,0.8,11c0.6,0.5,1,1.3,1.2,1.5c-2.9,4.6-5.7,9-8.4,13.3c0.5,0.4,0.9,0.8,1.4,1.1c5.1-5,10.5-9.8,15.2-15.2
								c4.4-5.1,8.5-9.8,15.8-10c6.6-0.2,10,4.4,8,10.8c-2.4,7.9-9.2,13.1-19.1,14.1c0.6,2.8,1.2,5.4,2.1,9.4c3.5-3.1,6.2-5,8.3-7.4
								c7-8,13.6-16.2,20.5-24.2c2-2.4,4.2-4.9,6.7-6.6c6.6-4.6,12.3-2,12.9,6c0.2,3,0.5,5.3,4,6.3c2.7,0.8,2.8,2.7,1.2,5.1
								c-1.6,2.5-2.9,5.2-4.3,7.9c-0.6,1.3-1,2.8-1.8,5.3c5.9-4.7,11.8-8.1,15.7-13.1c4.1-5.1,6.2-11.7,8.8-16.8c-1.1-2.6-1.9-4.6-3.2-7.8
								c6.9,1.4,8.9-2.4,10.9-6.6c1-2,3.2-4.9,4.5-4.7c2.2,0.3,4.9,2.3,6.1,4.3c0.7,1.2-1.1,3.8-2,6.3c3.4,0,6.9,0,10.5,0
								c3.6,0,7.3,0,10.9,0c0.1,0.4,0.2,0.7,0.3,1.1c-2,0.6-4,1.4-6.1,1.7c-5.1,0.7-10.2,1.6-15.4,1.8c-4.3,0.1-6.6,2.1-8.4,5.7
								c-4.5,9.2-9.1,18.3-13.7,27.5c0.7,0.5,1.3,1,2,1.4c5-4.9,10.6-9.3,14.9-14.8c4.6-5.9,8.7-11.9,17-12.5c7.1-0.4,10.6,4.5,8.3,11.3
								c-2.7,7.8-9,12.5-19,13.6c0.7,2.8,1.3,5.4,2.3,9.7c4.5-4.5,7.9-7.8,11.2-11.1c4.7-4.6,9.4-9.1,13.9-13.9c1.3-1.3,1.7-3.5,2.4-5.3
								c1-2.4,1.6-5.1,2.9-7.3c4-6.5,9.4-6.3,14.1,0.7c-10.2,5.5-10.1,14.4-7.6,24c0.5,2.1,0.9,4.2,1.1,6.4c0.7,7.2-1.6,10.6-7.4,11.3
								c-6.9,0.9-12.1-2.8-13.5-10.8c2.4,1.2,4.2,1.9,5.9,2.9c4.3,2.5,6.8,1.4,6.7-3.6c-0.1-3.7-1-7.4-1.7-12.3
								c-5.6,5.5-10.3,10.3-15.2,14.9c-3.1,2.9-6.1,6.2-9.8,8.3c-5.8,3.4-11.8,0.8-14-5.7c-0.9-2.8-1.2-5.7-1.9-9.4
								c-3.7,4.5-6.9,8.7-10.4,12.6c-1.6,1.8-4,2.8-6,4.2c-1.7-2.7-4-5.2-4.9-8.1c-0.7-2.1,0.4-4.7,0.9-8.7c-3.7,4.8-6.6,8.4-9.3,12.1
								c-3.7,5-6.9,4.8-9.7-0.9c-1-2-1.1-4.3-1.8-7.3c-2.2,3.2-4,6.1-6,8.9c-1.6,2.3-2.4,6-6.6,4.7c-4.1-1.3-7.1-3.8-7.6-8.3
								C141.3,70.7,141.5,68.4,141.5,65z M152.1,70.5c4.7-5.3,9.7-10.4,14.1-15.9c2.5-3.1,1.4-9.8-1.5-13.2C156.3,49,153.6,59.1,152.1,70.5
								z M134.1,45.5c-6.1,1.9-10.2,7.5-10.6,14.2C129.2,57.7,134.3,50.8,134.1,45.5z M227.1,45.4c-7,1.7-11.9,8.4-11.2,14.9
								C221.3,56.6,225.2,52.2,227.1,45.4z"/>
                        <path d="M256.9,143.1c-3.7,5-6.8,9.1-9.8,13.2c-2.8,3.9-5.7,4.1-7.7-0.2c-1.4-2.9-2.1-6.8-1.5-9.9c0.9-5,3.2-9.7,4-15.4
								c-0.6,1-1.2,2.1-1.9,3.1c-6.5,9.2-17.6,14.1-23.1,24.4c-0.4,0.8-4.5,0.6-5.9-0.4c-3.9-2.9-3.6-7.5-2.1-11.4
								c2.2-6.1,4.8-12.1,7.8-17.8c1.9-3.5,5.1-2,7.7-0.3c2.8,1.8,1.8,3.4,0,5.6c-2.7,3.3-4.8,7-7.8,11.5c11.2-4.3,21.5-16.4,23.5-26.8
								c1-4.9,4.6-7.7,8.7-6.7c5,1.2,6,3.8,2.5,7.5c-2.6,2.8-2.6,5.1-0.1,7.7c1.2,1.3,2.4,2.7,3.1,3.5c-3,4.8-5.7,9.2-8.4,13.5
								c0.5,0.4,1,0.8,1.5,1.1c5.3-5.4,10.8-10.6,15.8-16.2c4.2-4.8,8.4-9,15.3-9.1c6.4-0.1,9.7,4.3,8,10.5c-2.1,7.9-9.1,13.3-19.3,14.5
								c0.6,2.7,1.2,5.2,2,8.9c2.6-1.9,4.6-3,6.1-4.6c4.3-4.6,8.3-9.5,12.6-14.2c1.6-1.7,4-2.8,5.6-4.6c1.5-1.6,2.6-3.7,3.5-5.7
								c1.2-2.5,1.6-5.4,3.1-7.8c3.9-6.5,9.7-6.2,14,0.8c-9.5,5.1-10.1,13.4-8,22.6c0.6,2.6,1.3,5.2,1.5,7.8c0.3,4.2,0.4,8.5-4.5,10.5
								c-4.6,1.9-10.7,0.6-13.7-3.2c-1.3-1.6-2-3.6-2.9-5.4c0.3-0.4,0.7-0.8,1-1.2c1.6,0.7,3.2,1.6,4.9,2.2c1.6,0.6,4,1.8,4.9,1.2
								c1.3-1,2.2-3.4,2.1-5.1c-0.1-3.5-1-7.1-1.8-11.7c-5.7,5.7-10.5,10.7-15.5,15.4c-3,2.8-5.9,6-9.5,7.9c-5.9,3.3-11.8,0.6-13.9-5.8
								C257.9,150.3,257.7,147.3,256.9,143.1z M269.3,140.7c6-4.1,9.8-8.6,11.7-15.3C274.4,127,270.2,132.5,269.3,140.7z"/>
                        <path d="M184.7,149.1c1.6,0.8,3.3,1.4,4.9,2.4c4.5,2.7,7.1,1.5,6.9-3.8c-0.1-3.7-1.1-7.3-1.7-11.2c-6,5.7-11.6,10.9-17,16.2
								c-4,3.8-7.8,8.2-14,7.2c-2.2-0.4-5.1-1.6-6.2-3.3c-4.7-7.3-3.6-15,0-22.4c3.6-7.4,8.6-13.6,17.8-14.1c6.7-0.4,10.4,4.4,8.1,10.7
								c-3,8.4-8.7,14.1-19.3,14.1c0.8,3,1.4,5.6,2.3,9.1c2.6-2,4.6-3.2,6.1-4.8c4.4-4.8,8.5-9.8,12.9-14.6c1.4-1.5,3.5-2.4,4.8-3.9
								c1.5-1.8,2.8-3.9,3.8-6c1.3-2.7,1.8-5.7,3.4-8.2c3.8-6,9.9-5.3,13.5,1.4c-8.3,4.5-9.9,11.7-8.2,20.3c0.7,3.4,1.5,6.8,1.8,10.3
								c0.4,4,0.3,8.2-4.2,10.3c-4.2,1.9-10.3,0.9-13.5-2.5c-1.5-1.6-2.4-3.7-3.6-5.6C183.9,150.1,184.3,149.6,184.7,149.1z M165.7,140.4
								c7.6-3.7,12.6-11.3,10.6-15.1C170.2,128.1,167.6,133.4,165.7,140.4z"/>
                        <path d="M267.3,67.1c6-3.3,9.5-9.7,17.5-11.4c-1,1.9-1.3,2.9-2,3.7c-5.2,6.3-10.4,12.6-15.6,18.9c-3,3.7-5.4,3.8-7.5-0.5
								c-1.4-2.9-2.4-7-1.4-9.7c3.9-10.9,8.6-21.6,13-32.3c-0.7-1.5-1.5-3.5-2.9-6.8c7,1.3,9.2-2.5,11.2-7.1c0.8-1.8,3.1-4.6,4.2-4.4
								c2.3,0.4,5,2.2,6.2,4.2c0.7,1.2-1,3.9-1.8,6.4c6.8,0,14.1,0,21.3,0c0.1,0.5,0.1,1.1,0.2,1.6c-4.4,0.7-8.9,2.2-13.3,2
								c-10.3-0.4-16.7,3.9-20.3,13.5c-2.5,6.7-5.8,13.1-8.7,19.6C267.2,65.4,267.3,66.1,267.3,67.1z"/>
                        <path d="M222.5,118.3c2.4-4.7,4.7-9.7,7.6-14.2c0.7-1.1,3.9-1,5.8-0.6c0.7,0.2,1.7,3.2,1.2,4.1c-2.6,4.7-5.6,9.3-8.7,13.7
								c-0.5,0.7-2.8,0.6-4.1,0.3C223.6,121.5,223.3,119.9,222.5,118.3z"/>
						</svg>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-sm-8">
                <div style="display: inline-block; float: left; margin-top: 10px;">
                    <ul class="bottom-nav">
	                    <?= \yii\helpers\Html::a('<li>Discover more about network</li>', ['info/anetwork'], ['data-pjax'=>1]) ?>
	                    <?= \yii\helpers\Html::a('<li>Privacy policy</li>', ['info/policy'], ['data-pjax'=>1]) ?>
	                    <?= \yii\helpers\Html::a('<li>Terms and Conditions</li>', ['info/conditions'], ['data-pjax'=>1]) ?>

                    </ul>
                </div>
                <div style="display: inline-block; float: left; margin-top: 10px;">
                    <ul class="bottom-nav">
	                    <?= \yii\helpers\Html::a('<li>FAQ</li>', ['info/faq'], ['data-pjax'=>1]) ?>
	                    <?= \yii\helpers\Html::a('<li>Contact Us</li>', ['info/contact'], ['data-pjax'=>1]) ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-lg-offset-0 col-sm-6 col-sm-offset-3">
                <div class="bottom-form_wrap">
                    <form id="bottom-form">
                        <div class="bottom-form_item">
                            <label for="email">E-mail*</label>
                            <input id="email" type="text" name="E-mail">
                            <p class="error-msg" style="display:none;">this field contains incorrect data</p>
                        </div>
                        <div  class="bottom-form_item">
                            <label for="message">Message*</label>
                            <input id="message" type="text" name="Message">
                            <p class="error-msg" style="display:none;">this field contains incorrect data</p>
                        </div>
                        <input class="bot-submit" type="submit" name="Send" value="Send">
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>

</html>
<?php $this->endPage() ?>
