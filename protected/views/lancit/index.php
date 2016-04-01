<?php
/* @var $this LancitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lancits',
);

$this->menu=array(
	array('label'=>'Create Lancit', 'url'=>array('create')),
);
?>

<h1>Lancits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
