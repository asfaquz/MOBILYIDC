<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />

<!-- blueprint CSS framework -->
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
	media="screen, projection" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
	media="print" />
<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
<![endif]-->

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/main-admin.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/functions.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.validate.js"></script>
			
			
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div class="container" id="page">

		<div id="header">
			<div id="logo">
				<?php echo CHtml::encode(Yii::app()->name); ?>
			</div>
		</div>
		<!-- header -->

		<div id="mainmenu">
			<?php $this->widget('zii.widgets.CMenu',array(
			    'activateParents'=>true,
			
					'items'=>array(
							//array('label'=>'Dashboard', 'url'=>array('/backoffice')),
							//array('label'=>'Back-office Users', 'url'=>array('/backoffice/officeuser')),
							//array('label'=>'Users', 'url'=>array('/backoffice/users')),
							//array('label'=>'Items', 'url'=>array('/backoffice/items')),
							//array('label'=>'Plans', 'url'=>array('/backoffice/plans')),
							//array('label'=>'Addons', 'url'=>array('/backoffice/addon')),
							//array('label'=>'Addons Values', 'url'=>array('/backoffice/addonvalue')),
							array('label'=>'Products', 'url'=>array('/backoffice'),
							'items'=>array(
							    array('label'=>'Product', 'url'=>array('/backoffice/productAdmin')),
								array('label'=>'Types','url'=>array('/backoffice/productType')),
								array('label'=>'Device','url'=>array('/backoffice/productDevice')),
								array('label'=>'Device Group','url'=>array('/backoffice/productDeviceGroup')),
								array('label'=>'Addon', 'url'=>array('/backoffice/productAddon')),
 								array('label'=>'Addon Group', 'url'=>array('/backoffice/productAddonGroup')),
 								array('label'=>'Package', 'url'=>array('/backoffice/ProductPackage')),
 								array('label'=>'Package Types', 'url'=>array('/backoffice/ProductPackageType')),
        					),
							),
							array('label' => 'Upload MSISDN','url' => array('/backoffice/phonenumber/import')),
							array('label' => 'Users','url' => array('/backoffice/Users')),
							array('label' => 'Mobily Orders','url' => array('/backoffice/MobilyOrders')),

							array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
							
							
					),
					 
)); ?>
		</div>
		<!-- mainmenu -->
		<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs, 'homeLink' => CHtml::link('Dashboard',Yii::app()->createUrl('/backoffice'))
		)); ?>
		<!-- breadcrumbs -->
		<?php endif?>

		<?php echo $content; ?>

		<div class="clear"></div>

		<div id="footer">
			Copyright &copy;
			<?php echo date('Y'); ?>
			by SOUQ.com.<br /> All Rights Reserved.<br />
		</div>
		<!-- footer -->

	</div>
	<!-- page -->

</body>
</html>
