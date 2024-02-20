<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<div class="site-index">
    <?php foreach ($Message as $Onemessage): ?>
        <div><?= $Onemessage->user->name ?> </div>
        <div><?= $Onemessage->content ?> </div>
        <div><?= $Onemessage->timestamp ?> </div>

    <?php endforeach; ?>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'content')->textInput()->label('') ?>
    <?= Html::submitButton('Отправить') ?>
    <?php ActiveForm::end(); ?>

</div>
