<?php
$user = $this->context->contentContainer;
?>




<?= \humhub\modules\user\widgets\ProfileHeaderDesire::widget(['user' => $user]); ?>

<?php echo $content; ?>


