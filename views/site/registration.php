<?php
/** @var $model */
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
?>
<?php $form = ActiveForm::begin(); ?>
<?=$form->field($model, 'email')->textInput() ?>
<?=$form->field($model, 'password')->passwordInput() ?>
<?=$form->field($model, 'passwordRepeat')->passwordInput() ?>
<?= Html::submitButton('Зарегистривроваться')?>
<?php ActiveForm::end(); ?>

