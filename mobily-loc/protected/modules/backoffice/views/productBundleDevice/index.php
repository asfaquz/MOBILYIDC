<?php
/* @var $this ProductBundleDeviceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Bundle Devices',
);

$this->menu=array(
	array('label'=>'Create ProductBundleDevice', 'url'=>array('create')),
	array('label'=>'Manage ProductBundleDevice', 'url'=>array('admin')),
);
?>

<h1>Product Bundle Devices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
