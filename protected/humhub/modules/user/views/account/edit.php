<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 04.07.18
 * Time: 15:26
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>

<div class="page-content">
	<div class="content-wrap">
		<div class="profile-settings">
			<div class="base-kaushan-title">Settings</div>
			<?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>
				<div class="profile-info general-info">
					<div class="title">General Info</div>
					<?= $form->field($user->profile, 'firstname',[
					        'options' => [
					                'class' => 'form-item sm-item',
                            ]]); ?>

					<?= $form->field($user->profile, 'lastname',[
					        'options' => [
					                'class' => 'form-item sm-item',
                            ]]); ?>

					<div class="form-item">
                        <label for="desire-input">My Greatest Desire is…</label>
                        <?= $form->field($user->greatestDesire, 'title', [
                                'options' => [
                                        'tag' => false,
                                ]
                        ])->textarea(['id' => 'desire-input'])->label(false); ?>

						<p class="desire-input-desc">You can change it or add a description<a href="<?= Url::to(['/desire/desire/update', 'id' => $user->greatest_desire]); ?>"> here</a></p>
					</div>
					<div class="form-item personal-info">
						<div class="photo">
							<div class="personal-info-label">Add profile photo</div>
							<div class="wrap">
								<div class="img-block"><img src="img/user-1.png"></div><input type="file" data-browse="Select file" data-placeholder=""></div>
						</div>
						<div class="birthday">
							<div class="personal-info-label">Birthday*</div>
							<div class="wrap"><label><svg class="icon icon-calendar"><use xlink:href="./svg/sprite/sprite.svg#calendar"></use></svg>
									<?= \humhub\widgets\DatePicker::widget(['model' => $user->profile, 'attribute' => 'birthday', 'options' => ['id' => 'datepicker']]); ?>
                                </label>
                            </div>
						</div>

						<div class="gender">
							<div class="personal-info-label">Gender*</div>

                            <?= $form->field($user->profile, 'gender',[
                                    'options' => [
                                            'tag' => false,
                                    ]
                            ])->radioList($user->profile->getOptionsField('gender'), ['class' => 'wrap radio-btn-wrap'])->label(false); ?>
						</div>
					</div>
					<div class="form-item pass-change">
						<div class="item-label">Here you can change your password</div>
						<p>To save old password, just leave this field empty. To change, enter new password and confirm it.</p>
					</div>

					<?php if ($changePasswordModel->isAttributeSafe('currentPassword')): ?>
						<?php echo $form->field($changePasswordModel, 'currentPassword',['options' => ['class' => 'form-item sm-item']])->passwordInput(['maxlength' => 45]); ?>
                        <hr>
					<?php endif; ?>

					<?php echo $form->field($changePasswordModel, 'newPassword', ['options' => ['class' => 'form-item sm-item']])->passwordInput(['maxlength' => 45]); ?>

					<?php echo $form->field($changePasswordModel, 'newPasswordConfirm', ['options' => ['class' => 'form-item sm-item']])->passwordInput(['maxlength' => 45]); ?>

					<div class="form-item site-notifications"><input id="site-notification" type="checkbox"><label for="site-notification">Receive Site Notifications</label></div>
				</div>



				<div class="profile-info additional-info">
					<div class="title">Additional Info</div>

                    <?= $form
                        ->field($user->profile, 'description', [
                            'options' => [
                                    'class' => 'form-item',
                            ]
                        ])
                        ->textarea(['placeholder' => $user->profile
                        ->getAttributeLabel( 'description' )])->label(false);
                    ?>

					<div class="form-item sm-item">
						<div class="label">Country*</div>
						<?= $form->field($user->profile, 'country',[
							'options' => [
								'tag' => false,
							]])->dropDownList($user->profile->getOptionsField('country'), ['class' => false])->label(false) ?>
                    </div>

                    <?= $form->field($user->profile, 'city',[
						'options' => [
							'class' => 'form-item sm-item',
						]]); ?>

					<?= $form->field($user->profile, 'occupation',[
						'options' => [
							'class' => 'form-item sm-item',
						]]); ?>


					<div class="form-item sm-item">
						<div class="label">Relationship Status</div>
						<?= $form->field($user->profile, 'relationship',[
							'options' => [
								'tag' => false,
							]])->dropDownList($user->profile->getOptionsField('relationship'), ['class' => false])->label(false) ?>
                    </div>

                    <?= $form->field($user->profile, 'education',[
						'options' => [
							'class' => 'form-item sm-item',
						]]); ?>

					<?= $form->field($user->profile, 'ethnicity',[
						'options' => [
							'class' => 'form-item sm-item',
						]]); ?>

					<?= $form
						->field($user->profile, 'hobbies', [
							'options' => [
								'class' => 'form-item',
							]
						])
						->textarea(['placeholder' => $user->profile
							->getAttributeLabel( 'hobbies' )])->label(false);
					?>

					<?= $form
						->field($user->profile, 'interests', [
							'options' => [
								'class' => 'form-item',
							]
						])
						->textarea(['placeholder' => $user->profile
							->getAttributeLabel( 'interests' )])->label(false);
					?>

					<?= $form
						->field($user->profile, 'favorite_music', [
							'options' => [
								'class' => 'form-item',
							]
						])
						->textarea(['placeholder' => $user->profile
							->getAttributeLabel( 'favorite_music' )])->label(false);
					?>

					<?= $form
						->field($user->profile, 'favorite_films', [
							'options' => [
								'class' => 'form-item',
							]
						])
						->textarea(['placeholder' => $user->profile
							->getAttributeLabel( 'favorite_films' )])->label(false);
					?>

					<?= $form
						->field($user->profile, 'favorite_books', [
							'options' => [
								'class' => 'form-item',
							]
						])
						->textarea(['placeholder' => $user->profile
							->getAttributeLabel( 'favorite_books' )])->label(false);
					?>
				</div>
				<div class="profile-info profile-privacy">
					<div class="title">Profile privacy</div>
					<div class="form-item sm-item">
						<div class="label">Who can see you</div><select><option>Public</option><option>Private</option><option>Public</option></select></div>
					<div class="form-item sm-item">
						<div class="label">Who can contact you</div><select><option>Public</option><option>Private</option><option>Public</option></select></div>
				</div>
				<div class="profile-info social-btn">
					<div class="title">Connect to your account</div>
					<?= $socialButton; ?>
				</div>
				<p class="bottom-sub-title">Invite your Facebook friends</p>

				<div class="base-btn reverse"><input type="submit" value="Save"></div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
