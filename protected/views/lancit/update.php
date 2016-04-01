<?php
/* @var $this LancitController */
/* @var $model Lancit */

$this->breadcrumbs=array(
	'Lancits'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lancit', 'url'=>array('index')),
	array('label'=>'Create Lancit', 'url'=>array('create')),
	array('label'=>'View Lancit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Lancit', 'url'=>array('admin')),
);
?>

<h1>Update Lancit <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>