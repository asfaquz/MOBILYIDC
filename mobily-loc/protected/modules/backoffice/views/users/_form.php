<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'souq_id'); ?>
		<?php echo $form->textField($model,'souq_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'souq_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobily_id'); ?>
		<?php echo $form->textField($model,'mobily_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'mobily_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'souq_confirmed'); ?>
		<?php echo $form->textField($model,'souq_confirmed'); ?>
		<?php echo $form->error($model,'souq_confirmed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_status'); ?>
		<?php echo $form->textField($model,'user_status',array('size'=>17,'maxlength'=>17)); ?>
		<?php echo $form->error($model,'user_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'msisdn'); ?>
		<?php echo $form->textField($model,'msisdn',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'msisdn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mba'); ?>
		<?php echo $form->textField($model,'mba',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'mba'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lang'); ?>
		<?php echo $form->textField($model,'lang',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'lang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'document_type'); ?>
		<?php echo $form->textField($model,'document_type'); ?>
		<?php echo $form->error($model,'document_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'document_number'); ?>
		<?php echo $form->textField($model,'document_number'); ?>
		<?php echo $form->error($model,'document_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trans_id'); ?>
		<?php echo $form->textField($model,'trans_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'trans_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'consumer_expiry'); ?>
		<?php echo $form->textField($model,'consumer_expiry',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'consumer_expiry'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->