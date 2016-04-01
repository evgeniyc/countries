<?php
/* @var $this LancitController */
/* @var $data Lancit */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::encode($data->city_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lang_id')); ?>:</b>
	<?php echo CHtml::encode($data->lang_id); ?>
	<br />


</div>