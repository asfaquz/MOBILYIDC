<?php
/* @var $this ProductAddonController */
/* @var $model ProductAddon */

$this->breadcrumbs=array(
	'Product Addons'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ProductAddon', 'url'=>array('index')),
	array('label'=>'Create ProductAddon', 'url'=>array('create')),
	array('label'=>'Update ProductAddon', 'url'=>array('update', 'id'=>$model->product_addon_id)),
	array('label'=>'Delete ProductAddon', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->product_addon_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductAddon', 'url'=>array('admin')),
);
?>

<h1>View ProductAddon #<?php echo $model->product_addon_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'product_addon_id',
		'name',
		'siebel_name',
		'group_id',
		'type',
		'name_en',
		'name_ar',
		'enabled',
	),
)); ?>
