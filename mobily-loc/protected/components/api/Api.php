<?php

class Api {

	public static function AddUnit($params) {
		$sParams = '[id_seller=' . Yii::app()->params["id_seller"] . ']';
		$sParams .= '[id_item=' . $params['id_item'] . ']';
		$sParams .= '[id_offer=Mobily-4853199]';
		$sParams .= '[delivery_time=c]';
		$sParams .= '[unit_condition=new]';
		$sParams .= '[listing_price=' . $params['price'] * 100 . ']';
		$sParams .= '[amount=' . $params['qty'] . ']';
		$sParams .= '[location=' . Yii::app()->params["country_iso_code"] . ']';
		$sParams .= '[currency=' . Yii::app()->params["currency"] . ']';
		$sParams .= '[note=' . rand(10000, 99999) . ']';
		$aApiResult = ApiOutput::getOutput($sService = 'AddUnit', $sParams);
		if ($aApiResult === FALSE) {
			return FALSE;
		}
		if (!isset($aApiResult['souq']['request']['errors_attr']['count'])) {
			return false;
		}
		if ($aApiResult['souq']['request']['errors_attr']['count'] > 0) {
			return false;
		} else {
			return $aApiResult['souq']['result'];
		}
	}

	/* public static function GetCart() {
	  $aApiCall = ApiOutput::getOutput($sService = 'GetCart', '', $sResult = 'json', '', 'signed-nonce');
	  print_r($aApiCall);
	  die;
	  } */

