<?php
/* @var $this CountriesController */
/* @var $model Countries */

$this->breadcrumbs=array(
	'Страны'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'Список стран', 'url'=>array('index')),
	array('label'=>'Добавить страну', 'url'=>array('create')),
	array('label'=>'Просмотреть страну', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Администрирование', 'url'=>array('admin')),
);
?>

<h1>Редактировать страну <?php echo $model->name.' (id->'.$model->id.').'; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>