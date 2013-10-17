<?php
/* @var $this ProductTypeController */
/* @var $data ProductType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_type_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->product_type_id), array('view', 'id'=>$data->product_type_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_type')); ?>:</b>
	<?php echo CHtml::encode($data->product_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('function_name')); ?>:</b>
	<?php echo CHtml::encode($data->function_name); ?>
	<br />


</div>