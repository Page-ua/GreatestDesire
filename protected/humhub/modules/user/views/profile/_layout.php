<?php
$user = $this->context->getUser();
?>




<?= \humhub\modules\user\widgets\ProfileHeader::widget(['user' => $user]); ?>

<?php echo $content; ?>


