<?php
/* @var $this ProductPackageTypeController */
/* @var $model ProductPackageType */

$this->breadcrumbs=array(
	'Product Package Types'=>array('index'),
	$model->product_package_type_id,
);

$this->menu=array(
	array('label'=>'List ProductPackageType', 'url'=>array('index')),
	array('label'=>'Create ProductPackageType', 'url'=>array('create')),
	array('label'=>'Update ProductPackageType', 'url'=>array('update', 'id'=>$model->product_package_type_id)),
	array('label'=>'Delete ProductPackageType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->product_package_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductPackageType', 'url'=>array('admin')),
);
?>

<h1>View ProductPackageType #<?php echo $model->product_package_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'product_package_type_id',
		'package_type_name',
		'customer_type',
		'name_en',
		'name_ar',
	),
)); ?>
