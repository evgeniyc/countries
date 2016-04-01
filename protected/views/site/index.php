<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$model = new Countries;
?>

<h1>Добро пожаловать в <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<table id="maint">
<caption>
	Выбирая последовательно: страну, город, язык, можно узнать, - на каких языках говорит население
	выбранного города.
</caption>
<thead>
	<th>Страны</th><th>Города</th><th>Языки</th>
</thead>
<tbody>
<tr>
	<td>
		<div id="part1">
			<?php if(!empty($model)): ?>
			<?php $form = $this->beginWidget('CActiveForm', array(
			'id'=>'countries-form',
			'method'=>'get',
			)); ?>

			<?php echo $form->errorSummary($model); ?>

			<div class="row">
				<?php echo $form->dropDownList($model,'name',$list,
					array(
						'id'=>'cntr',
						'clientChange'=>'change',
						'ajax'=>array(
							'update'=>'#cty',
							'type'=>'get'),
				)); ?>
				<?php echo $form->error($model,'name'); ?>
				
			</div>
			<?php $this->endWidget(); ?>
			<?php else: 
				throw new CHttpException('404', 'База данных пуста!');
			endif; ?>
		</div>
	</td>
	<td>
		<div id="part2">
		<?php 
			$model1 = new Cities;
			$form = $this->beginWidget('CActiveForm', array(
			'id'=>'cities-form',
			'method'=>'get',
			)); ?>

			<div class="row">
				<?php echo $form->dropDownList($model1,'name',$list1=array(),
					array(
						'id'=>'cty',
						'clientChange'=>'change',
						'ajax'=>array(
							'update'=>'#lng',
							'type'=>'get'),
				)); ?>
			</div>
			<?php $this->endWidget(); ?>
		</div>
	</td>
	<td>
		<div id="part3">
		<?php 
			$model2 = new Langs;
			echo CHtml::activeTextArea($model2,'name',array('id'=>'lng'));
		?>
		</div>
	</td>
</tr>
</tbody>
</table>