<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 09.02.18
 * Time: 15:16
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<section class="contacts-sec1">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="contacts-sec1_wrap">
					<p class="contacts-sec1_title kaushan">Contact Us</p>
					<p class="contacts-sec1_subtitle">If you have a quastions, please, contact us:</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="contacts-sec2">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="contacts-form_wrap">
						<?php $form = ActiveForm::begin(); ?>

						<div class="contacts-form_item">
							<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
						</div>
						<div class="contacts-form_item">
							<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
						</div>
						<div class="contacts-form_item">
							<?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>
						</div>
						<div class="contacts-form_item">
							<?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
						</div>
						<div class="contacts-form_send">
							<?= Html::submitButton('Send', ['class' => 'btn']) ?>

                        </div>
						<?php ActiveForm::end(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
