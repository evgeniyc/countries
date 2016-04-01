<?php
/* @var $this CitiesController */
/* @var $model Cities */

$this->breadcrumbs=array(
	'Города'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Список городов', 'url'=>array('index')),
	array('label'=>'Администрирование', 'url'=>array('admin')),
);
?>

<h1>Добавить город</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>