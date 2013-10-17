<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('souq_id')); ?>:</b>
	<?php echo CHtml::encode($data->souq_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobily_id')); ?>:</b>
	<?php echo CHtml::encode($data->mobily_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('souq_confirmed')); ?>:</b>
	<?php echo CHtml::encode($data->souq_confirmed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_status')); ?>:</b>
	<?php echo CHtml::encode($data->user_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('msisdn')); ?>:</b>
	<?php echo CHtml::encode($data->msisdn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mba')); ?>:</b>
	<?php echo CHtml::encode($data->mba); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lang')); ?>:</b>
	<?php echo CHtml::encode($data->lang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('document_type')); ?>:</b>
	<?php echo CHtml::encode($data->document_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('document_number')); ?>:</b>
	<?php echo CHtml::encode($data->document_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trans_id')); ?>:</b>
	<?php echo CHtml::encode($data->trans_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('consumer_expiry')); ?>:</b>
	<?php echo CHtml::encode($data->consumer_expiry); ?>
	<br />

	*/ ?>

</div>