	public static function AddUnitToCart($unit_id, $count) {

		$sParams = '[id_unit=' . $unit_id . '][count=' . $count . '][id_customer=' . Yii::app()->session['id_customer'] . ']';
		$aApiCall = ApiOutput::getOutput($sService = 'AddUnitToCartV1', $sParams, $sResult = 'json', '', 'signed-nonce');

		if ($aApiCall === FALSE) {
			return FALSE;
		}
		if (!isset($aApiCall['souq']['request']['errors_attr']['count'])) {
			return false;
		}
		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			return false;
		} else {
			return true;
		}
	}

	public static function LoginCustomer($params) {

		$sParams = '[email=' . trim($params["email"]) . '][password=' . $params["password"] . ']';
		$aApiCall = ApiOutput::getOutput($sService = 'LoginCustomer', $sParams, $sResult = 'json', '', 'signed-nonce');
		if ($aApiCall === FALSE) {
			return FALSE;
		}
		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			$aResult['error'] = $aApiCall['souq']['request']['errors']['error'];
		} else {
			$aResult['id_customer'] = $aApiCall['souq']['result']['results']['id_customer'];
			$aResult['pseudonym'] = $aApiCall['souq']['result']['results']['pseudonym'];
		}
		return $aResult;
	}

	public static function RegisterCustomer($params) {
		if(isset($params["firstname"])){
		$sApiRegisterParms = '[firstname=' . $params["firstname"] . ']';
		} else {
		$sApiRegisterParms = '[firstname=' . $params["first_name"] . ']';	
		}
		if(isset($params["lastname"])){
		$sApiRegisterParms.= '[lastname=' . $params["lastname"] . ']';
		} else {
		$sApiRegisterParms.= '[lastname=' . $params["last_name"] . ']';			
		}
		$sApiRegisterParms.= '[email=' . $params["email"] . ']';
		$sApiRegisterParms.= '[email_confirmation=' . $params["email"] . ']';
		$sApiRegisterParms.= '[pseudonym=' . $params["username"] . ']';
		$sApiRegisterParms.= '[gender=male]';
		$sApiRegisterParms.= '[password=dsjEY232Ujj]';
		$sApiRegisterParms.= '[password_confirmation=dsjEY232Ujj]';
		$sApiRegisterParms.= '[subscribe_newsletters=false]';
		$sApiRegisterParms.= '[accept_terms_of_service=true]';
		$sApiRegisterParms.= '[country_iso_code=' . Yii::app()->params['country_iso_code'] . ']';
		$sApiRegisterParms = $sApiRegisterParms;

		$aApiCall = ApiOutput::getOutput($sService = 'RegisterCustomer', $sApiRegisterParms, $sResult = 'json', '', 'signed-nonce');
		if ($aApiCall === FALSE) {
			return FALSE;
		}
		if (empty($aApiCall))
			return FALSE;
		else
			return $aApiCall;
	}

	public static function LoginCustomerByEmail($params) {
		$sParams = '[email=' . trim($params["email"]) . ']';
		$sParams .= '[VerificationCode=' . trim($params["code"]) . ']';
		$aApiCall = ApiOutput::getOutput($sService = 'LoginCustomerByEmail', $sParams, $sResult = 'json', '', 'signed-nonce');
		//print_r($aApiCall);die;
		if ($aApiCall === FALSE) {
			return FALSE;
		}
		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			$aResult['error'] = $aApiCall['souq']['request']['errors']['error'];
		} else {
			$aResult['id_customer'] = $aApiCall['souq']['result']['id_customer'];
			$aResult['pseudonym'] = $aApiCall['souq']['result']['pseudonym'];
		}
		return $aResult;
	}

	public static function GetShippingAddresses($id) {
		$sParams = '[id_customer=' . $id . ']';
		$aApiCall = ApiOutput::getOutput($sService = 'GetShippingAddresses', $sParams, $sResult = 'json', '', 'signed-nonce');
		if ($aApiCall === FALSE) {
			return FALSE;
		}
		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			$bCheckError = strpos($aApiCall['souq']['request']['errors']['error'], 'there is no Address for this customer');
			if ($bCheckError !== false) {
				return 'NO_ADDRESS';
			} else {
				return false;
			}
		} else {
			return $aApiCall;
		}
	}

	public static function GetShippingServices($idCustomerAddress = '') {

		if (empty($idCustomerAddress)) {
			$idCustomerAddress = Yii::app()->session['id_customer_address'];
		}
		$sParams = '[id_customer=' . Yii::app()->session['id_customer'] . '][id_customer_address=' . $idCustomerAddress . ']';

		$aApiCall = ApiOutput::getOutput($sService = 'GetShippingServices', $sParams, $sResult = 'json', '', 'signed-nonce');

		if ($aApiCall === FALSE) {
			return FALSE;
		}
		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			return;
		} else {
			$aShippingService['shipping'] = $aApiCall['souq']['result']['units']['unit']['service']['id_shipping_provider']
					. '-' . $aApiCall['souq']['result']['units']['unit']['service']['id_shipping_service'];
			$aShippingService['provider'] =
					Yii::t('strings', 'Note') . ": " . Yii::t('strings', 'Your shipment will be delivered to you via')
					. " " .
					$aApiCall['souq']['result']['units']['unit']['service']['provider_label']
					. " " .
					Yii::t('strings', 'within') . " " . $aApiCall['souq']['result']['units']['unit']['service']['delivery_time'];
			return $aShippingService;
		}
	}

	public static function CheckoutUseAddress($params) {

		$sParams = '[id_customer=' . Yii::app()->session['id_customer'] . '][id_customer_address=' . $params['id_customer_address_list'] . ']' . '[shipping_service=' . $params['shipping_services'] . ']';

		$aApiCall = ApiOutput::getOutput($sService = 'CheckoutUseAddress', $sParams, $sResult = 'json', '', 'signed-nonce');
		if ($aApiCall === FALSE) {
			return FALSE;
		}
		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			return false;
		} else {
			return $aApiCall;
		}
	}

	public static function GetPaymentMethods() {
		$sParams = '[id_customer=' . Yii::app()->session['id_customer'] . ']';
		$sParams .= '[product=checkout_du]';
		$sParams .= '[country=' . Yii::app()->params['country_iso_code'] . ']';
		$sParams .= '[language=en]';
		$aApiCall = ApiOutput::getOutput($sService = 'GetPaymentMethods', $sParams, $sResult = 'json', '', 'signed-nonce');
		if ($aApiCall === FALSE) {
			return FALSE;
		}
		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			Yii::log('GetPaymentMethods');
			throw new Exception('Unable To Get Payment method');
		} else {
			return $aApiCall['souq']['result'];
		}
	}

	public static function PreparePaymentMethod($aParams) {

		$sCountryCode = Yii::app()->params['country_iso_code'];
		$sLanguageCode = Yii::app()->getLanguage();
		$aSerializedParams['save_creditcard'] = 0;
		$aSerializedParams['use_saved_creditcard'] = $aParams['use_saved_creditcard'];
		$aSerializedParams['accept_url'] = Yii::app()->createAbsoluteUrl('product/Payment_accept');
		$aSerializedParams['exception_url'] = Yii::app()->createAbsoluteUrl('product/Payment?error=1');
		$sSerializedParams = serialize($aSerializedParams);
		$sParams = '[id_customer=' . Yii::app()->session['id_customer'] . ']';
		$sParams .= '[payment_method=' . $aParams['payment_method'] . ']';
		$sParams .= '[language=' . $sLanguageCode . ']';
		$sParams .= '[serialized_params=' . $sSerializedParams . ']';
		$sParams .= '[product=' . Yii::app()->params['payment_product'] . ']';

		$aApiCall = ApiOutput::getOutput($sService = 'PreparePaymentMethod', $sParams, $sResult = 'json', '', 'signed-nonce');
		
		if ($aApiCall === FALSE) {
			return FALSE;
		}
		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			return FALSE;
		} else {
			return $aApiCall['souq']['result'];
		}
	}

	public static function CreateOrderCOD($dIdCustomer, $payment_method) {
		$sParams = '[id_customer=' . $dIdCustomer . '][payment_method=' . $payment_method . ']';
		$aApiCall = ApiOutput::getOutput($sService = 'CreateOrderCOD', $sParams, $sResult = 'json', '', 'signed-nonce');
		
		if ($aApiCall === FALSE) {
			return FALSE;
		}
		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			return;
		} else {
			return $aApiCall;
		}
	}

	public static function DeleteCart() {
		$aApiCall = ApiOutput::getOutput($sService = 'DeleteCart', '', $sResult = 'json', '', 'signed-nonce');
		if ($aApiCall === FALSE) {
			return FALSE;
		}
		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			return false;
		} else {
			return $aApiCall;
		}
	}

	public static function DeleteUnitFromCart() {
		$sParams = '[id_unit=' . $dIdCustomer . '][id_session=' . $payment_method . ']';
		$aApiCall = ApiOutput::getOutput($sService = 'DeleteUnitFromCart', $sParams, $sResult = 'json', '', 'ident-nonce');
		if ($aApiCall === FALSE) {
			return FALSE;
		}
		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			return false;
		} else {
			return $aApiCall;
		}
	}

	public static function GuestCheckout($aParams) {
		// Get Cart Session namespace



		$aParams['OperatorPrefix'] = '055';

		$sApiRegisterParms = '';
		$aCRLFFilter = array("\r\n", "\n", "\r");
		$sApiRegisterParms .= '[firstname=' . $aParams['firstname'] . ']';
		$sApiRegisterParms .= '[lastname=' . $aParams['lastname'] . ']';
		$sApiRegisterParms .= '[street=' . $aParams['street'] = isset($aParams['street']) ? $aParams['street'] : '' . ']';
		$sApiRegisterParms .= '[CountryCode=' . '971' . ']';
		$sApiRegisterParms .= '[OperatorPrefix=' . $aParams['OperatorPrefix'] = (isset($aParams['OperatorPrefix']) ? $aParams['OperatorPrefix'] : '') . ']';
		$sApiRegisterParms .= '[phone=' . $aParams['phone'] . ']';
		$sApiRegisterParms .= '[housenumber=' . $aParams['housenumber'] = (isset($aParams['housenumber']) ? $aParams['housenumber'] : '') . ']';
		$sApiRegisterParms .= '[city=' . $aParams['city'] . ']';
		$sApiRegisterParms .= '[AddressArea=' . $aParams['AddressArea'] = (isset($aParams['AddressArea']) ? $aParams['AddressArea'] : '') . ']';
		$sApiRegisterParms .= '[note=' . $aParams['note'] = (isset($aParams['note']) ? $aParams['note'] : '') . ']';
		$sApiRegisterParms .= '[building_no=' . $aParams['building_no'] = (isset($aParams['building_no']) ? $aParams['building_no'] : '') . ']';
		$sApiRegisterParms .= '[country=' . Yii::app()->params['country_iso_code'] . ']';
		$sApiRegisterParms .= '[email=' . $aParams['email'] . ']';
		$sApiRegisterParms .= '[country_iso_code=' . Yii::app()->params['country_iso_code'] . ']';
		//echo $sApiRegisterParms;exit;
		//$sApiRegisterParms.= '[birthdate='. $REQUEST->birthdate.']';
		$sApiRegisterParms = str_replace($aCRLFFilter, ' ', $sApiRegisterParms);
		$aApiCall = ApiOutput::getOutput($sService = 'GuestCheckout', $sApiRegisterParms, $sResult = 'xml', '', 'signed-nonce');
		
		if ($aApiCall === FALSE) {
			return FALSE;
		}
		//$oCartSession->aGxoTempAddress = $REQUEST->getarray();
		Yii::app()->session['gxoTempAddress'] = $aParams;



		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			$aApiCallResult['status'] = 'error';
			$aApiCallResult['error'] = $aApiCall['souq']['request']['errors']['error'];
			return $aApiCallResult; // return error
		}

		// Save the form Data in the session
		Yii::app()->session['gxoActiveAddress'] = $aParams;
		$aApiCallResult['status'] = 'success';
		$aApiCallResult['result'] = $aApiCall['souq']['result'];
		return $aApiCallResult; // return results
	}

	public static function EmailVerification($email) {
		$sParams = '[VerificationCode=' . trim($email) . ']';
		$aApiCall = ApiOutput::getOutput($sService = 'EmailVerification', $sParams, $sResult = 'json', '', 'signed-nonce');
		if ($aApiCall === FALSE) {
			return FALSE;
		}
		if (isset($aApiCall['souq']['result']['status'])) {
			return $aApiCall['souq']['result']['status'];
		} else {
			return false;
		}
	}

	public static function AddNewAddress($aParams) {
		$aCRLFFilter = array("\r\n", "\n", "\r");

		$sApiRegisterParms = '[id_customer=' . Yii::app()->session['id_customer'] . ']';
		$sApiRegisterParms .= '[firstname=' . $aParams['firstname'] . ']';
		$sApiRegisterParms .= '[lastname=' . $aParams['lastname'] . ']';

		$sApiRegisterParms .= '[CountryCode=' . Yii::app()->params['country_landline_code'] . ']';
		$sApiRegisterParms .= '[OperatorPrefix=' . $aParams['OperatorPrefix'] . ']';
		$sApiRegisterParms .= '[phone=' . $aParams['phone'] . ']';
		$sApiRegisterParms .= '[CountryLandlineCode=' . Yii::app()->params['country_landline_code'] . ']';
		$sApiRegisterParms .= '[city=' . $aParams['city'] . ']';
		$sApiRegisterParms .= '[AddressArea=' . $aParams['AddressArea'] . ']';


		$sApiRegisterParms .= '[country=' . Yii::app()->params['country_iso_code'] . ']';

		if (isset($aParams['housenumber'])) {
			$sApiRegisterParms .= '[housenumber=' . $aParams['housenumber'] . ']';
		}
		if (isset($aParams['street'])) {
			$sApiRegisterParms .= '[street=' . $aParams['street'] . ']';
		}
		if (isset($aParams['building_no'])) {
			$sApiRegisterParms .= '[building_no=' . $aParams['building_no'] . ']';
		}

		if (isset($aParams['note'])) {
			$sApiRegisterParms .= '[note=' . $aParams['note'] . ']';
		}
		$sApiRegisterParms .= str_replace($aCRLFFilter, ' ', $sApiRegisterParms);
		$aApiCall = ApiOutput::getOutput($sService = 'AddShippingAddress', $sApiRegisterParms, $sResult = 'json', '', 'signed-nonce');
		if ($aApiCall === FALSE) {
			return FALSE;
		}

		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			$aResult['error'] = $aApiCall['souq']['request']['errors']['error'];
		} else {
			$aResult['id_customer_address'] = $aApiCall['souq']['result']['id_customer_address'];
		}
		return $aResult;
	}

	public static function EditCustomerAddress($REQUEST) {
		$aCRLFFilter = array("\r\n", "\n", "\r");
		$oCartSession = new Zend_Session_Namespace('Cart');
		$sApiRegisterParms = '[id_customer_address=' . $oCartSession->storage->id_customer_address . ']'; // OK
		$sApiRegisterParms .= '[firstname=' . $REQUEST->firstname . ']'; // OK
		$sApiRegisterParms .= '[lastname=' . $REQUEST->lastname . ']'; // OK
		$sApiRegisterParms .= '[city=' . $REQUEST->city . ']'; // OK
		$sApiRegisterParms .= '[region=' . $REQUEST->AddressArea . ']'; //
		$sApiRegisterParms .= '[language=en]'; // ok
		$sApiRegisterParms .= '[country=' . Zend_Registry::get('CFG_SYS_SITE_CODE') . ']';

		$sApiRegisterParms .= '[street=' . $REQUEST->street . ']';
		$sApiRegisterParms .= '[phone=' . $REQUEST->OperatorPrefix . $REQUEST->phone . ']'; // ok

		$sApiRegisterParms .= '[housenumber=' . $REQUEST->housenumber . ']';
		$sApiRegisterParms .= '[note=' . $REQUEST->note . ']';
		$sApiRegisterParms .= '[building_no=' . $REQUEST->building_no . ']';

		$sApiRegisterParms = str_replace($aCRLFFilter, ' ', $sApiRegisterParms);
		$aApiCall = ApiOutput::getOutput($sService = 'EditCustomerAddress', $sApiRegisterParms, $sResult = 'xml', '', 'signed-nonce');
		if ($aApiCall === FALSE) {
			return FALSE;
		}
		$oCartSession->aGxoTempAddress = $REQUEST->getarray();
		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			$aApiCallResult['status'] = 'error';
			$aApiCallResult['error'] = $aApiCall['souq']['request']['errors']['error'];
			return $aApiCallResult; // return error
		}
		$oCartSession->aGxoActiveAddress = $REQUEST->getarray();
		$aApiCallResult['status'] = 'success';
		$aApiCallResult['result'] = $aApiCall['souq']['result'];
		return $aApiCallResult; // return results
	}

	public static function SendSMSCode($aSmsParams) {
		if (!isset($aSmsParams['phone'])) {
			$oCartSession = new Zend_Session_Namespace('Cart');
			if (!isset($this->session['MobileNumber']) && empty($this->session['MobileNumber'])) {
				Yii::log('Failed to send sms, mobile number is empty');
				return false;
			}
		}


		//Yii::log(array(__FILE__,__LINE__,'Failed to send sms, mobile number is empty'));
		return true;
		/*
		 *
		 * To Be Revamb

		  $oDate = new DateTime('2000-01-01', new DateTimeZone('GMT'));

		  //Get Send Sms API Params Form the sys_config
		  try {
		  $oSmsApiParams	= Hits_System_Config::GetConfigList(
		  array(
		  'filter_by' => array(
		  'config_key' => array('IN' ,'Du_sms_vendorkey,Du_sms_cli')
		  )
		  )
		  );
		  } catch (Exception $e) {
		  __log(array(__FILE__,__LINE__,$e->getMessage()));
		  return false;
		  }

		  // Assing the SMS APi Params to $aSmsApiParams array
		  foreach ($oSmsApiParams->result as $oSmsApiParam){
		  $aSmsApiParams[str_replace('Du_sms_','',$oSmsApiParam->config_key)]	= $oSmsApiParam->config_value;
		  }


		  $aSmsApiParams['application']	= 'msg';
		  $aSmsApiParams['action']		= 'sendmsg';
		  $aSmsApiParams['responseType']	= 'xml';

		  //Inert the customer name and verification code to the sms text body
		  $sSmsText = Hits_Message_Handler::getMessageText('DU_SMS_VERIFICATION_TEXT');
		  $sSmsText = str_replace('#customer',$aSmsParams['customer'],$sSmsText);
		  $sSmsText = str_replace('#validation_code',$aSmsParams['validation_code'],$sSmsText);

		  $sXmlPostFields	= '<request>
		  <requestedon>'
		  .$oDate->format('Y-m-d H:i:s').' GMT'.
		  '</requestedon>
		  <msisdn>'.
		  $aSmsParams['phone']
		  .'</msisdn>
		  <cli>'.
		  $aSmsApiParams['cli']
		  .'</cli>
		  <message>
		  <udh>
		  </udh>
		  <content>
		  <![CDATA['.$sSmsText.' ]]>
		  </content>
		  </message>
		  <vendorkey>'.
		  $aSmsApiParams['vendorkey']
		  .'</vendorkey>
		  </request>';


		  // use insted of curl_ini
		  $oClient = new Zend_Http_Client();
		  $oClient->setParameterGet($aSmsApiParams);
		  $oClient->setParameterPost($sXmlPostFields);

		  // get the domain name

		  try {
		  $oSmsProvider	= Hits_System_Config::GetConfigList(
		  array(
		  'filter_by' => array(
		  'config_key' => array('=' ,'Du_Provider_sms')
		  )
		  )
		  );
		  } catch (Exception $e) {
		  __log(array(__FILE__,__LINE__,$e->getMessage()));
		  return false;
		  }


		  __log(array(__FILE__,__LINE__, 'http://'.$oSmsProvider->result[0]->config_value.'/cm/gateway/action'));
		  $oClient->setUri('http://'.$oSmsProvider->result[0]->config_value.'/cm/gateway/action');
		  $oClient->setRawData($sXmlPostFields,'text/xml');
		  $sResponse = $oClient->request(Zend_Http_Client::POST)->getBody();
		  $aSmsResult = ApiOutput::XmlToArray($sResponse);

		  if($aSmsResult['response']['success']){
		  return true;
		  }

		  __log(array(__FILE__,__LINE__,'Unable To send SMS'));

		 */
	}

	public static function SendEmailVerificationCode() {
		//$oCartSession	= new Zend_Session_Namespace('Cart');
		// Generate Email Verification Code
		$sApiVerifyCall = Api::CustomerVerificationGenerateCode(array('type' => 'Email'));

		if (!$sApiVerifyCall) { // check if the the API return the generated code
			//__log(array(__FILE__,__LINE__,'unable to generate Email Verification Code'));
			return false;
		}


		/*
		  // Set Temp Customer Bean
		  $oCustomer = new Customers_Bean();
		  $oCustomer->email		= $oCartSession->aGxoTempAddress['email'];
		  $oCustomer->firstname	= $oCartSession->aGxoTempAddress['firstname'];
		  $oCustomer->lastname	= $oCartSession->aGxoTempAddress['lastname'];

		  $oMail = new Du_Mail();


		  try {
		  $oMail->spool(
		  'email_verification',
		  array(
		  'recipient'			=> $oCustomer,
		  'code_verification' => $sApiVerifyCall
		  )
		  );
		  } catch (Exception $e) {
		  __log(array(__FILE,__LINE,$e->getMessage));
		  return false;
		  }

		 */
		return true;
	}

	public static function CustomerVerificationGenerateCode2($aParams) {
		$sParams = '[id_customer=' . $aParams . ']';
		$sParams .= '[type=email]';
		$aApiCall = ApiOutput::getOutput($sService = 'CustomerVerificationGenerateCode', $sParams, $sResult = 'json', '', 'signed-nonce');
		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			Yii::log('error to Generate Email Code ');
			return false;
		} else {
			return $aApiCall['souq']['result']['verification_code'];
		}
	}

	public static function CustomerVerificationGenerateCode($aParams) {
		switch ($aParams['type']) {
			case 'SMS':
				$sParams = '[id_customer=' . $aParams['id_customer'] . ']';
				$sParams .= '[id_customer_address=' . $aParams['id_customer_address'] . ']';
				$sParams .= '[phone=' . $aParams['phone'] . ']';
				$sParams .= '[type=sms]';
				break;
			case 'Email':
				$sParams = '[id_customer=' . $aParams['id_customer'] . ']';
				$sParams .= '[type=email]';
				break;
			default:
				return;
				break;
		}
		$aApiCall = ApiOutput::getOutput($sService = 'CustomerVerificationGenerateCode', $sParams, $sResult = 'json', '', 'signed-nonce');
		if ($aApiCall === FALSE) {
			return FALSE;
		}
		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			Yii::log('error to Generate Email Code ');
			return false;
		} else {
			return $aApiCall['souq']['result']['verification_code'];
		}
	}

	public static function CustomerVerificationCheck($aParams) {
		switch ($aParams['type']) {
			case 'SMS':
				$sParams = '[VerificationCode=' . $aParams['VerificationCode'] . ']';
				$sParams .= '[phone=' . $aParams['phone'] . ']';
				$sParams .= '[type=sms]';
				break;

			case 'Email':
				$sParams = '[VerificationCode=' . $aParams['VerificationCode'] . ']';
				$sParams .= '[email=' . $aParams['email'] . ']';
				$sParams .= '[type=email]';
				break;
			default:
				return;
				break;
		}

		$aApiCall = ApiOutput::getOutput($sService = 'CustomerVerificationCheck', $sParams, $sResult = 'json', '', 'signed-nonce');
		//print_r($aApiCall);
		if ($aApiCall === FALSE) {
			return FALSE;
		}
		if ($aApiCall['souq']['request']['errors_attr']['count'] > 0) {
			yii::log('error to verfiy sms code');
			return false;
		} else {
			return $aApiCall['souq']['result']['status'];
		}
	}

}

?>