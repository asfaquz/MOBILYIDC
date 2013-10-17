<?php
/* @var $this OfficeUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Office Users',
);

$this->menu=array(
	array('label'=>'Create OfficeUser', 'url'=>array('create')),
	array('label'=>'Manage OfficeUser', 'url'=>array('admin')),
);
?>

<h1>Office Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
