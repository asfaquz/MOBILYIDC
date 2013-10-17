<?php
/* @var $this ProductAdminController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'product_id'); ?>
		<?php echo $form->textField($model,'product_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_refno'); ?>
		<?php echo $form->textField($model,'product_refno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sort'); ?>
		<?php echo $form->textField($model,'sort'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'package'); ?>
		<?php echo $form->textField($model,'package'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_type'); ?>
		<?php echo $form->textField($model,'product_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plan_type'); ?>
		<?php echo $form->textField($model,'plan_type',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'speed'); ?>
		<?php echo $form->textField($model,'speed',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'siebel_package_name'); ?>
		<?php echo $form->textField($model,'siebel_package_name',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mandatory_addon_group'); ?>
		<?php echo $form->textField($model,'mandatory_addon_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'msisdn_method'); ?>
		<?php echo $form->textField($model,'msisdn_method',array('size'=>22,'maxlength'=>22)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sim_needed'); ?>
		<?php echo $form->textField($model,'sim_needed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sim_method'); ?>
		<?php echo $form->textField($model,'sim_method',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bundle_device'); ?>
		<?php echo $form->textField($model,'bundle_device'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'optional_addon_group'); ?>
		<?php echo $form->textField($model,'optional_addon_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vanity'); ?>
		<?php echo $form->textField($model,'vanity',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enabled'); ?>
		<?php echo $form->textField($model,'enabled'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->