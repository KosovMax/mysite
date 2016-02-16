<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Description */

$this->title = 'Редагувати';
$this->params['breadcrumbs'][] = ['label' => 'Стаття', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="description-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tag' => $tag,
    ]) ?>

</div>
