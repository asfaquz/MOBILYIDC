<?php

class MobilyB2BAPI {

	const MOBILY_XML_DIRE = '/protected/data/xml-mobily/B2BAPI/';
	const B2B_ACCOUNT_INQUIRY = 'B2B_ACCOUNT_INQUIRY.xml';
	const B2B_CREATE_CUSTOMER_ACCOUNT = 'B2B_CREATE_CUSTOMER_ACCOUNT.xml';
	const B2B_UPDATE_CUSTOMER_ACCOUNT = 'B2B_UPDATE_CUSTOMER_ACCOUNT.xml';
	const B2B_USER_CREATION = 'B2B_USER_CREATION.xml';
	const B2B_ASSOCIATE_MBA = 'B2B_ASSOCIATE_MBA.xml';
	const USERNAME_VALIDATION = 'USERNAME_VALIDATION.xml';
	const work_order_creation = 'work_order_creation.xml';

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
			//	die();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML());
		//echo $aCurlPost;die;
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

	public static function B2B_UPDATE_CUSTOMER_ACCOUNT($id, $params) {
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
		echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML());
		echo $aCurlPost;die;
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
		//echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		//echo($aCurlPost);
		if ($aCurlPost === FALSE) {
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
		try {
			$result_array = self::object_2_array($result);
		} catch (Exception $e) {
			Yii::log($e->getMessage() . ' | ' . $request . ' | ', CLogger::LEVEL_ERROR, 'errors');
		}
		if ($result_array['return'] == 'uploading done successfully') {
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
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::work_order_creation);

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

	public static function B2B_ACCOUNT_INQUIRY($id, $id_type, $operation) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2B_ACCOUNT_INQUIRY);

		$oXpath = new DOMXPath($oDoc);

		$nodes = $oXpath->query('//Operation | //DocNo | //DocType');

		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeValue = $nodes->item($i);
			switch ($nodeValue->nodeName) {
				case 'Operation' :
					$nodeValue->nodeValue = $operation;
					break;
				case 'DocType' :
					$nodeValue->nodeValue = $id_type;
					break;
				case 'DocNo' :
					$nodeValue->nodeValue = $id;
					break;
				default :
					break;
			}
		}
		//echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		//echo $aCurlPost;
		if (empty($aCurlPost)) {
			return FALSE;
		}
		if (strpos($aCurlPost, '<AccountNumber>')) {
			return 'exist';
		} else {
			return 'not_exist';
		}
	}

	public static function B2B_ACCOUNT_INQUIRY_MBA($mba, $operation) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2B_ACCOUNT_INQUIRY);

		$oXpath = new DOMXPath($oDoc);

		$nodes = $oXpath->query('//Operation | //MBA');

		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeValue = $nodes->item($i);
			switch ($nodeValue->nodeName) {
				case 'Operation' :
					$nodeValue->nodeValue = $operation;
					break;
				case 'MBA' :
					$nodeValue->nodeValue = $mba;
					break;
				default :
					break;
			}
		}
		//echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		//echo $aCurlPost;
		//die;
		if (empty($aCurlPost)) {
			return FALSE;
		}
		if (strpos($aCurlPost, '<AccountNumber>')) {
			$info = array();
			$oDoc->loadXML($aCurlPost);
			$oXpath = new DOMXPath($oDoc);
			$nodes = $oXpath->query('//AccountNumber | //MasterBillingAccount | //FirstName | //LastName');

			for ($i = 0; $i < $nodes->length; $i++) {
				$nodeValue = $nodes->item($i);
				switch ($nodeValue->nodeName) {
					case 'AccountNumber' :
						$info['AccountNumber'] = $nodeValue->nodeValue;
						break;
					case 'MasterBillingAccount' :
						$info['MasterBillingAccount'] = $nodeValue->nodeValue;
						break;
					case 'FirstName' :
						$info['FirstName'] = $nodeValue->nodeValue;
						break;
					case 'LastName' :
						$info['LastName'] = $nodeValue->nodeValue;
						break;
					default :
						break;
				}
			}
			return $info;
		}
		return array();
	}

	public static function B2B_ACCOUNT_INQUIRY_MBA_PROFILE($mba, $operation) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2B_ACCOUNT_INQUIRY);

		$oXpath = new DOMXPath($oDoc);

		$nodes = $oXpath->query('//Operation | //MBA');

		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeValue = $nodes->item($i);
			switch ($nodeValue->nodeName) {
				case 'Operation' :
					$nodeValue->nodeValue = $operation;
					break;
				case 'MBA' :
					$nodeValue->nodeValue = $mba;
					break;
				default :
					break;
			}
		}
		//echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		//echo $aCurlPost;
		//die;
		if ($aCurlPost === FALSE) {
			return FALSE;
		}
		$aResult = ApiOutput::XmlToArray($aCurlPost);
		if (isset($aResult['Envelope']['Body']['m:executeReturn']['requestXml']['SiebelMessage'])) {
			$info =  $aResult['Envelope']['Body']['m:executeReturn']['requestXml']['SiebelMessage'];
			return $info;
		}
		return array();
	}

}