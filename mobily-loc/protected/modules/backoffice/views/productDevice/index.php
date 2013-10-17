<?php
/* @var $this ProductDeviceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Devices',
);

$this->menu=array(
	array('label'=>'Create ProductDevice', 'url'=>array('create')),
	array('label'=>'Manage ProductDevice', 'url'=>array('admin')),
);
?>

<h1>Product Devices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
