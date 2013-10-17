<?php
/* @var $this ProductPackageTypeController */
/* @var $model ProductPackageType */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-package-type-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'package_type_name'); ?>
		<?php echo $form->textField($model,'package_type_name',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'package_type_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customer_type'); ?>
		<?php echo $form->textField($model,'customer_type',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'customer_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_en'); ?>
		<?php echo $form->textField($model,'name_en',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'name_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_ar'); ?>
		<?php echo $form->textField($model,'name_ar',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'name_ar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->