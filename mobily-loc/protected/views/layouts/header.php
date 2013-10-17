<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo Yii::app()->getLanguage() ?>" lang="<?php echo Yii::app()->getLanguage() ?>">
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="<?php echo Yii::app()->getLanguage() ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-1.10.2.custom.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mobily-main_<?php echo Yii::app()->getLanguage(); ?>.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/hjri/jquery.calendars.picker.css" />
		<!--<script type="text/javascript" src="<?php //echo Yii::app() -> request -> baseUrl;       ?>/js/jquery-1.3.1.js"></script>-->
		<?php if ($this->jqueryInclude) { ?>
			<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
		<?php } ?>
<!--<script type="text/javascript" src="<?php //echo Yii::app() -> request -> baseUrl;       ?>/js/jquery.validate.js"></script>-->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.2.custom.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/hjri/jquery.calendars.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/hjri/jquery.calendars.plus.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/hjri/jquery.calendars.picker.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/hjri/jquery.calendars.islamic.js"></script>
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/mobfavicon.ico" type="image/x-icon" />
    </head>
    <body>
        <div class="container">
            <!--header---------------------------------------->
			<?php $this->renderPartial('//layouts/lang'); ?>
            <div class="search-bar dir-ltr display-none">
                <div class="padr-15 padl-20 padt-10 fl bordr-grey height-30"><a href="" class="text-dark-grey txt14">All Products <span class="arrow-grey-down valign-middle marl-10">&nbsp;</span></a></div>
                <div class="fl padl-30">
                    <span class="search-icon marr-5 mart-15">&nbsp;</span>
                    <span class="display-inline-block txt14 mart-12 valign-top">Search</span>
                    <input type="text" class="search-feild" />
                </div>
                <div class="fr txt14 marr-20 padl-20 bordl-grey height-30 padt-10"><a href="" class="text-dark-grey">Go</a></div>
            </div>
			<?php echo $this->renderPartial('//layouts/ajax_menu', array('showDevices' => $this->showDevices, 'links' => 1, 'uri' => 'bcustomer', 'plan_types' => $this->plan_types)); ?>
            <!--end header----------------------------------->