<?php

class MobilyApi extends MobilyAuth {

	const MOBILY_XML_DIRE						= '/protected/data/xml-mobily/';
	const B2B_ACCOUNT_INQUIRY					= 'B2B_ACCOUNT_INQUIRY.xml';
	const B2B_CREATE_CUSTOMER_ACCOUNT			= 'B2B_CREATE_CUSTOMER_ACCOUNT.xml';
	const B2B_UPDATE_CUSTOMER_ACCOUNT			= 'B2B_UPDATE_CUSTOMER_ACCOUNT.xml';
	const B2B_USER_CREATION						= 'B2B_USER_CREATION.xml';
	const B2B_ASSOCIATE_MBA						= 'B2B_ASSOCIATE_MBA.xml';
	const USERNAME_VALIDATION					= 'USERNAME_VALIDATION.xml';
	const CRM_VALIDATION						= 'B2C/CRM_VALIDATION.xml';
	const B2C_VERIFY_PIN						= 'B2C/CREATE_CONSUMER_PIN_VERIFICATION.xml';
	const B2C_CREATE_CONSUMER_USER				= 'B2C/CREATE_CONSUMER_USER.xml';
	const B2C_CHECK_ACCOUNT_PIN_VERIFICATION	= 'B2C/CHECK_ACCOUNT_PIN_VERIFICATION.xml';
	const B2C_CREATE_DUMMY_USER					= 'B2C/CREATE_DUMMY_USER.xml';
	const B2C_UPDATE_CUSTOMER					= 'B2C/UPDATE_CUSTOMER.xml';
	const B2C_CREATE_CUSTOMER					= 'B2C/CREATE_CUSTOMER.xml';
	const B2C_CHECK_EPORTAL_ACCOUNT_EXISTENCE	= 'B2C/CHECK_EPORTAL_ACCOUNT_EXISTENCE.xml';
	const B2C_ELM_VALIDATION					= 'B2C/B2C_ELM_VALIDATION.xml';
	const B2C_ASSOCIATE_WITH_USERNAME			= 'B2C/ASSOCIATE_WITH_USERNAME.xml';
	const B2C_GET_CUSTOMER_INFO					= 'B2CAPI/B2C_GET_CUSTOMER_INFO.xml';
	const B2C_BULK_BALANCE_INQUIRY				= 'B2C/B2C_BULK_BALANCE_INQUIRY.xml';

