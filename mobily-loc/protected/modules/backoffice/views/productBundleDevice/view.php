<?php
/* @var $this ProductBundleDeviceController */
/* @var $model ProductBundleDevice */

$this->breadcrumbs=array(
	'Product Bundle Devices'=>array('index'),
	$model->product_bundle_device_id,
);

$this->menu=array(
	array('label'=>'List ProductBundleDevice', 'url'=>array('index')),
	array('label'=>'Create ProductBundleDevice', 'url'=>array('create')),
	array('label'=>'Update ProductBundleDevice', 'url'=>array('update', 'id'=>$model->product_bundle_device_id)),
	array('label'=>'Delete ProductBundleDevice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->product_bundle_device_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductBundleDevice', 'url'=>array('admin')),
);
?>

<h1>View ProductBundleDevice #<?php echo $model->product_bundle_device_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'product_bundle_device_id',
		'product_refno',
		'device_group',
	),
)); ?>
