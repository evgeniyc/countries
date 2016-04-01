<?php
/* @var $this LancitController */
/* @var $model Lancit */
/* @var $form CActiveForm */

$list1 = array();
?>
<div class="form">
<?php $model1 = new Countries;
	$form = $this->beginWidget('CActiveForm', array(
    'id'=>'countries-form',
   	'method'=>'get',
	)); ?>

	<?php echo $form->errorSummary($model1); ?>

	<div class="row">
		<?php echo $form->labelEx($model1,'name'); ?>
		<?php echo $form->dropDownList($model1,'name',$list,
			array(
				'clientChange'=>'change',
				'ajax'=>array(
					'update'=>'#Lancit_city_id',
					'type'=>'get'),
		)); ?>
		<?php echo $form->error($model1,'name'); ?>
	</div>
<?php $this->endWidget(); ?>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lancit-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'city_id'); ?>
		<?php echo $form->dropDownList($model,'city_id',$list1); ?>
		<?php echo $form->error($model,'city_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'lang_id'); ?>
		<?php echo $form->dropDownList($model,'lang_id',$list2); ?>
		<?php echo $form->error($model,'lang_id'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->