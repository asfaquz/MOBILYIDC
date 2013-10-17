<?php
/* @var $this ProductPackageController */
/* @var $model ProductPackage */

$this->breadcrumbs=array(
	'Product Packages'=>array('index'),
	$model->product_package_id,
);

$this->menu=array(
	array('label'=>'List ProductPackage', 'url'=>array('index')),
	array('label'=>'Create ProductPackage', 'url'=>array('create')),
	array('label'=>'Update ProductPackage', 'url'=>array('update', 'id'=>$model->product_package_id)),
	array('label'=>'Delete ProductPackage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->product_package_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductPackage', 'url'=>array('admin')),
);
?>

<h1>View ProductPackage #<?php echo $model->product_package_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'product_package_id',
		'package_name',
		'speed_based',
		'package_type',
		'customer_type',
		'img',
		'package_type_id',
		'name_en',
		'name_ar',
		'desc_en',
		'desc_ar',
		'enabled',
	),
)); ?>
