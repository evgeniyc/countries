<?php
/* @var $this LangsController */
/* @var $model Langs */

$this->breadcrumbs=array(
	'Языки'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список языков', 'url'=>array('index')),
	array('label'=>'Добавить язык', 'url'=>array('create')),
	array('label'=>'Просмотреть данные', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Администрирование', 'url'=>array('admin')),
);
?>

<h1>Обновить данные "язык" <?php echo 'id->'.$model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>