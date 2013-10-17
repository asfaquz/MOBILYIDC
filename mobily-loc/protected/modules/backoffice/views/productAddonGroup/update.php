<?php
/* @var $this ProductAddonGroupController */
/* @var $model ProductAddonGroup */

$this->breadcrumbs=array(
	'Product Addon Groups'=>array('index'),
	$model->product_addon_group_id=>array('view','id'=>$model->product_addon_group_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductAddonGroup', 'url'=>array('index')),
	array('label'=>'Create ProductAddonGroup', 'url'=>array('create')),
	array('label'=>'View ProductAddonGroup', 'url'=>array('view', 'id'=>$model->product_addon_group_id)),
	array('label'=>'Manage ProductAddonGroup', 'url'=>array('admin')),
);
?>

<h1>Update ProductAddonGroup <?php echo $model->product_addon_group_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>