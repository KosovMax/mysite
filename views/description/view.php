<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Description */

$this->title = $model->header;
$this->params['breadcrumbs'][] = ['label' => 'Стаття', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="description-view">

    <h1>Заголовок: <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->desid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->desid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'desid',
            'date',
            'header',
            'art_body:ntext',
            'tag'=>[
                'attribute' => 'Теги',
                'value'=>$model->tag,
            ],
            'photo'
        ],
    ]) ?>

</div>
