<?php
/* @var $this CountriesController */
/* @var $model Countries */

$this->breadcrumbs=array(
	'Страны'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список стран', 'url'=>array('index')),
	array('label'=>'Администрирование', 'url'=>array('admin')),
);
?>

<h1>Создать страну</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>