<?php
/* @var $this OfficeUserController */
/* @var $model OfficeUser */

$this->breadcrumbs=array(
	'Office Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OfficeUser', 'url'=>array('index')),
	array('label'=>'Create OfficeUser', 'url'=>array('create')),
	array('label'=>'Update OfficeUser', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OfficeUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OfficeUser', 'url'=>array('admin')),
);
?>

<h1>View OfficeUser #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
	),
)); ?>
