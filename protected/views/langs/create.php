<?php
/* @var $this LangsController */
/* @var $model Langs */

$this->breadcrumbs=array(
	'Языки'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Список языков', 'url'=>array('index')),
	array('label'=>'Администрирование', 'url'=>array('admin')),
);
?>

<h1>Добавить язык</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>