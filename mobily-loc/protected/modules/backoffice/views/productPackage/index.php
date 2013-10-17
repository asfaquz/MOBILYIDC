<?php
/* @var $this ProductPackageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Packages',
);

$this->menu=array(
	array('label'=>'Create ProductPackage', 'url'=>array('create')),
	array('label'=>'Manage ProductPackage', 'url'=>array('admin')),
);
?>

<h1>Product Packages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
