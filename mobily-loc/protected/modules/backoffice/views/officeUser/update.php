<?php
/* @var $this OfficeUserController */
/* @var $model OfficeUser */

$this->breadcrumbs=array(
	'Office Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OfficeUser', 'url'=>array('index')),
	array('label'=>'Create OfficeUser', 'url'=>array('create')),
	array('label'=>'View OfficeUser', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OfficeUser', 'url'=>array('admin')),
);
?>

<h1>Update OfficeUser <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>