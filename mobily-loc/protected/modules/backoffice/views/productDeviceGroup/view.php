<?php
/* @var $this ProductDeviceGroupController */
/* @var $model ProductDeviceGroup */

$this->breadcrumbs=array(
	'Product Device Groups'=>array('index'),
	$model->product_device_group_id,
);

$this->menu=array(
	array('label'=>'List ProductDeviceGroup', 'url'=>array('index')),
	array('label'=>'Create ProductDeviceGroup', 'url'=>array('create')),
	array('label'=>'Update ProductDeviceGroup', 'url'=>array('update', 'id'=>$model->product_device_group_id)),
	array('label'=>'Delete ProductDeviceGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->product_device_group_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductDeviceGroup', 'url'=>array('admin')),
);
?>

<h1>View ProductDeviceGroup #<?php echo $model->product_device_group_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'product_device_group_id',
		'group_name',
	),
)); ?>
