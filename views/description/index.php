<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Tag;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DescriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Стаття';
$this->params['breadcrumbs'][] = $this->title;

?>

<div  class="description-index">
	<div class="tab">
		<div class="tab-cell">
			<h1>Стаття</h1>
		</div>
		<div class="tab-cell">
			<?= Html::a('Створити статті', ['create'], ['class' => 'btn btn-success']) ?>
		</div>
	</div>

	<?php
		foreach ($model as $m) {
			$tag=Tag::findOne($m->tag);
			$tag=$tag->tag_name;
			$desc=null;
			$to_sub=500;
			$size=strlen($m->art_body);

			if($size<=$to_sub){
				$desc=$m->art_body;
			}else{
				$desc=mb_substr($m->art_body,0,$to_sub)."... <a href='/mysite/basic/web/index.php?r=description/read&id={$m->desid}'> Читать далі>></a>";
			}
			
			echo "<div style='display:table;width:100%'>
					<div style='display:table-cell;'>
						<h3><a href='/mysite/basic/web/index.php?r=description/read&id={$m->desid}'>{$m->header}</a></h3>
					</div>
					<div style='display:table-cell;text-align:right;'>
						<a href='/mysite/basic/web/index.php?r=description/update&id={$m->desid}' ><i class='fa fa-pencil' title='Редагувати'></i></a>
						<a data-confirm='Are you sure you want to delete this item?' data-method='post' href='/mysite/basic/web/index.php?r=description/delete&id={$m->desid}' ><i class='fa fa-times' title='Видалити' ></i></a>
					</div>
				</div>
				<div>
					{$desc}
				</div>
				<div>
					<span style='color:rgb(246, 131, 2);'>Теги: #{$tag}</span>
					<span style='float: right;color: gray;'>Oпубліковано: {$m->date}</span>
				</div>
				<hr />
			";
		}
	?>
	
</div>
