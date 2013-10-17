<?php
/* @var $this ProductPackageController */
/* @var $model ProductPackage */

$this->breadcrumbs=array(
	'Product Packages'=>array('index'),
	$model->product_package_id=>array('view','id'=>$model->product_package_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductPackage', 'url'=>array('index')),
	array('label'=>'Create ProductPackage', 'url'=>array('create')),
	array('label'=>'View ProductPackage', 'url'=>array('view', 'id'=>$model->product_package_id)),
	array('label'=>'Manage ProductPackage', 'url'=>array('admin')),
);
?>

<h1>Update ProductPackage <?php echo $model->product_package_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>