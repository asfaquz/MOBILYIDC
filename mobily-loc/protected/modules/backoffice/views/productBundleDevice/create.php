<?php
/* @var $this ProductBundleDeviceController */
/* @var $model ProductBundleDevice */

$this->breadcrumbs=array(
	'Product Bundle Devices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductBundleDevice', 'url'=>array('index')),
	array('label'=>'Manage ProductBundleDevice', 'url'=>array('admin')),
);
?>

<h1>Create ProductBundleDevice</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>