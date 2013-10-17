<?php
/* @var $this ProductAdminController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
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
		<?php echo $form->labelEx($model,'sort'); ?>
		<?php echo $form->textField($model,'sort'); ?>
		<?php echo $form->error($model,'sort'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'package'); ?>
		<?php echo $form->textField($model,'package'); ?>
		<?php echo $form->error($model,'package'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_type'); ?>
		<?php echo $form->textField($model,'product_type'); ?>
		<?php echo $form->error($model,'product_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plan_type'); ?>
		<?php echo $form->textField($model,'plan_type',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'plan_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'speed'); ?>
		<?php echo $form->textField($model,'speed',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'speed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'siebel_package_name'); ?>
		<?php echo $form->textField($model,'siebel_package_name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'siebel_package_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mandatory_addon_group'); ?>
		<?php echo $form->textField($model,'mandatory_addon_group'); ?>
		<?php echo $form->error($model,'mandatory_addon_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'msisdn_method'); ?>
		<?php echo $form->textField($model,'msisdn_method',array('size'=>22,'maxlength'=>22)); ?>
		<?php echo $form->error($model,'msisdn_method'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sim_needed'); ?>
		<?php echo $form->textField($model,'sim_needed'); ?>
		<?php echo $form->error($model,'sim_needed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sim_method'); ?>
		<?php echo $form->textField($model,'sim_method',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'sim_method'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bundle_device'); ?>
		<?php echo $form->textField($model,'bundle_device'); ?>
		<?php echo $form->error($model,'bundle_device'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'optional_addon_group'); ?>
		<?php echo $form->textField($model,'optional_addon_group'); ?>
		<?php echo $form->error($model,'optional_addon_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vanity'); ?>
		<?php echo $form->textField($model,'vanity',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'vanity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enabled'); ?>
		<?php echo $form->textField($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->