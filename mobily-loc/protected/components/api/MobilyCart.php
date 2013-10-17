<?php

class MobilyCart {

	public static function getStandAloneDevices() {
		$aDevices = array();

		if (isset(Yii::app()->session['mobily_cart'])) {
			$aCart = Yii::app()->session['mobily_cart'];

			if (is_array($aCart) && count($aCart)) {
				foreach ($aCart as $aCartItem) {
					if ($aCartItem['type'] == 'stand_device') {
						$aDevices[] = Yii::t('strings', 'You still not qualified to buy Standalon Device') . ': '
								. $aCartItem['name'] . ' ..  please remove it to proceed';
					}
				}
			}
		}
		return $aDevices;
	}

	public static function getMsisdnUnderCustomerSession() {
		$c_info = Yii::app()->session['customer_info']; // Get Customer info session
		$sub_accounts = $c_info['Account']['ListOfCutServiceSubAccounts'];
		$c_info_line = array();
		if (!empty($sub_accounts)) {
			$lines = array();
			if (isset($sub_accounts['CutServiceSubAccounts'][0])) {
				$sub_accounts = $sub_accounts['CutServiceSubAccounts'];
			}
			foreach ($sub_accounts as $s_account) {
				if (in_array($s_account['EEMBLRootProductLine'], array('Post-Paid', 'Pre-Paid'))) {
					$lines[$s_account['EECCMSISDN']] = $s_account['EECCMSISDN'];
				}
			}
			$c_info_line = $lines;
		}
		return $c_info_line;
	}

	public static function getMsisdnListNewCustomer() {
		$aList = array(
			'postpaid' => array(
				'count' => 0,
				'voice' => array(),
				'connect' => array(),
				'lte' => array(),
			),
			'prepaid' => array(
				'count' => 0,
				'voice' => array(),
				'connect' => array(),
				'lte' => array(),
			),
		);
		$aItems = Yii::app()->session['mobily_cart'];
		foreach ($aItems as $aItem) {
			if ($aItem['type'] == 'stand_device') {
				continue;
			}
			$sPlanType = $aItem['plan_type'];
			$dPackageType = $aItem['type'];
			$aCartMsisdn = $aItem['msisdn'];
			$aCartQuantity = $aItem['quantity'];
			$oProductType = ProductType::model()->findByPk($dPackageType);
			if ($sPlanType == 'Postpaid') {
				if (strpos($oProductType->product_type, 'voice') !== false) {
					for ($i = 1; $i <= $aCartQuantity; $i++) {
						$aList['postpaid']['voice'][] = 1;
					}
				} else if (strpos($oProductType->product_type, 'Connect') !== false) {
					for ($i = 1; $i <= $aCartQuantity; $i++) {
						$aList['postpaid']['connect'][] = 1;
					}
				} else if (strpos($oProductType->product_type, 'BB@Home') !== false) {
					for ($i = 1; $i <= $aCartQuantity; $i++) {
						$aList['postpaid']['lte'][] = 1;
					}
				}
			} else {
				if (strpos($oProductType->product_type, 'voice') !== false) {
					for ($i = 1; $i <= $aCartQuantity; $i++) {
						$aList['prepaid']['voice'][] = 1;
					}
				} else if (strpos($oProductType->product_type, 'Connect') !== false) {
					for ($i = 1; $i <= $aCartQuantity; $i++) {
						$aList['prepaid']['connect'][] = 1;
					}
				} else if (strpos($oProductType->product_type, 'BB@Home') !== false) {
					for ($i = 1; $i <= $aCartQuantity; $i++) {
						$aList['prepaid']['lte'][] = 1;
					}
				}
			}
		}
		return $aList;
	}

