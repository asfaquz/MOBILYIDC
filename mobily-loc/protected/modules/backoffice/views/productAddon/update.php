<?php
/* @var $this ProductAddonController */
/* @var $model ProductAddon */

$this->breadcrumbs=array(
	'Product Addons'=>array('index'),
	$model->name=>array('view','id'=>$model->product_addon_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductAddon', 'url'=>array('index')),
	array('label'=>'Create ProductAddon', 'url'=>array('create')),
	array('label'=>'View ProductAddon', 'url'=>array('view', 'id'=>$model->product_addon_id)),
	array('label'=>'Manage ProductAddon', 'url'=>array('admin')),
);
?>

<h1>Update ProductAddon <?php echo $model->product_addon_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>