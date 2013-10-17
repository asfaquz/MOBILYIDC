<?php

class MobilyB2CAPI {

	const MOBILY_XML_DIRE = '/protected/data/xml-mobily/B2CAPI/';
	const B2C_GET_CUSTOMER_INFO = 'B2C_GET_CUSTOMER_INFO.xml';
	const B2C_ELM_VALIDATION = 'B2C_ELM_VALIDATION.xml';
	const B2C_UPDATE_CUSTOMER = 'B2C_UPDATE_CUSTOMER.xml';
	const EPORTAL_INQUERY = 'EPORTAL_INQUERY.xml';
	const B2C_USER_CREATION = 'B2C_USER_CREATION.xml';
	const CREATE_CONSUMER_VERIFICATION = 'CREATE_CONSUMER_VERIFICATION.xml';
	const CREATE_CONSUMER_PIN_VERIFICATION = 'CREATE_CONSUMER_PIN_VERIFICATION.xml';
	const CREATE_CONSUMER_ACCOUNT = 'CREATE_CONSUMER_ACCOUNT.xml';
	const BULK_BALANCE_INQ = 'BULK_BALANCE_INQ.xml';

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
		//echo $oDoc -> saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML());
		//echo $aCurlPost;die;
		if ($aCurlPost === FALSE) {
			return FALSE;
		}
		if (!empty($aCurlPost)) {
			$aResult = ApiOutput::XmlToArray($aCurlPost, 0);
			if (isset($aResult['Envelope']['Body']['m:executeReturn']['requestXml']['SiebelMessage']['ListOfEemblCustomerLightIo'])) {
				return $aResult['Envelope']['Body']['m:executeReturn']['requestXml']['SiebelMessage']['ListOfEemblCustomerLightIo'];
			}
		}
		return array();
	}

	public static function B2C_ELM_VALIDATION($params) {
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
		//echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML());
		//echo $aCurlPost;die;
		if ($aCurlPost === FALSE) {
			return FALSE;
		}
		if (!empty($aCurlPost)) {
			$oDoc->loadXML($aCurlPost);
			$oXpath = new DOMXPath($oDoc);
			$status = $oXpath->query('//ErrorCode');
			if ($status->item(0)->nodeValue == 0) {
				$aResult = ApiOutput::XmlToArray($aCurlPost, 0);
				return $aResult['Envelope']['Body']['m:executeReturn']['requestXml']['MOBILY_SR_MESSAGE']['SR_INFO'];
			} elseif ($status->item(0)->nodeValue == 13293) {
				return 'expired_invalid';
			} else {
				return 'invalid_info';
			}
		}
		return 'invalid_info';
	}

	public static function B2C_UPDATE_CUSTOMER($params) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2C_UPDATE_CUSTOMER);
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
		//echo $aCurlPost;die;
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

	public static function EPORTAL_INQUERY($param_id) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::EPORTAL_INQUERY);
		$oXpath = new DOMXPath($oDoc);
		$nodes = $oXpath->query('//Params/Param/Key | //Params/Param/Value');
		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey = $nodes->item($i);
			$nodeValue = $nodes->item(++$i);
			switch ($nodeKey->nodeValue) {
				case 'LineNumber' :
					$nodeValue->nodeValue = $param_id;
					break;
				default :
					break;
			}
		}
		//echo $oDoc -> saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		//echo($aCurlPost);
		//die;
		if ($aCurlPost === FALSE) {
			return FALSE;
		}
		if (!empty($aCurlPost)) {
			$oDoc->loadXML($aCurlPost);
			$oXpath = new DOMXPath($oDoc);
			$status = $oXpath->query('//ErrorMsg');
			if ($status->item(0)->nodeValue == 'User is not exist') {
				return 'not_exist';
			} elseif ($status->item(0)->nodeValue == 'Invalid xml message') {
				return FALSE;
			} else {
				return 'exist';
			}
		}
		return FALSE;
	}

	public static function B2C_USER_CREATION($params) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::B2C_USER_CREATION);
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
				case 'Name' :
					$nodeValue->nodeValue = $params['name'];
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
		$oDoc->loadXML($aCurlPost);
		$oXpath = new DOMXPath($oDoc);
		$errorCode = $oXpath->query('//ErrorCode');
		$aApiResult['errorCode'] = $errorCode->item(0)->nodeValue;

		$errorMsg = $oXpath->query('//ErrorMsg');
		$aApiResult['errorMsg'] = $errorMsg->item(0)->nodeValue;
		return $aApiResult;
	}

	public static function CREATE_CONSUMER_VERIFICATION($params) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::CREATE_CONSUMER_VERIFICATION);
		$oXpath = new DOMXPath($oDoc);
		$nodes = $oXpath->query('//Params/Param/Key | //Params/Param/Value');
		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey = $nodes->item($i);
			$nodeValue = $nodes->item(++$i);
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
		//echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		//echo $aCurlPost;
		if ($aCurlPost === FALSE) {
			return FALSE;
		}
		$oDoc->loadXML($aCurlPost);
		$oXpath = new DOMXPath($oDoc);
		$ErrorMsg = $oXpath->query('//ErrorMsg');
		$HASHCODE = $oXpath->query('//HASHCODE');
		$VERIFICATION_REQUIRED = $oXpath->query('//VERIFICATION_REQUIRED');
		$res = array(
			'error' => $ErrorMsg->item(0)->nodeValue,
			'HASHCODE' => $HASHCODE->item(0)->nodeValue,
			'VERIFICATION_REQUIRED' => $VERIFICATION_REQUIRED->item(0)->nodeValue
		);
		return $res;
	}

	public static function CREATE_CONSUMER_PIN_VERIFICATION($params) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::CREATE_CONSUMER_PIN_VERIFICATION);
		$oXpath = new DOMXPath($oDoc);
		$nodes = $oXpath->query('//Params/Param/Key | //Params/Param/Value');
		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey = $nodes->item($i);
			$nodeValue = $nodes->item(++$i);
			switch ($nodeKey->nodeValue) {
				case 'HASHCODE' :
					$nodeValue->nodeValue = $params['HASHCODE'];
					break;
				case 'PIN' :
					$nodeValue->nodeValue = $params['PIN'];
					break;
				default :
					break;
			}
		}
		//echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		//echo $aCurlPost;
		if ($aCurlPost === FALSE) {
			return FALSE;
		}
		if (!empty($aCurlPost)) {
			$oDoc->loadXML($aCurlPost);
			$oXpath = new DOMXPath($oDoc);
			$status = $oXpath->query('//ErrorCode');
			if ($status->item(0)->nodeValue == 0) {
				return 1;
			} else {
				return 0;
			}
		}
		return FALSE;
	}

	public static function CREATE_CONSUMER_ACCOUNT($params) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::CREATE_CONSUMER_ACCOUNT);
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
				case 'HASHCODE' :
					$nodeValue->nodeValue = $params['HASHCODE'];
					break;
				case 'LANGUAGE' :
					$nodeValue->nodeValue = $params['lang'];
					break;
				case 'Name' :
					$nodeValue->nodeValue = $params['name'];
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
		$oDoc->loadXML($aCurlPost);
		$oXpath = new DOMXPath($oDoc);
		$errorCode = $oXpath->query('//ErrorCode');
		$aApiResult['errorCode'] = $errorCode->item(0)->nodeValue;

		$errorMsg = $oXpath->query('//ErrorMsg');
		$aApiResult['errorMsg'] = $errorMsg->item(0)->nodeValue;
		return $aApiResult;
	}

	public static function BULK_BALANCE_INQ($bulk) {
		$oDoc = new DOMDocument();
		$oDoc->load(MAIN_PATH . self::MOBILY_XML_DIRE . self::BULK_BALANCE_INQ);
		$oXpath = new DOMXPath($oDoc);
		$nodes = $oXpath->query('//Params/Param/Key | //Params/Param/Value');
		for ($i = 0; $i < $nodes->length; $i++) {
			$nodeKey = $nodes->item($i);
			$nodeValue = $nodes->item(++$i);
			switch ($nodeKey->nodeValue) {
				case 'Bulks_lines' :
					$nodeValue->nodeValue = $params['username'];
					break;
				default :
					break;
			}
		}
		//echo $oDoc->saveXML();
		$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $oDoc->saveXML(), $bReturnArray = false);
		//echo $aCurlPost;
		if ($aCurlPost === FALSE) {
			return FALSE;
		}
		if (!empty($aCurlPost)) {
			$aResult = ApiOutput::XmlToArray($aCurlPost, 0);
			$return_error = $aResult['Envelope']['Body']['m:executeReturn']['requestXml']['EE_EAI_MESSAGE']['EE_EAI_HEADER']['ReturnCode'];
			if ($return_error == 0) {
				if (isset($aResult['Envelope']['Body']['m:executeReturn']['requestXml']['EE_EAI_MESSAGE']['LineItems'])) {
					return $aResult['Envelope']['Body']['m:executeReturn']['requestXml']['EE_EAI_MESSAGE']['LineItems'];
				}
			}
		}
		return array();
	}

}
