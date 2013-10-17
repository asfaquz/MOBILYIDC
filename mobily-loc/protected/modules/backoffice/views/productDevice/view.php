<?php
/* @var $this ProductDeviceController */
/* @var $model ProductDevice */

$this->breadcrumbs=array(
	'Product Devices'=>array('index'),
	$model->product_device_id,
);

$this->menu=array(
	array('label'=>'List ProductDevice', 'url'=>array('index')),
	array('label'=>'Create ProductDevice', 'url'=>array('create')),
	array('label'=>'Update ProductDevice', 'url'=>array('update', 'id'=>$model->product_device_id)),
	array('label'=>'Delete ProductDevice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->product_device_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductDevice', 'url'=>array('admin')),
);
?>

<h1>View ProductDevice #<?php echo $model->product_device_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'product_device_id',
		'id_item',
		'sku',
		'device_name',
		'group_id',
		'cash_sale_allowed',
		'cash_price',
		'pt',
		'pr',
		'customer_type',
		'img',
		'name_en',
		'name_ar',
		'enabled',
	),
)); ?>
