<?php
/* @var $this LangsController */
/* @var $model Langs */

$this->breadcrumbs=array(
	'Языки'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список языков', 'url'=>array('index')),
	array('label'=>'Добавить язык', 'url'=>array('create')),
	array('label'=>'Обновить язык', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить язык', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Администрирование', 'url'=>array('admin')),
);
?>

<h1>Обзор. Язык #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
