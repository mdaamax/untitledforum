<?php
/** @var $model */
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
?>
<?php $form = ActiveForm::begin(); ?>
<?=$form->field($model, 'name')->textInput() ?>
<?= Html::submitButton('Создать раздел')?>
<?php ActiveForm::end(); ?>
