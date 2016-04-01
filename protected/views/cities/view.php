<?php
/* @var $this CitiesController */
/* @var $model Cities */

$this->breadcrumbs=array(
	'Города'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список городов', 'url'=>array('index')),
	array('label'=>'Создать город', 'url'=>array('create')),
	array('label'=>'Редактировать город', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить город', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление городами', 'url'=>array('admin')),
);
?>

<h1>Просмотр города #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'country.name',
	),
)); ?>
