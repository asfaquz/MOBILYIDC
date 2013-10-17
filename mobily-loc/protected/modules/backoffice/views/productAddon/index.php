<?php
/* @var $this ProductAddonController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Addons',
);

$this->menu=array(
	array('label'=>'Create ProductAddon', 'url'=>array('create')),
	array('label'=>'Manage ProductAddon', 'url'=>array('admin')),
);
?>

<h1>Product Addons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
