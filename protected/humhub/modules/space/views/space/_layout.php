<?php
/**
 * @var \humhub\modules\space\models\Space $space
 * @var string $content
 */

$space = $this->context->contentContainer;
?>

<?php echo humhub\modules\space\widgets\Header::widget(['space' => $space]); ?>


    <div class="page-content">
	    <?= \humhub\modules\space\widgets\SpaceContent::widget([
		    'contentContainer' => $space,
		    'content' => $content
	    ]) ?>
    </div>

            <?php echo \humhub\modules\space\widgets\Menu::widget(['space' => $space]); ?>

                <?php
                echo \humhub\modules\space\widgets\Sidebar::widget(['space' => $space, 'widgets' => [
                        [\humhub\modules\activity\widgets\Stream::className(), ['streamAction' => '/space/space/stream', 'contentContainer' => $space], ['sortOrder' => 10]],
                        [\humhub\modules\space\modules\manage\widgets\PendingApprovals::className(), ['space' => $space], ['sortOrder' => 20]],
                        [\humhub\modules\space\widgets\Members::className(), ['space' => $space], ['sortOrder' => 30]]
                ]]);
                ?>