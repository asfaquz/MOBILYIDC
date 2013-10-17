<?php
/* @var $this ProductDeviceController */
/* @var $model ProductDevice */

$this->breadcrumbs=array(
	'Product Devices'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProductDevice', 'url'=>array('index')),
	array('label'=>'Create ProductDevice', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-device-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Product Devices</h1>

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
	'id'=>'product-device-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'product_device_id',
		'id_item',
		'sku',
		'device_name',
		'group_id',
		'cash_sale_allowed',
		/*
		'cash_price',
		'pt',
		'pr',
		'customer_type',
		'img',
		'name_en',
		'name_ar',
		'enabled',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
