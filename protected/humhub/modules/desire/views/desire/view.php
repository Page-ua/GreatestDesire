<?php

use humhub\modules\file\widgets\ShowFiles;
use humhub\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<?= DetailView::widget([
	'model' => $model,
	'attributes' => [
		'id',
		'title',
		[
			'attribute' => 'message',
			'format' => 'html'
		],
		'greatest',
	],
]);

?>
<hr>
<?php
foreach ($model->tags as $tag){
	echo '#'.$tag->title.' ';
}
?>
<hr>
<?php $form = ActiveForm::begin(); ?>

<?php ActiveForm::end(); ?>
<?= ShowFiles::widget(['object' => $model]); ?>
<?= Html::a('Edit', ['desire/update', 'id'=>$model->id]); ?>/<?= Html::a('Delete', ['desire/delete', 'id'=>$model->id]); ?>
