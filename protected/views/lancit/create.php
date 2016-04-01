<?php
/* @var $this LancitController */
/* @var $model Lancit */

$this->breadcrumbs=array(
	'Связи'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список связей', 'url'=>array('index')),
	array('label'=>'Создание связи', 'url'=>array('create')),
);
?>
<?php if(Yii::app()->user->hasFlash('create')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('create'); ?>
</div>
<?php endif; ?>

<h1>Создать связь Город - Языки</h1>

<?php $this->renderPartial('_form',array(
			'model'=>$model, 
			'list'=>$list,
			'list2'=>$list2,
		));