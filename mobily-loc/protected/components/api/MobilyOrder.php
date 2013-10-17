<?php

class MobilyOrder {

	public static function OrderCreation($id) {
		$sql = "SELECT product_type_id, id_order, order_date, id_user, id_order_cart, sku, order_details, count(*) quantity
            ,GROUP_CONCAT(SIM SEPARATOR '-') AS sim, GROUP_CONCAT(IMEI SEPARATOR '-') AS imei
            FROM mobily_orders
            WHERE id_order = :id
            GROUP BY id_order_cart;";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(":id", $id, PDO::PARAM_INT);
		$order_model = $command->queryAll();
		print_r($order_model);
		if (count($order_model)) {
			$user = Users::model()->findByPk($order_model[0]['id_user']);
			$functions = CHtml::listData(
							ProductType::model()->findAll()
							, 'product_type_id', 'function_name');
			$error = 0;
			foreach ($order_model as $value) {
				try {
					$order_details = unserialize(base64_decode($value['order_details']));
					//print_r($order_details);
					$order_xml = array();
					//$order_xml['Order-Header']['FuncId'][] = $functions[$order_details['type']];
					$order_xml['Order-Header']['FuncId'][] = $functions[$value['product_type_id']];
					$order_xml['Order-Header']['SecurityKey'][] = 123;
					$order_xml['Order-Header']['MsgVersion'][] = 123;
					$order_xml['Order-Header']['RequestorChannel'][] = 'SOUQ';
					$order_xml['Order-Header']['OrderDate'][] = date("m/d/Y H:i:s");
					$order_xml['Order-Header']['RequestorUserId'][] = $user->username;
					$order_xml['Order-Header']['RequestorLanguage'][] = 'E'; ///*
					$order_xml['Order-Header']['DealerId'][] = '060015';
					$order_xml['Order-Header']['ShopId'][] = '060015';
					$order_xml['Order-Header']['AgentId'][] = 'SOUQ.COM';
					$order_xml['Order-Header']['OrderCreationDate'][] = date("m/d/Y H:i:s");
					$order_xml['Order-Info']['LogtaOrderNumber'][] = 'SOUQ_' . $order_model[0]['id_order'];
					$order_xml['Order-Info']['SubOrderNumber'][] = 'SOUQ_' . $order_model[0]['id_order'] . '_' . $value['id_order_cart'];
					$order_xml['Order-Info']['CustomerAccountNo'][] = $user->mobily_id;
					$order_xml['Order-Info']['MBA'][] = $user->mba;
					$order_xml['Order-Info']['Operation'][] = 'SUBSCRIBE';
					$order_xml['Order-Info']['PaymentMethod'][] = 'Cash';
					if ($order_details['type'] == 'stand_device') {
						$order_xml['Order-Info']['ServiceAccountNo'][] = '';
					}
					$lines = array();
					switch ($order_details['cart']['type']) {
						case 'sim_device':
							$criteria = new CDbCriteria();
							$criteria->addInCondition("phone_number_id", $order_details['msisdn']);
							$msisdn = CHtml::listData(PhoneNumber::model()->findAll($criteria), 'phone_number_id', 'number');
							$sim = explode('-', preg_replace('/^-/', '', $value['sim']));
							$imei = explode('-', preg_replace('/^-/', '', $value['imei']));
							break;
						case 'device':
							$imei = explode('-', preg_replace('/^-/', '', $value['imei']));
							break;
						case 'sim':
							$criteria = new CDbCriteria();
							$criteria->addInCondition("phone_number_id", $order_details['msisdn']);
							$msisdn = CHtml::listData(PhoneNumber::model()->findAll($criteria), 'phone_number_id', 'number');
							$sim = explode('-', preg_replace('/^-/', '', $value['sim']));
							break;
						default :
							break;
					}
					for ($i = 0; $i < $order_details['quantity']; $i++) {
						$line = array();
						$line['PackageName'] = $order_details['type'] == 'stand_device' ? '' : $order_details['siebel'];
						$line['ActionCode'] = 'Add';
						switch ($order_details['cart']['type']) {
							case 'sim_device':
								$line['MSISDN'] = $msisdn[$order_details['msisdn'][$i]];
								$line['SIM'] = $sim[$i];
								$line['IMEI'] = $imei[$i];
								break;
							case 'device':
								$line['MSISDN'] = '';
								$line['SIM'] = '';
								$line['IMEI'] = $imei[$i];
								break;
							case 'sim':
								$line['MSISDN'] = $msisdn[$order_details['msisdn'][$i]];
								$line['SIM'] = $sim[$i];
								$line['IMEI'] = '';
								break;
							default :
								break;
						}
						$line['ContractPeriod'] = isset($order_details['pricing']['Period']) ? $order_details['pricing']['Period'] : 1;
						$line['BillFrequency'] = $order_details['type'] == 'stand_device' ? '' : 'Monthly';
						//$line['Attributes']['Attribute'][0]['Name'] = '';
						//$line['Attributes']['Attribute'][0]['ActionCode'] = 'Add';
						//$line['Attributes']['Attribute'][0]['Value'] = '';
						$line['Attributes'][] = '';
						if (isset($order_details['opnl_addon'])) {
							if ($order_details['opnl_addon']) {
								$n = 0;
								foreach ($order_details['opnl_addon']['Addons'] as $addon) {
									if ($addon['type'] == 'select-hours') {
										if (!$addon['values']['selected']) {
											continue;
										} else {
											$line['Services']['Service'][$n]['Name'] = $addon['siebel'];
											$line['Services']['Service'][$n]['ActionCode'] = 'Add';
											$line['Services']['Service'][$n]['Attributes']['Attribute'][0]['Name'] = 'Qty';
											$line['Services']['Service'][$n]['Attributes']['Attribute'][0]['ActionCode'] = 'Add';
											$line['Services']['Service'][$n]['Attributes']['Attribute'][0]['Value'] = $addon['values']['selected'];
											$c = 1;
											$hours = array(1 => 'First Hour', 2 => 'Second Hour', 3 => 'Third Hour');
											for ($k = 1; $k <= $addon['values']['selected']; $k++) {
												$line['Services']['Service'][$n]['Attributes']['Attribute'][$c]['Name'] = $hours[$k];
												$line['Services']['Service'][$n]['Attributes']['Attribute'][$c]['ActionCode'] = 'Add';
												$line['Services']['Service'][$n]['Attributes']['Attribute'][$c]['Value'] = $addon['values']['hours'][$k];
												$c++;
											}
										}
									}
									if ($addon['type'] == 'slider-rate') {
										if (!$addon['values']['selected_rate']) {
											continue;
										} else {
											$line['Services']['Service'][$n]['Name'] = $addon['siebel'];
											$line['Services']['Service'][$n]['ActionCode'] = 'Add';
											$line['Services']['Service'][$n]['Attributes']['Attribute'][0]['Name'] = 'Qty';
											$line['Services']['Service'][$n]['Attributes']['Attribute'][0]['ActionCode'] = 'Add';
											$line['Services']['Service'][$n]['Attributes']['Attribute'][0]['Value'] = $addon['values']['selected_rate'];
										}
									}
									if ($addon['type'] == 'select') {
										if (!$addon['values']['selected']) {
											continue;
										} else {
											$line['Services']['Service'][$n]['Name'] = $addon['siebel'];
											$line['Services']['Service'][$n]['ActionCode'] = 'Add';
											$line['Services']['Service'][$n]['Attributes']['Attribute'][0]['Name'] = 'Qty';
											$line['Services']['Service'][$n]['Attributes']['Attribute'][0]['ActionCode'] = 'Add';
											$line['Services']['Service'][$n]['Attributes']['Attribute'][0]['Value'] = $addon['values']['choices'][$addon['values']['selected']][1];
										}
									}
									$n++;
								}
							} else {
								$line['Services'][] = '';
							}
						} else {
							$line['Services'][] = '';
							/* $line['Services']['Service'][0]['Name'] = '';
							  $line['Services']['Service'][0]['ActionCode'] = 'Add';
							  $line['Services']['Service'][0]['Attributes']['Attribute'][0]['Name'] = '';
							  $line['Services']['Service'][0]['Attributes']['Attribute'][0]['ActionCode'] = 'Add';
							  $line['Services']['Service'][0]['Attributes']['Attribute'][0]['Value'] = ''; */
						}
						$line['Payments']['Payment']['PaymentAmount'] = $order_details['cart']['total'];
						if ($order_details['package_type'] != 'device') {
							$line['Payments']['Payment']['PaymentType'] = $order_details['type'] == 'stand_device' ? $order_details['pt'] : $order_details['pricing']['pt'];
							$line['Payments']['Payment']['PaymentDetailType'] = $order_details['type'] == 'stand_device' ? $order_details['pr'] : $order_details['pricing']['pr'];
						} else {
							$line['Payments']['Payment']['PaymentType'] = $order_details['bundle_devices']['devices'][$order_details['bundle_devices']['selected_device']]['PT'];
							$line['Payments']['Payment']['PaymentDetailType'] = $order_details['bundle_devices']['devices'][$order_details['bundle_devices']['selected_device']]['PR'];
						}
						$lines[] = $line;
					}
					$line_tags['LineService'] = $lines;
					$order_xml['Order-Info']['LineItems'] = $line_tags;
					$xml = Array2XML::createXML('Mobily-Order', $order_xml);
					$mobily_xml = $xml->saveXML();
					$soap_header = '<?xml version="1.0" encoding="UTF-8"?>
                    <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <soapenv:Body><m:execute xmlns:m="http://webservice.mobily.com"><requestXml>';
					$soap_footer = '</requestXml></m:execute></soapenv:Body></soapenv:Envelope>';
					$mobily_xml = str_replace('<?xml version="1.0" encoding="UTF-8"?>', $soap_header, $mobily_xml);
					$mobily_xml .= $soap_footer;
					echo $mobily_xml;
					die;
					$aCurlPost = ApiOutput::CurlPost(MOBILY_IP, $mobily_xml, $bReturnArray = false);
					if ($aCurlPost === FALSE) {
						throw new Exception('Mobily no status in xml response | ' . $value['id_order_cart'] . ' | ' . $aCurlPost);
					}
					if (!strpos($aCurlPost, '<status>')) {
						throw new Exception('Mobily no status in xml response | ' . $value['id_order_cart'] . ' | ' . $aCurlPost);
					}
					if (!empty($aCurlPost)) {
						$oDoc = new DOMDocument();
						$oDoc->loadXML($aCurlPost);
						$oXpath = new DOMXPath($oDoc);
						$status = $oXpath->query('//status');
						$aApiResult = $status->item(0)->nodeValue;
						if ($aApiResult == 'Success') {
							$sql = 'update mobily_orders set status="sent" where id_order=' . $order_model[0]['id_order'] . ' and id_order_cart=' . $value['id_order_cart'];
							$command = Yii::app()->db->createCommand($sql);
							$command->execute();
						} else {
							throw new Exception('Mobily no status in xml response | ' . $value['id_order_cart'] . ' | ' . $aCurlPost);
						}
					} else {
						throw new Exception('Mobily no status in xml response | ' . $value['id_order_cart'] . ' | ' . $aCurlPost);
					}
				} catch (Exception $e) {
					Yii::log('Souq order creation | ' . ' | ' . $id . ' | ' . $e->getMessage(), CLogger::LEVEL_ERROR, 'errors');
					$error++;
				}
				//echo $aCurlPost;
			}
		} else {
			Yii::log('Souq order creation | ' . ' | ' . $id . ' | order not found', CLogger::LEVEL_ERROR, 'errors');
			return FALSE;
		}
		if ($error) {
			Yii::log('Souq order creation | ' . ' | ' . $id . ' | order did not fully send', CLogger::LEVEL_ERROR, 'errors');
			return FALSE;
		} else {
			return TRUE;
		}
	}

}