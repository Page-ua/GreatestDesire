<?php

use humhub\modules\file\libs\FileHelper;
use humhub\modules\file\widgets\FilePreview;
use yii\helpers\Html;

/* @var  $showPreview boolean */
/* @var  $files \humhub\modules\file\models\File[] */
/* @var  $previewImage \humhub\modules\file\converter\PreviewImage */
/* @var  $object \humhub\components\ActiveRecord */
/* @var  $hideImageFileInfo boolean */

?>

<?php if (count($files) > 0) : ?>
<?php if(isset($options['index'])) {
    if(isset($files[$options['index']])) {
        if ($previewImage->applyFile($files[$options['index']])){
	        $arr = array(
		        'height' => isset($options['height'])?$options['height']:100,
		        'width' => isset($options['width'])?$options['width']:100,
		        'mode' => 'force');
	        $previewImage->options = $arr;
	        echo $previewImage->render();
        }
    }
    ?>

    <?php } else {  ?>
	<!-- hideOnEdit mandatory since 1.2 -->
	<div class="hideOnEdit">
		<!-- Show Images as Thumbnails -->

		<?php if($showPreview) :?>
			<div class="post-files" id="post-files-<?= $object->getUniqueId(); ?>">
                <?php $counter = 0; ?>
				<?php foreach ($files as $file): ?>
					<?php if ($previewImage->applyFile($file)): ?>

						<?php if($counter == 0){ ?>
							<?php $arr = array(
								'height' => 130,
								'width' => 65,
								'mode' => 'force');
							$previewImage->options = $arr;
							?>
                            <a data-ui-gallery="<?= "gallery-" . $object->getUniqueId(); ?>" href="<?= $file->getUrl(); ?>#.jpeg" title="<?= Html::encode($file->file_name) ?>">
								<?= $previewImage->render(); ?>
                            </a>
						<?php } ?>
						<?php if($counter == 1 || $counter == 2){ ?>
							<?php $arr = array(
								'height' => 65,
								'width' => 65,
								'mode' => 'force');
							$previewImage->options = $arr;
							?>
                            <a data-ui-gallery="<?= "gallery-" . $object->getUniqueId(); ?>" href="<?= $file->getUrl(); ?>#.jpeg" title="<?= Html::encode($file->file_name) ?>">
								<?= $previewImage->render(); ?>
                            </a>
						<?php } ?>
                        <?php if($counter > 2) { ?>
                            <p><?php echo count($files)-3;
                                break;
                            ?></p>
                        <?php } ?>

					<?php endif; ?>
                <?php $counter++; ?>
				<?php endforeach; ?>

				<?php $playlist = [] ?>



			</div>
		<?php endif; ?>



	</div>

	<?php } ?>
<?php endif; ?>

