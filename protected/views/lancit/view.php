<?php
/* @var $this LancitController */
/* @var $model Lancit */

$this->breadcrumbs=array(
	'Lancits'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Lancit', 'url'=>array('index')),
	array('label'=>'Create Lancit', 'url'=>array('create')),
	array('label'=>'Update Lancit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Lancit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lancit', 'url'=>array('admin')),
);
?>

<h1>View Lancit #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'city_id',
		'lang_id',
	),
)); ?>
