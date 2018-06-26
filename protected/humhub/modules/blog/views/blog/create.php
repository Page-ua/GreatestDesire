<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 12.03.18
 * Time: 13:13
 */

use humhub\libs\Html;
use yii\widgets\ActiveForm;

?>
<h2>Write your Greatest Blog</h2>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


<?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'category')->dropDownList($category); ?>
<?=
humhub\modules\file\widgets\UploadButton::widget([
	'id' => 'comment_create_upload_' . $model->id,
	'progress' => '#comment_create_upload_progress_' . $model->id,
	'preview' => '#comment_create_upload_preview_' . $model->id,
	'dropZone' => '#comment_create_form_'.$model->id,
	'max' => Yii::$app->getModule('content')->maxAttachedFiles
]);
?>
<div id="comment_create_upload_progress_<?= $model->id ?>" style="display:none;margin:10px 0px;"></div>

<?=
\humhub\modules\file\widgets\FilePreview::widget([
	'id' => 'comment_create_upload_preview_' . $model->id,
	'options' => ['style' => 'margin-top:10px'],
	'edit' => true
]);
?>
<div class="form-group">
	<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
