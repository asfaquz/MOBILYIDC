<?php
/* @var $this ProductDeviceGroupController */
/* @var $model ProductDeviceGroup */

$this->breadcrumbs=array(
	'Product Device Groups'=>array('index'),
	$model->product_device_group_id=>array('view','id'=>$model->product_device_group_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductDeviceGroup', 'url'=>array('index')),
	array('label'=>'Create ProductDeviceGroup', 'url'=>array('create')),
	array('label'=>'View ProductDeviceGroup', 'url'=>array('view', 'id'=>$model->product_device_group_id)),
	array('label'=>'Manage ProductDeviceGroup', 'url'=>array('admin')),
);
?>

<h1>Update ProductDeviceGroup <?php echo $model->product_device_group_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>