<?php
/* @var $this ProductBundleDeviceController */
/* @var $model ProductBundleDevice */

$this->breadcrumbs=array(
	'Product Bundle Devices'=>array('index'),
	$model->product_bundle_device_id=>array('view','id'=>$model->product_bundle_device_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductBundleDevice', 'url'=>array('index')),
	array('label'=>'Create ProductBundleDevice', 'url'=>array('create')),
	array('label'=>'View ProductBundleDevice', 'url'=>array('view', 'id'=>$model->product_bundle_device_id)),
	array('label'=>'Manage ProductBundleDevice', 'url'=>array('admin')),
);
?>

<h1>Update ProductBundleDevice <?php echo $model->product_bundle_device_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>