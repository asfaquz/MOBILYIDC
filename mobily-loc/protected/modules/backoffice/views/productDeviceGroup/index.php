<?php
/* @var $this ProductDeviceGroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Device Groups',
);

$this->menu=array(
	array('label'=>'Create ProductDeviceGroup', 'url'=>array('create')),
	array('label'=>'Manage ProductDeviceGroup', 'url'=>array('admin')),
);
?>

<h1>Product Device Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
