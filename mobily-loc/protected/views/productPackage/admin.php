<?php
/* @var $this ProductPackageController */
/* @var $model ProductPackage */

$this->breadcrumbs=array(
	'Product Packages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProductPackage', 'url'=>array('index')),
	array('label'=>'Create ProductPackage', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-package-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Product Packages</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-package-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'product_package_id',
		'package_name',
		'speed_based',
		'package_type',
		'customer_type',
		'img',
		/*
		'package_type_id',
		'name_en',
		'name_ar',
		'desc_en',
		'desc_ar',
		'enabled',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