	public static function b2cGetCustomerInfo($aParams=null, $sReturnFormat='array') {

		$oDoc = new DOMDocument();
		$oDoc -> load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2C_GET_CUSTOMER_INFO);
		$oXpath = new DOMXPath($oDoc);
		foreach ($aParams as $key => $value) {
			$nodes = $oXpath -> query('//' . $key);
			$node = $nodes -> item(0);
			if (isset($node -> nodeName) && $key == $node -> nodeName) {
				$node -> nodeValue = !empty($value) ? $value : $node -> nodeValue;
			}
			$node = NULL;
			$nodes = NULL;
		}

		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);

		if (empty($aCurlPost)) {
			return false;
		}

		$oDoc -> loadXML($aCurlPost);
		$oXpath = new DOMXPath($oDoc);
		$aResult = $oXpath -> query('//SiebelMessage');

		if ($sReturnFormat == 'array') {
			$aResult = ApiOutput::XmlToArray($aCurlPost);
			if (isset($aResult['Envelope']['Body']['m:executeReturn']['requestXml']['SiebelMessage'])) {
				return $aResult['Envelope']['Body']['m:executeReturn']['requestXml']['SiebelMessage'];
			}
			return false;
		} elseif ($sReturnFormat == 'json') {
			$aResult = ApiOutput::XmlToArray($aCurlPost);
			if (isset($aResult['Envelope']['Body']['m:executeReturn']['requestXml']['SiebelMessage'])) {
				$aResult = $aResult['Envelope']['Body']['m:executeReturn']['requestXml']['SiebelMessage'];
				return json_encode($aResult);
			}
			return false;
		}

		return $aCurlPost;
	}


	public static function B2C_GET_CUSTOMER_INFO($params) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2C_GET_CUSTOMER_INFO);
		$oXpath = new DOMXPath($oDoc);
		foreach ($params as $key => $value) {
			$nodes = $oXpath->query('//' . $key);
			$node = $nodes->item(0);
			if (isset($node->nodeName) && $key == $node->nodeName)
				$node->nodeValue = !empty($value) ? $value : $node->nodeValue;
			$node = NULL;
			$nodes = NULL;
		}
		echo $oDoc -> saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML());
		echo $aCurlPost;
		exit;
	}

	public static function B2B_USER_CREATION($params) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2B_USER_CREATION);
		$oXpath = new DOMXPath($oDoc);
		$nodes = $oXpath->query('//Params/Param/Key | //Params/Param/Value');
		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey = $nodes->item($i);
			$nodeValue = $nodes->item(++$i);
			switch ($nodeKey->nodeValue) {
				case 'USERNAME' :
					$nodeValue->nodeValue = $params['username'];
					break;
				case 'PASSWORD' :
					$nodeValue->nodeValue = $params['password'];
					break;
				case 'EMAIL' :
					$nodeValue->nodeValue = $params['email'];
					break;
				case 'MOBILENO' :
					$nodeValue->nodeValue = $params['mobile_number'];
					break;
				case 'LANGUAGE' :
					$nodeValue->nodeValue = $params['lang'];
					break;
				default :
					break;
			}
		}
		echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		echo $aCurlPost;
		exit;
		if (empty($aCurlPost)) {
			return FALSE;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath = new DOMXPath($oDoc);
		$errorCode = $oXpath->query('//ErrorCode');
		$aApiResult['errorCode'] = $errorCode->item(0)->nodeValue;

		$errorMsg = $oXpath->query('//ErrorMsg');
		$aApiResult['errorMsg'] = $errorMsg->item(0)->nodeValue;
		return $aApiResult;
	}

	public static function CRM_VALIDATION($params)
	{
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::CRM_VALIDATION);
		$oXpath = new DOMXPath($oDoc);
		$nodes = $oXpath->query('//KeyType | //KeyValue');
		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey = $nodes->item($i);
			$nodeValue = $nodes->item($i);
			switch ($nodeKey->nodeName) {
				case 'KeyType' :
					$nodeValue->nodeValue = $params['KeyType'];
					break;
				case 'KeyValue' :
					$nodeValue->nodeValue = $params['KeyValue'];
					break;
				default :
					break;
			}
		}
		echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		echo $aCurlPost;
		exit;
		if (empty($aCurlPost)) {
			return FALSE;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath = new DOMXPath($oDoc);
		$sSiebelMessage = $oXpath->query('//SiebelMessage');
		$aApiResult['SiebelMessage'] = $sSiebelMessage->item(0)->nodeValue;

		//$errorMsg = $oXpath->query('//ErrorMsg');
		//$aApiResult['errorMsg'] = $errorMsg->item(0)->nodeValue;
		return $aApiResult;
	}

	public static function B2B_ASSOCIATE_MBA($params) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2B_ASSOCIATE_MBA);
		$oXpath = new DOMXPath($oDoc);
		$nodes = $oXpath->query('//Params/Param/Key | //Params/Param/Value');
		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey = $nodes->item($i);
			$nodeValue = $nodes->item(++$i);
			switch ($nodeKey->nodeValue) {
				case 'USERNAME' :
					$nodeValue->nodeValue = $params['username'];
					break;
				case 'MBA' :
					$nodeValue->nodeValue = $params['mba'];
					break;
				default :
					break;
			}
		}
		//echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		//echo $aCurlPost;
		//exit;
		if (empty($aCurlPost)) {
			return FALSE;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath = new DOMXPath($oDoc);
		$errorCode = $oXpath->query('//ErrorCode');
		$aApiResult['errorCode'] = $errorCode->item(0)->nodeValue;

		$errorMsg = $oXpath->query('//ErrorMsg');
		$aApiResult['errorMsg'] = $errorMsg->item(0)->nodeValue;
		return $aApiResult;
	}

	public static function B2B_CREATE_CUSTOMER_ACCOUNT2() {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2B_CREATE_CUSTOMER_ACCOUNT);
		$oXpath = new DOMXPath($oDoc);
		echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML());
		echo $aCurlPost;
		//exit;
	}

	public static function B2B_CREATE_CUSTOMER_ACCOUNT($id, $params) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2B_CREATE_CUSTOMER_ACCOUNT);

		$oXpath = new DOMXPath($oDoc);
		$params['Customers']['ChannelTransId'] = $id;
		foreach ($params['Customers'] as $key => $value) {
			$nodes = $oXpath->query('//' . $key);
			$node = $nodes->item(0);
			if (isset($node->nodeName) && $key == $node->nodeName)
				$node->nodeValue = !empty($value) ? $value : $node->nodeValue;
			$node = NULL;
			$nodes = NULL;
		}
		//echo $oDoc->saveXML();
		//exit;
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML());
		//echo $aCurlPost;
		if (empty($aCurlPost)) {
			return FALSE;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath = new DOMXPath($oDoc);
		$status = $oXpath->query('//status');
		if ($status->item(0)->nodeValue == 'Success') {
			return $id;
		} else {
			return FALSE;
		}
	}

	public static function B2B_UPDATE_CUSTOMER_ACCOUNT($id, $params)
	{
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2B_UPDATE_CUSTOMER_ACCOUNT);

		$oXpath = new DOMXPath($oDoc);

		$params['Customers']['ChannelTransId'] = $id;
		foreach ($params['Customers'] as $key => $value) {
			$nodes = $oXpath->query('//' . $key);
			$node = $nodes->item(0);
			if (isset($node->nodeName) && $key == $node->nodeName)
				$node->nodeValue = !empty($value) ? $value : $node->nodeValue;
			$node = NULL;
			$nodes = NULL;
		}

		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML());

		if (empty($aCurlPost)) {
			return FALSE;
		}

		$oDoc->loadXML($aCurlPost);
		$oXpath = new DOMXPath($oDoc);
		$status = $oXpath->query('//status');
		if ($status->item(0)->nodeValue == 'Success') {
			return $id;
		} else {
			return FALSE;
		}
	}

	public static function USERNAME_VALIDATION($param_user) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::USERNAME_VALIDATION);

		$oXpath = new DOMXPath($oDoc);

		$nodes = $oXpath->query('//Params/Param/Key | //Params/Param/Value');

		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey = $nodes->item($i);
			$nodeValue = $nodes->item(++$i);
			switch ($nodeKey->nodeValue) {
				case 'USERNAME' :
					$nodeValue->nodeValue = $param_user;
					break;
				default :
					break;
			}
		}
		echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		echo($aCurlPost);
		if (empty($aCurlPost)) {
			return FALSE;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath = new DOMXPath($oDoc);
		$errorCode = $oXpath->query('//ErrorCode');
		$aApiResult['errorCode'] = $errorCode->item(0)->nodeValue;

		$errorMsg = $oXpath->query('//ErrorMsg');
		$aApiResult['errorMsg'] = $errorMsg->item(0)->nodeValue;
		return $aApiResult['errorMsg'];
	}

	public static function b2cVerifyPin($params)
	{
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2C_VERIFY_PIN);
		$oXpath	= new DOMXPath($oDoc);
		$nodes	= $oXpath->query('//Params/Param/Key | //Params/Param/Value');

		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey	= $nodes->item($i);
			$nodeValue	= $nodes->item(++$i);
			switch ($nodeKey->nodeValue) {
				case 'HASHCODE' :
					$nodeValue->nodeValue = $params['hashcode'];
					break;
				case 'PIN' :
					$nodeValue->nodeValue = $params['pin'];
					break;
				default :
					break;
			}
		}

		echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		echo($aCurlPost);
		exit;
		if (empty($aCurlPost)) {
			return false;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath		= new DOMXPath($oDoc);
		$errorCode	= $oXpath->query('//ErrorCode');

		if ($errorCode->item(0)->nodeValue == 0) {
			return true;
		} else {
			return false;
		}
	}

	public static function b2cCreateConsumerUser($params)
	{
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2C_CREATE_CONSUMER_USER);
		$oXpath	= new DOMXPath($oDoc);
		$nodes	= $oXpath->query('//Params/Param/Key | //Params/Param/Value');

		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey	= $nodes->item($i);
			$nodeValue	= $nodes->item(++$i);
			switch ($nodeKey->nodeValue) {
				case 'HASHCODE' :
					$nodeValue->nodeValue = $params['hashcode'];
					break;
				case 'USERNAME' :
					$nodeValue->nodeValue = $params['username'];
					break;
				case 'EMAIL' :
					$nodeValue->nodeValue = $params['email'];
					break;
				case 'LANGUAGE' :
					$nodeValue->nodeValue = $params['language'];
					break;
				case 'NAME' :
					$nodeValue->nodeValue = $params['name'];
					break;
				default :
					break;
			}
		}

		echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		echo $aCurlPost;
		exit;

		if (empty($aCurlPost)) {
			return false;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath		= new DOMXPath($oDoc);
		$errorCode	= $oXpath->query('//ErrorCode');

		if ($errorCode->item(0)->nodeValue == 0) {
			return true;
		} else {
			return false;
		}
	}

	public static function b2cCheckAccountPinVerification($params)
	{
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2C_CHECK_ACCOUNT_PIN_VERIFICATION);
		$oXpath	= new DOMXPath($oDoc);
		$nodes	= $oXpath->query('//Params/Param/Key | //Params/Param/Value');

		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey	= $nodes->item($i);
			$nodeValue	= $nodes->item(++$i);
			switch ($nodeKey->nodeValue) {
				case 'MSISDN_SAN' :
					$nodeValue->nodeValue = $params['msisdn_san'];
					break;
				case 'ID' :
					$nodeValue->nodeValue = $params['id'];
					break;
				default :
					break;
			}
		}

		echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		echo $aCurlPost;
		exit;
		if (empty($aCurlPost)) {
			return false;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath		= new DOMXPath($oDoc);
		$errorCode	= $oXpath->query('//ErrorCode');

		if ($errorCode->item(0)->nodeValue == 0) {
			return $oXpath->query('//VERIFICATION_REQUIRED');
		} else {
			return false;
		}
	}

	public static function b2cCreateDummyUser($params)
	{
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2C_CREATE_DUMMY_USER);
		$oXpath	= new DOMXPath($oDoc);
		$nodes	= $oXpath->query('//Params/Param/Key | //Params/Param/Value');

		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey	= $nodes->item($i);
			$nodeValue	= $nodes->item(++$i);
			switch ($nodeKey->nodeValue) {
				case 'USERNAME' :
					$nodeValue->nodeValue = $params['username'];
					break;
				case 'EMAIL' :
					$nodeValue->nodeValue = $params['email'];
					break;
				case 'MOBILENO' :
					$nodeValue->nodeValue = $params['mobile'];
					break;
				case 'LANGUAGE' :
					$nodeValue->nodeValue = $params['language'];
					break;
				case 'Name' :
					$nodeValue->nodeValue = $params['name'];
					break;
				default :
					break;
			}
		}
		echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		echo $aCurlPost;
		exit;
		if (empty($aCurlPost)) {
			return false;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath		= new DOMXPath($oDoc);
		$errorCode	= $oXpath->query('//ErrorCode');

		if ($errorCode->item(0)->nodeValue == 0) {
			return true;
		} else {
			return false;
		}
	}

	public static function b2cUpdateCustomerAccount($id, $params)
	{
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2C_UPDATE_CUSTOMER);

		$oXpath = new DOMXPath($oDoc);

		$params['ChannelTransId'] = $id;
		foreach ($params as $key => $value) {
			$nodes = $oXpath->query('//' . $key);
			$node = $nodes->item(0);
			if (isset($node->nodeName) && $key == $node->nodeName) {
				$node->nodeValue = !empty($value) ? $value : $node->nodeValue;
			}

			$node = NULL;
			$nodes = NULL;
		}

		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML());
		if (empty($aCurlPost)) {
			return false;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath		= new DOMXPath($oDoc);
		$errorCode	= $oXpath->query('//ErrorCode');

		if ($errorCode->item(0)->nodeValue == 0) {
			return true;
		} else {
			return false;
		}
	}

	public static function b2cCreateCustomerAccount($id, $params)
	{
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2C_CREATE_CUSTOMER);

		$oXpath = new DOMXPath($oDoc);

		$params['ChannelTransId'] = $id;
		foreach ($params as $key => $value) {
			$nodes = $oXpath->query('//' . $key);
			$node = $nodes->item(0);
			if (isset($node->nodeName) && $key == $node->nodeName)
				$node->nodeValue = !empty($value) ? $value : $node->nodeValue;
			$node = NULL;
			$nodes = NULL;
		}
		//echo $oDoc->saveXML();

		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML());
		//echo $aCurlPost;
		//exit;
		if (empty($aCurlPost)) {
			return FALSE;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath = new DOMXPath($oDoc);
		$status = $oXpath->query('//status');
		if ($status->item(0)->nodeValue == 'Success') {
			return $id;
		} else {
			return FALSE;
		}
	}

	public static function b2cCheckEportalAccountExistence($params)
	{
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2C_CHECK_EPORTAL_ACCOUNT_EXISTENCE);
		$oXpath	= new DOMXPath($oDoc);
		$nodes	= $oXpath->query('//Params/Param/Key | //Params/Param/Value');

		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey	= $nodes->item($i);
			$nodeValue	= $nodes->item(++$i);
			switch ($nodeKey->nodeValue) {
				case 'LineNumber' :
					$nodeValue->nodeValue = $params['linenumber'];
					break;
				default :
					break;
			}
		}

		echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		echo $aCurlPost;
		exit;
		if (empty($aCurlPost)) {
			return false;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath		= new DOMXPath($oDoc);
		$errorCode	= $oXpath->query('//ErrorCode');

		if ($errorCode->item(0)->nodeValue == 0) {
			return true;
		} else {
			return false;
		}
	}

	public static function b2cAlElmValidation($params)
	{
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2C_ELM_VALIDATION);
		$oXpath = new DOMXPath($oDoc);
		foreach ($params as $key => $value) {
			$nodes = $oXpath->query('//' . $key);
			$node = $nodes->item(0);
			if (isset($node->nodeName) && $key == $node->nodeName)
				$node->nodeValue = !empty($value) ? $value : $node->nodeValue;
			$node = NULL;
			$nodes = NULL;
		}
		echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML());
		echo $aCurlPost;
		exit;
	}

	public static function b2cAssociateWithUsername($params)
	{
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2C_ASSOCIATE_WITH_USERNAME);
		$oXpath	= new DOMXPath($oDoc);
		$nodes	= $oXpath->query('//Params/Param/Key | //Params/Param/Value');

		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey	= $nodes->item($i);
			$nodeValue	= $nodes->item(++$i);
			switch ($nodeKey->nodeValue) {
				case 'USERNAME' :
					$nodeValue->nodeValue = $params['username'];
					break;
				case 'MSISDN' :
					$nodeValue->nodeValue = $params['msisdn'];
					break;
				case 'SAN' :
					$nodeValue->nodeValue = $params['san'];
					break;
				default :
					break;
			}
		}

		//echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		//echo $aCurlPost;
		//exit;
		if (empty($aCurlPost)) {
			return false;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath		= new DOMXPath($oDoc);
		$errorCode	= $oXpath->query('//ErrorCode');

		if ($errorCode->item(0)->nodeValue == 0) {
			return true;
		} else {
			return false;
		}
	}




	public static function Dms($params) {
		$oClient = new SoapClient(
						"http://84.23.107.103:9080/LogtaWebservice/LogtaWSService/WEB-INF/wsdl/LogtaWSService.wsdl"
		);
		$parameters = array(
			'arg0' => 'souq.com',
			'arg1' => 'mobily@123',
			'arg2' => $params['customer_no'],
			'arg3' => $params['order'],
			'arg4' => $params['file'],
			'arg5' => $params['mime'],
			'arg6' => $params['type']);
		$request = array('parameters' => $parameters);
		$result = $oClient->__soapCall('uploadDocument', $request);
		$r = self::object_2_array($result);
		if ($r['return'] == 'uploading done successfully') {
			return 1;
		}
		return 0;
	}

	public static function object_2_array($result) {
		$array = array();
		foreach ($result as $key => $value) {
			if (is_object($value)) {
				$array[$key] = self::object_2_array($value);
			}
			if (is_array($value)) {
				$array[$key] = self::object_2_array($value);
			} else {
				$array[$key] = $value;
			}
		}
		return $array;
	}

	public static function work_order_creation($params) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . 'work_order_creation.xml');

		$oXpath = new DOMXPath($oDoc);
		foreach ($params as $key => $value) {
			$nodes = $oXpath->query('//' . $key);
			$node = $nodes->item(0);
			if (isset($node->nodeName) && $key == $node->nodeName)
				$node->nodeValue = !empty($value) ? $value : $node->nodeValue;
			$node = NULL;
			$nodes = NULL;
		}
		//echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML());
		//echo $aCurlPost;exit;
		//return $_POST['Customers']['ChannelTransId'];
		//echo $aCurlPost;die;
		$oDoc->loadXML($aCurlPost);
		$oXpath = new DOMXPath($oDoc);
		$errorCode = $oXpath->query('//ErrorCode');
		$aApiResult['errorCode'] = $errorCode->item(0)->nodeValue;

		//$errorMsg = $oXpath->query('//ErrorMsg');
		//$aApiResult['errorMsg'] = $errorMsg->item(0)->nodeValue;
		//return $aApiResult['errorMsg'];
		return $aApiResult['errorCode'];
	}

	///////////////////////////////////////////////////////////////////////////////////////
	public static function send_email() {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . 'test_send_email.xml');

		$oXpath = new DOMXPath($oDoc);

		$nodes = $oXpath->query('//Params/Param/Key | //Params/Param/Value');

		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey = $nodes->item($i);
			$nodeValue = $nodes->item(++$i);
			switch ($nodeKey->nodeValue) {
				case 'USERNAMEs' :
					$nodeValue->nodeValue = $_POST['username'];
					break;
				default :
					break;
			}
		}

		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		//echo $aCurlPost;
		//exit;
	}

	public static function order_creation_process() {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . 'test_order_creation_process.xml');
		$oXpath = new DOMXPath($oDoc);
		$nodes = $oXpath->query('//Params/Param/Key | //Params/Param/Value');
		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey = $nodes->item($i);
			$nodeValue = $nodes->item(++$i);
			switch ($nodeKey->nodeValue) {
				case 'USERNAMEs' :
					$nodeValue->nodeValue = $_POST['username'];
					break;
				default :
					break;
			}
		}
		echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		echo $aCurlPost;
		exit;
	}

	/* public static function work_order_creation() {
	  $oDoc = new DOMDocument();
	  $oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . 'test_work_order_creation.xml');

	  $oXpath = new DOMXPath($oDoc);

	  $nodes = $oXpath->query('//Params/Param/Key | //Params/Param/Value');

	  for ($i = 0; $i < $nodes->length; $i++) {
	  $nodeKey = $nodes->item($i);
	  $nodeValue = $nodes->item(++$i);
	  switch ($nodeKey->nodeValue) {
	  case 'USERNAMEs' :
	  $nodeValue->nodeValue = $_POST['username'];
	  break;
	  default :
	  break;
	  }
	  }
	  echo $oDoc->saveXML();
	  $aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
	  echo $aCurlPost;
	  exit;
	  } */

	//////////////////////////////////////////////////////////////////////////////////////
	public static function B2B_ACCOUNT_INQUIRY($id) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2B_ACCOUNT_INQUIRY);

		$oXpath = new DOMXPath($oDoc);

		$nodes = $oXpath->query('//DocNo');

		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeValue = $nodes->item($i);
			switch ($nodeValue->nodeName) {
				case 'DocNo' :
					$nodeValue->nodeValue = $id;
					break;
				default :
					break;
			}
		}
		echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		echo $aCurlPost;
		die;
		return;
		//die;
		if (empty($aCurlPost)) {
			return FALSE;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath = new DOMXPath($oDoc);
		$errorCode = $oXpath->query('//ErrorCode');
		$aApiResult['errorCode'] = $errorCode->item(0)->nodeValue;

		//$errorMsg = $oXpath->query('//ErrorMsg');
		//$aApiResult['errorMsg'] = $errorMsg->item(0)->nodeValue;
		//return $aApiResult['errorMsg'];
		return $aApiResult['errorCode'];
	}

	public static function B2C_BULK_BALANCE_INQUIRY() {
		$oDoc	= new DOMDocument();

		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2C_BULK_BALANCE_INQUIRY);
		$oXpath = new DOMXPath($oDoc);

		echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		echo $aCurlPost;
		exit;
		if (empty($aCurlPost)) {
			return FALSE;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath = new DOMXPath($oDoc);
		$errorCode = $oXpath->query('//ErrorCode');
		$aApiResult['errorCode'] = $errorCode->item(0)->nodeValue;

		$errorMsg = $oXpath->query('//ErrorMsg');
		$aApiResult['errorMsg'] = $errorMsg->item(0)->nodeValue;
		return $aApiResult;
	}

	///////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////
}

?>