<?php
/* @var $this ProductDeviceGroupController */
/* @var $model ProductDeviceGroup */

$this->breadcrumbs=array(
	'Product Device Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductDeviceGroup', 'url'=>array('index')),
	array('label'=>'Manage ProductDeviceGroup', 'url'=>array('admin')),
);
?>

<h1>Create ProductDeviceGroup</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>