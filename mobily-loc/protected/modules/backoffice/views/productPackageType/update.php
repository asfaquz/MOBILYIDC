<?php
/* @var $this ProductPackageTypeController */
/* @var $model ProductPackageType */

$this->breadcrumbs=array(
	'Product Package Types'=>array('index'),
	$model->product_package_type_id=>array('view','id'=>$model->product_package_type_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductPackageType', 'url'=>array('index')),
	array('label'=>'Create ProductPackageType', 'url'=>array('create')),
	array('label'=>'View ProductPackageType', 'url'=>array('view', 'id'=>$model->product_package_type_id)),
	array('label'=>'Manage ProductPackageType', 'url'=>array('admin')),
);
?>

<h1>Update ProductPackageType <?php echo $model->product_package_type_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>