<?php
use yii\widgets\ActiveForm;

$array_status_online = [
	'0' => 'Online',
	'1' => 'Ofline',
	'2' => 'Away',
	'3' => 'Busy',
]
?>

<?php
if($isProfileOwner) {
	$form = ActiveForm::begin( [
		'options' => [
			'id'                   => 'form_online_status',
			'enableAjaxValidation' => true
		]
	] ); ?>
	<?= $form->field( $settings, 'status_online' )->label( false )->dropDownList( $array_status_online );; ?>
	<?= $form->field($settings, 'info_status')->textInput()->label(false); ?>
	<?php ActiveForm::end(); ?>


	<?php
	$script = <<< JS

    $(document).on("change", "#accountsettings-status_online", function () {
                //Сама форма    
                var form = $(this).parent().parent();
                sendUserData(form);

    return false; // Отменить синхронную отправку данных
    
    });

    $(document).on("change", "#accountsettings-info_status", function () {
                //Сама форма    
                var form = $(this).parent().parent();
                sendUserData(form);

    return false; // Отменить синхронную отправку данных
    
    });
function sendUserData(form){
      $.ajax({
                    //Тип запроса
                    type: 'POST',

                    //Адрес запроса
                    url: form.attr('action'),

                     //Данные из формы в массиве
                    data: form.serializeArray(),
                     }
                 )
                 
                 //Если запрос отправлен
                 .done(function(data) {
                 
                       //Не прошла валидация с сервера 
                      if (data.validation) {
                         form.yiiActiveForm('updateMessages', data.validation, true); // renders validation messages at appropriate places
                     } 
                 })
        //Если запрос не ушел	
        .fail(function () {
           
            alert('Ошибка, попробуйте позже');
        })
}
JS;
	$this->registerJs( $script );
} else {
	echo $array_status_online[$settings->status_online];
}
?>


<?php echo \humhub\modules\post\widgets\Form::widget(['contentContainer' => $user]); ?>
<?php

echo \humhub\modules\stream\widgets\StreamViewer::widget(array(
    'contentContainer' => $user,
    'streamAction' => '//user/profile/stream',
    'messageStreamEmpty' => ($user->permissionManager->can(new \humhub\modules\post\permissions\CreatePost())) ?
            Yii::t('UserModule.views_profile_index', '<b>Your profile stream is still empty</b><br>Get started and post something...') :
            Yii::t('UserModule.views_profile_index', '<b>This profile stream is still empty!</b>'),
    'messageStreamEmptyCss' => ($user->permissionManager->can(new \humhub\modules\post\permissions\CreatePost())) ?
            'placeholder-empty-stream' :
            '',
));
?>