	public static function getMsisdnList($withCurrentCart = FALSE) {
		$aList = array(
			'postpaid' => array(
				'count' => 0,
				'voice' => array(),
				'connect' => array(),
				'lte' => array(),
			),
			'prepaid' => array(
				'count' => 0,
				'voice' => array(),
				'connect' => array(),
				'lte' => array(),
			),
		);
		$aCrmInfo = Yii::app()->session['customer_info'];

		if (is_array($aCrmInfo) && isset($aCrmInfo['Account']['ListOfCutServiceSubAccounts']['CutServiceSubAccounts'])) {
			$aCrmInfo = $aCrmInfo['ListOfEemblCustomerLightIo']['Account']['ListOfCutServiceSubAccounts']['CutServiceSubAccounts'];
			if (!isset($aCrmInfo[0])) {
				$aTempCrm = array();
				$aTempCrm[0] = $aCrmInfo;
				$aCrmInfo = $aTempCrm;
			}

			foreach ($aCrmInfo as $aPlan) {
				if (isset($aPlan['EECCMSISDN']) && !empty($aPlan['EECCMSISDN']) && is_string($aPlan['EECCMSISDN'])) {

					if ($aPlan['EECCPricingPlan'] == 'Prepaid Plan') {// Pre Paid Plan
						$aList['prepaid']['count'] = 1;
						if ($aPlan['EEMBLRootProductLine'] == 'Pre-Paid' || $aPlan['EEMBLRootProductLine'] == 'Post-Paid') { // Voice Plan
							$aList['prepaid']['voice'][] = $aPlan['EECCMSISDN'];
						} elseif ($aPlan['EEMBLRootProductLine'] == 'Connect') { // Connect Plan
							$aList['prepaid']['connect'][] = $aPlan['EECCMSISDN'];
						} elseif ($aPlan['EEMBLRootProductLine'] == 'LTE') { // Lte Plan
							$aList['prepaid']['lte'][] = $aPlan['EECCMSISDN'];
						}
					} elseif ($aPlan['EECCPricingPlan'] == 'Postpaid Plan') { //Post Paid Plan
						$aList['postpaid']['count'] = 1;
						if ($aPlan['EEMBLRootProductLine'] == 'Pre-Paid' || $aPlan['EEMBLRootProductLine'] == 'Post-Paid') { // Voice Plan
							$aList['postpaid']['voice'][] = $aPlan['EECCMSISDN'];
						} elseif ($aPlan['EEMBLRootProductLine'] == 'Connect') { // Connect Plan
							$aList['postpaid']['connect'][] = $aPlan['EECCMSISDN'];
						} elseif ($aPlan['EEMBLRootProductLine'] == 'LTE') { // Lte Plan
							$aList['postpaid']['lte'][] = $aPlan['EECCMSISDN'];
						}
					}
				}
			}
		}
		if ($withCurrentCart) {
			$aItems = Yii::app()->session['mobily_cart'];
			foreach ($aItems as $aItem) {
				if ($aItem['type'] == 'stand_device') {
					continue;
				}
				$sPlanType = $aItem['plan_type'];
				$dPackageType = $aItem['type'];
				$aCartMsisdn = $aItem['msisdn'];
				$aCartQuantity = $aItem['quantity'];
				$oProductType = ProductType::model()->findByPk($dPackageType);
				if ($sPlanType == 'Postpaid') {
					if (strpos($oProductType->product_type, 'voice') !== false) {
						for ($i = 1; $i <= $aCartQuantity; $i++) {
							$aList['postpaid']['voice'][] = 1;
						}
					} else if (strpos($oProductType->product_type, 'Connect') !== false) {
						for ($i = 1; $i <= $aCartQuantity; $i++) {
							$aList['postpaid']['connect'][] = 1;
						}
					} else if (strpos($oProductType->product_type, 'BB@Home') !== false) {
						for ($i = 1; $i <= $aCartQuantity; $i++) {
							$aList['postpaid']['lte'][] = 1;
						}
					}
				} else {
					if (strpos($oProductType->product_type, 'voice') !== false) {
						for ($i = 1; $i <= $aCartQuantity; $i++) {
							$aList['prepaid']['voice'][] = 1;
						}
					} else if (strpos($oProductType->product_type, 'Connect') !== false) {
						for ($i = 1; $i <= $aCartQuantity; $i++) {
							$aList['prepaid']['connect'][] = 1;
						}
					} else if (strpos($oProductType->product_type, 'BB@Home') !== false) {
						for ($i = 1; $i <= $aCartQuantity; $i++) {
							$aList['prepaid']['lte'][] = 1;
						}
					}
				}
			}
		}
		return $aList;
	}

	public static function getMsisdnListBulk() {
		$aList = array();
		$aCrmInfo = Yii::app()->session['customer_info'];

		if (is_array($aCrmInfo) && isset($aCrmInfo['Account']['ListOfCutServiceSubAccounts']['CutServiceSubAccounts'])) {
			$aCrmInfo = $aCrmInfo['ListOfEemblCustomerLightIo']['Account']['ListOfCutServiceSubAccounts']['CutServiceSubAccounts'];
			if (!isset($aCrmInfo[0])) {
				$aTempCrm = array();
				$aTempCrm[0] = $aCrmInfo;
				$aCrmInfo = $aTempCrm;
			}
			$num = 0;
			foreach ($aCrmInfo as $aPlan) {
				if (isset($aPlan['EECCMSISDN']) && !empty($aPlan['EECCMSISDN']) && is_string($aPlan['EECCMSISDN'])) {
					$aList[$num]['msisdn'] = $aPlan['EECCMSISDN'];
					$num++;
				}
			}
		}
		return $aList;
	}

}