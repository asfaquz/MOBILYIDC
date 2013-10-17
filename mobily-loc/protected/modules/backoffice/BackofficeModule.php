<?php

class BackofficeModule extends CWebModule
{
    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
       $this->setImport(array(
            'backoffice.models.*',
            'backoffice.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if(parent::beforeControllerAction($controller, $action))
        {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }
//    public function beforeControllerAction($controller, $action) {
//    	if (parent::beforeControllerAction($controller, $action)) {
//            //echo Yii::app()->user->name;
////    		if (isset(Yii::app()->user->name)) {
////    			if (Yii::app()->user->name != 'admin') {
////    				Yii::app()->request->redirect('site/login');
////    			} else {
////    				return true;
////    			}
////    		} else {
////    			Yii::app()->request->redirect('site/login');
////    		}
//    	}
//    	else
//    		return false;
//    }
}