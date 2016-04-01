<?php
/* @var $this LancitController */
/* @var $model Lancit */

$this->breadcrumbs=array(
	'Связи город-язык'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список связей', 'url'=>array('index')),
	array('label'=>'Создать связь', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lancit-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление связями Город-Язык</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lancit-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'city_id',
		'lang_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
