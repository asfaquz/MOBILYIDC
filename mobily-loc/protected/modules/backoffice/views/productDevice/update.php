<?php
/* @var $this ProductDeviceController */
/* @var $model ProductDevice */

$this->breadcrumbs=array(
	'Product Devices'=>array('index'),
	$model->product_device_id=>array('view','id'=>$model->product_device_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductDevice', 'url'=>array('index')),
	array('label'=>'Create ProductDevice', 'url'=>array('create')),
	array('label'=>'View ProductDevice', 'url'=>array('view', 'id'=>$model->product_device_id)),
	array('label'=>'Manage ProductDevice', 'url'=>array('admin')),
);
?>

<h1>Update ProductDevice <?php echo $model->product_device_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>