<?php
/* @var $this ProductBundleDeviceController */
/* @var $model ProductBundleDevice */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-bundle-device-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'product_refno'); ?>
		<?php echo $form->textField($model,'product_refno'); ?>
		<?php echo $form->error($model,'product_refno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'device_group'); ?>
		<?php echo $form->textField($model,'device_group'); ?>
		<?php echo $form->error($model,'device_group'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->