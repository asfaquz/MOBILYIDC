<?php
/* @var $this ProductDeviceController */
/* @var $model ProductDevice */

$this->breadcrumbs=array(
	'Product Devices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductDevice', 'url'=>array('index')),
	array('label'=>'Manage ProductDevice', 'url'=>array('admin')),
);
?>

<h1>Create ProductDevice</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>