<?php
/* @var $this ProductPackageTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Package Types',
);

$this->menu=array(
	array('label'=>'Create ProductPackageType', 'url'=>array('create')),
	array('label'=>'Manage ProductPackageType', 'url'=>array('admin')),
);
?>

<h1>Product Package Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
