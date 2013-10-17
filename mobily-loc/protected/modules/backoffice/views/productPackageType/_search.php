<?php
/* @var $this ProductPackageTypeController */
/* @var $model ProductPackageType */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'product_package_type_id'); ?>
		<?php echo $form->textField($model,'product_package_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'package_type_name'); ?>
		<?php echo $form->textField($model,'package_type_name',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_type'); ?>
		<?php echo $form->textField($model,'customer_type',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_en'); ?>
		<?php echo $form->textField($model,'name_en',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_ar'); ?>
		<?php echo $form->textField($model,'name_ar',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->