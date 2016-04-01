<?php
/* @var $this CountriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Страны',
);

$this->menu=array(
	array('label'=>'Добавить страну', 'url'=>array('create')),
	array('label'=>'Администрирование', 'url'=>array('admin')),
);
?>

<h1>Список стран и их идентификаторы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
