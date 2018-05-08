<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 20.04.18
 * Time: 18:21
 */
?>

<ul id="navigation">
    <li><?= \yii\helpers\Html::a('Discover more about network', ['info/anetwork'], ['data-pjax'=>0]) ?></li>
    <li><?= \yii\helpers\Html::a('Privacy policy', ['info/policy'], ['data-pjax'=>0]) ?></li>
    <li><?= \yii\helpers\Html::a('Terms and Conditions', ['info/conditions'], ['data-pjax'=>0]) ?></li>
    <li><a href="/index.php/user/info">Success storiess</a></li>
    <li><?= \yii\helpers\Html::a('<li>FAQ</li>', ['info/faq'], ['data-pjax'=>0]) ?></li>
    <li><?= \yii\helpers\Html::a('<li>Contact Us</li>', ['info/contact'], ['data-pjax'=>0]) ?></li>
</ul>