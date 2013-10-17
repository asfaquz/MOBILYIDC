<?php
/* @var $this ProductAddonController */
/* @var $model ProductAddon */

$this->breadcrumbs=array(
	'Product Addons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductAddon', 'url'=>array('index')),
	array('label'=>'Manage ProductAddon', 'url'=>array('admin')),
);
?>

<h1>Create ProductAddon</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>