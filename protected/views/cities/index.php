<?php
/* @var $this CitiesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Города',
);

$this->menu=array(
	array('label'=>'Добавить город', 'url'=>array('create')),
	array('label'=>'Администрирование', 'url'=>array('admin')),
);
?>

<h1>Список городов и их идентификаторы.</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
