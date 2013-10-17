<?php
/* @var $this ProductAddonGroupController */
/* @var $model ProductAddonGroup */

$this->breadcrumbs=array(
	'Product Addon Groups'=>array('index'),
	$model->product_addon_group_id,
);

$this->menu=array(
	array('label'=>'List ProductAddonGroup', 'url'=>array('index')),
	array('label'=>'Create ProductAddonGroup', 'url'=>array('create')),
	array('label'=>'Update ProductAddonGroup', 'url'=>array('update', 'id'=>$model->product_addon_group_id)),
	array('label'=>'Delete ProductAddonGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->product_addon_group_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductAddonGroup', 'url'=>array('admin')),
);
?>

<h1>View ProductAddonGroup #<?php echo $model->product_addon_group_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'product_addon_group_id',
		'group_name',
	),
)); ?>
