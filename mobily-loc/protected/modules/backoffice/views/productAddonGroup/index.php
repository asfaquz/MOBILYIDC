<?php
/* @var $this ProductAddonGroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Addon Groups',
);

$this->menu=array(
	array('label'=>'Create ProductAddonGroup', 'url'=>array('create')),
	array('label'=>'Manage ProductAddonGroup', 'url'=>array('admin')),
);
?>

<h1>Product Addon Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
