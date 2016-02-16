<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Tag;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DescriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заголовок: '.$model->header;
$this->params['breadcrumbs'][] = ['label' => 'Стаття', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

	$html_photo='';
	if($model->photo!=''){
		$html_photo="<div><img src='{$model->photo}' width='300' /></div>";
	}

	$tag=Tag::findOne($model->tag);

?>

<div>
	<div class="tab2">
		<div class="tab2-cell">
			<h3><?= $model->header; ?></h3>
		</div>
		<div  class="tab2-cell" style='text-align:right;'>
			<span style='float: right;color: gray;'>Oпубліковано: <?= $model->date; ?></span>
		</div>
		<div class="tab2-cell" style='text-align:right;'>
		 	<?= Html::a('<i class="fa fa-pencil" title="Редагувати"></i>', ['update', 'id' => $model->desid]) ?>
			<?= Html::a('<i class="fa fa-times" title="Видалити"" ></i>', ['delete', 'id' => $model->desid], [
	            'data' => [
	                'confirm' => 'Are you sure you want to delete this item?',
	                'method' => 'post',
	            ],
        	]) ?>
		</div>
	</div>
	<div><?= $model->art_body ?></div>
	<span style="color:rgb(246, 131, 2);">Теги: #<?= $tag->tag_name ?></span>
	<?= $html_photo; ?>
	
</div>