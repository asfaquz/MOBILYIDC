<?php
/* @var $this ProductAddonGroupController */
/* @var $data ProductAddonGroup */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_addon_group_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->product_addon_group_id), array('view', 'id'=>$data->product_addon_group_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_name')); ?>:</b>
	<?php echo CHtml::encode($data->group_name); ?>
	<br />


</div>