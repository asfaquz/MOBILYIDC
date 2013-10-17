<?php
/* @var $this ProductAddonGroupController */
/* @var $model ProductAddonGroup */

$this->breadcrumbs=array(
	'Product Addon Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductAddonGroup', 'url'=>array('index')),
	array('label'=>'Manage ProductAddonGroup', 'url'=>array('admin')),
);
?>

<h1>Create ProductAddonGroup</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>