<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Tag;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DescriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Descriptions Table';
//$this->params['breadcrumbs'][] = ['label' => 'Descriptions Index', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="description-index">

    <div class="tab">
		<div class="tab-cell">
			<h2><?= Html::encode($this->title) ?></h2>
		</div>
		<div class="tab-cell">
			<?= Html::a('Створити статті', ['edit'], ['class' => 'btn btn-success']) ?>
		</div>
	</div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'date',
            'header',
            'art_body:ntext',
            'tab',
            'photo',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
