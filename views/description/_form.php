<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Tag;

/* @var $this yii\web\View */
/* @var $model app\models\Description */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="description-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); 
        $today=date('d-m-Y H:i:s');
        $date=$model->date ? $model->date : $today;
    ?>

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'art_body')->textarea(['rows' => 6])->hint('<32kb') ?>

    <?= $form->field($model, 'tag')->dropDownList(
            ArrayHelper::map(Tag::find()->all(),'tag_id','tag_name'),
            ['options' => ['class'=>'maxim'],
            'prompt'=>'Вибрати теги']
        ) 
    ?>

    <?= $form->field($model, 'file')->fileInput(['maxlength' => true]) ?>

    <div class="edit_date"><b>Дата:</b> <?= $date; ?></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Оновлення', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
