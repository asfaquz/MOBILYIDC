<?php
/* @var $this ProductPackageController */
/* @var $model ProductPackage */

$this->breadcrumbs=array(
	'Product Packages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductPackage', 'url'=>array('index')),
	array('label'=>'Manage ProductPackage', 'url'=>array('admin')),
);
?>

<h1>Create ProductPackage</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>