<?php

class MobilyAuth {

    const MOBILY_XML_DIRE = '/protected/data/xml-mobily/';
    const B2B_ACCOUNT_INQUIRY = 'B2B_ACCOUNT_INQUIRY.xml';
    const B2B_CREATE_CUSTOMER_ACCOUNT = 'B2B_CREATE_CUSTOMER_ACCOUNT.xml';
    const B2B_USER_CREATION = 'B2B_USER_CREATION.xml';
    const USERNAME_VALIDATION = 'USERNAME_VALIDATION.xml';

    public static function UserValidation() {
        $mb = MobilyApi::USERNAME_VALIDATION();
        return $mb;
    }

    public static function RegisterUser($params) {

        $mb = MobilyApi::B2B_USER_CREATION($params);
        if (!$mb) {
            return 'An error occurred please try again later';
        }
        if ($mb['errorMsg'] == 'Success') {
            return 'success';
        } else {
            return $mb['errorMsg'];
        }
    }

}