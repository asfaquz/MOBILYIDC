<?php

class SiteController extends Controller
{
	public $layout='column1';

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
        
        public function actionIndex()
        {
            //This is actual url we are calling api
          //  http://channel.jdc.dev/ae-en/url_api_controller3.php?service=RegisterCustomer&params=%5Bfirstname%3Dtesst%5D%5Blastname%3Dtesst%5D%5Bemail%3Dsadfasd%40gmail.com%5D%5Bemail_confirmation%3Dsadfasd%40gmail.com%5D%5Bpseudonym%3Ddsah28732hekwiu%5D%5Bgender%3Dmale%5D%5Bpassword%3DdsjEY232Ujj%5D%5Bpassword_confirmation%3DdsjEY232Ujj%5D%5Bsubscribe_newsletters%3Dfalse%5D%5Baccept_terms_of_service%3Dtrue%5D%5Bcountry_iso_code%3Dsa%5D&result=xml&output=
            $this->pageTitle = 'Mobily';
			$plan_types = ProductPackageType::model()->findAllByAttributes(array('customer_type' => 'b2c'));
			$plans = ProductPackage::model()->findAllByAttributes(array('customer_type' => 'b2c'));
			$devices = ProductDevice::model()->findAllByAttributes(array(
				'cash_sale_allowed' => 1,
				'customer_type' => 'b2c'
					));
			$this->render('index', array(
				"plans" => $plans,
				'devices' => $devices,
				'plan_types' => $plan_types
			));
           // echo "Welcome to Mobily IDC";
        }

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin() {
		$model = new LoginForm;
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			if ($model->validate() && $model->login()) {
				if (Yii::app()->user->name == 'admin') {
					$this->redirect(array('/backoffice'));
				}
			}
		}
		$this->render('login', array('model' => $model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
