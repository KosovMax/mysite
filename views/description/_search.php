<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DescriptionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="description-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'desid') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'header') ?>

    <?= $form->field($model, 'art_body') ?>

    <?= $form->field($model, 'tag') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
