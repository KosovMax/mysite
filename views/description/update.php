<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Description */

$this->title = 'Редагувати:' . ' ' . $model->desid;
$this->params['breadcrumbs'][] = ['label' => 'Стаття', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->desid, 'url' => ['read', 'id' => $model->desid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="description-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tag' => $tag
    ]) ?>

</div>
