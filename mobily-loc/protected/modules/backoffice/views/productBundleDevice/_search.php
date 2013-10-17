<?php
/* @var $this ProductBundleDeviceController */
/* @var $model ProductBundleDevice */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'product_bundle_device_id'); ?>
		<?php echo $form->textField($model,'product_bundle_device_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_refno'); ?>
		<?php echo $form->textField($model,'product_refno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'device_group'); ?>
		<?php echo $form->textField($model,'device_group'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->