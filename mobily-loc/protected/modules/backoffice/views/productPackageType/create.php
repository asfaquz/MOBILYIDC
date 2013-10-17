<?php
/* @var $this ProductPackageTypeController */
/* @var $model ProductPackageType */

$this->breadcrumbs=array(
	'Product Package Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductPackageType', 'url'=>array('index')),
	array('label'=>'Manage ProductPackageType', 'url'=>array('admin')),
);
?>

<h1>Create ProductPackageType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>