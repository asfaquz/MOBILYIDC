<?php
/* @var $this OfficeUserController */
/* @var $model OfficeUser */

$this->breadcrumbs=array(
	'Office Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OfficeUser', 'url'=>array('index')),
	array('label'=>'Manage OfficeUser', 'url'=>array('admin')),
);
?>

<h1>Create OfficeUser</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>