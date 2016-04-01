<?php
/* @var $this LangsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Языки',
);

$this->menu=array(
	array('label'=>'Добавить язык', 'url'=>array('create')),
	array('label'=>'Администрирование', 'url'=>array('admin')),
);
?>

<h1>Языки и их идентификаторы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
