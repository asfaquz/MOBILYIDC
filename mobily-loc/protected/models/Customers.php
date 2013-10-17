<?php

/**
 * This is the model class for table "customers".
 *
 * The followings are the available columns in table 'customers':
 * @property integer $id
 * @property integer $user_id
 * @property string $CompanyName
 * @property string $CompanyType
 * @property string $Induistry
 * @property string $CountryofOrigin
 * @property integer $NumberofEmployees
 * @property integer $NumberofOffices
 * @property string $IDDocumentType
 * @property string $IDDocumentNumber
 * @property string $IDDocumentPlaceofIssue
 * @property string $IDDocumentIssueDateGregorian
 * @property string $IDDocumentExpiryDateGregorian
 * @property string $Title
 * @property string $FirstName
 * @property string $MiddleName
 * @property string $LastName
 * @property string $Gender
 * @property string $DateofBirth
 * @property string $Nationality
 * @property string $POBox
 * @property string $PostalCode
 * @property string $City
 * @property string $Region
 * @property string $Country
 * @property string $APIDType
 * @property string $APIDNumber
 * @property string $APIDPlaceofIssue
 * @property string $APIDIssueDateGregorian
 * @property string $APIDExpiryDateGregorian
 * @property string $EmailAddress
 * @property string $Mobile
 * @property string $Telephone
 * @property string $ContactPreference
 * @property string $CustomerCategory
 * @property string $CompanyCapital
 * @property string $CompanyAddress
 * @property string $StreetAddress
 */
class Customers extends CActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Customers the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'customers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, CompanyName, CompanyType, Induistry, CountryofOrigin, NumberofEmployees, NumberofOffices, 
				IDDocumentType, IDDocumentNumber, IDDocumentPlaceofIssue, IDDocumentIssueDateGregorian, 
				IDDocumentExpiryDateGregorian, Title, FirstName, MiddleName, LastName, Gender, DateofBirth, Nationality, POBox, 
				PostalCode, City, Region, Country, APIDType, APIDNumber, APIDPlaceofIssue, APIDIssueDateGregorian, 
				APIDExpiryDateGregorian, EmailAddress, Mobile, Telephone, ContactPreference, CustomerCategory, CompanyCapital, 
				CompanyAddress, StreetAddress', 'required'),
            array('user_id, NumberofEmployees, NumberofOffices', 'numerical', 'integerOnly'=>true),
			//array('CompanyName, CompanyType, Induistry, CountryofOrigin, IDDocumentType, IDDocumentPlaceofIssue, APIDType, APIDNumber, APIDPlaceofIssue, Mobile, Telephone, ContactPreference', 'length', 'max' => 50),
			//array('IDDocumentNumber, POBox, PostalCode', 'length', 'max' => 20),
			//array('Title', 'length', 'max' => 5),
			//array('FirstName, MiddleName, LastName, Gender', 'length', 'max' => 40),
			//array('Nationality, street, City, Region, Country, EmailAddress', 'length', 'max' => 100),
			array('id, user_id, CompanyName, CompanyType, Induistry, CountryofOrigin, NumberofEmployees, NumberofOffices, 
				IDDocumentType, IDDocumentNumber, IDDocumentPlaceofIssue, IDDocumentIssueDateGregorian, 
				IDDocumentExpiryDateGregorian, Title, FirstName, MiddleName, LastName, Gender, DateofBirth, Nationality, POBox, 
				PostalCode, City, Region, Country, APIDType, APIDNumber, APIDPlaceofIssue, APIDIssueDateGregorian, 
				APIDExpiryDateGregorian, EmailAddress, Mobile, Telephone, ContactPreference, CustomerCategory, CompanyCapital, 
				CompanyAddress, StreetAddress', 'safe'),
			array('CompanyName, CompanyType, Induistry, CountryofOrigin, NumberofEmployees, NumberofOffices, 
				IDDocumentType, IDDocumentNumber, IDDocumentPlaceofIssue, IDDocumentIssueDateGregorian, 
				IDDocumentExpiryDateGregorian, Title, FirstName, MiddleName, LastName, Gender, DateofBirth, Nationality, POBox, 
				PostalCode, City, Region, Country, APIDType, APIDNumber, APIDPlaceofIssue, APIDIssueDateGregorian, 
				APIDExpiryDateGregorian, EmailAddress, Mobile, Telephone, ContactPreference, CustomerCategory, CompanyCapital, 
				CompanyAddress, StreetAddress','filter','filter'=>array($obj=new CHtmlPurifier(),'purify')),
			array('EmailAddress', 'email'),
			array('CompanyName, IDDocumentNumber, user_id', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
            array('id, user_id, CompanyName, CompanyType, Induistry, CountryofOrigin, NumberofEmployees, NumberofOffices, 
				IDDocumentType, IDDocumentNumber, IDDocumentPlaceofIssue, IDDocumentIssueDateGregorian, 
				IDDocumentExpiryDateGregorian, Title, FirstName, MiddleName, LastName, Gender, DateofBirth, Nationality, POBox, 
				PostalCode, City, Region, Country, APIDType, APIDNumber, APIDPlaceofIssue, APIDIssueDateGregorian, 
				APIDExpiryDateGregorian, EmailAddress, Mobile, Telephone, ContactPreference, CustomerCategory, CompanyCapital, 
				CompanyAddress, StreetAddress', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'CompanyName' => 'Company Name',
			'CompanyType' => 'Company Type',
			'Induistry' => 'Induistry',
			'CountryofOrigin' => 'Country Of Origin',
			'NumberofEmployees' => 'Number Of Employees',
			'NumberofOffices' => 'Number Of Offices',
			'IDDocumentType' => 'Id Document Type',
			'IDDocumentNumber' => 'Id Document Number',
			'IDDocumentPlaceofIssue' => 'Id Document Place Of Issue',
			'IDDocumentIssueDateGregorian' => 'Id Document Issue Date',
			'IDDocumentExpiryDateGregorian' => 'Id Document Expiry Date',
			'Title' => 'Title',
			'FirstName' => 'First Name',
			'MiddleName' => 'Middle Name',
			'LastName' => 'Last Name',
			'Gender' => 'Gender',
			'DateofBirth' => 'Date Of Birth',
			'Nationality' => 'Nationality',
			'POBox' => 'Po Box',
			'PostalCode' => 'Postal Code',
			'City' => 'City',
			'Region' => 'Region',
			'Country' => 'Country',
			'APIDType' => 'Ap Id Type',
			'APIDNumber' => 'Ap Id Number',
			'APIDPlaceofIssue' => 'Ap Id Place Of Issue',
			'APIDIssueDateGregorian' => 'Ap Id Issue Date',
			'APIDExpiryDateGregorian' => 'Ap Id Expiry Date',
			'EmailAddress' => 'Email Address',
			'Mobile' => 'Mobile',
			'Telephone' => 'Telephone',
			'ContactPreference' => 'Contact Preference',
			'CustomerCategory' => 'Customer Category',
			'CompanyCapital' => 'Company Capital',
			'CompanyAddress' => 'Company Address',
			'StreetAddress' => 'Street Address',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('CompanyName', $this->CompanyName, true);
		$criteria->compare('CompanyType', $this->CompanyType, true);
		$criteria->compare('Induistry', $this->Induistry, true);
		$criteria->compare('CountryofOrigin', $this->CountryofOrigin, true);
		$criteria->compare('NumberofEmployees', $this->NumberofEmployees);
		$criteria->compare('NumberofOffices', $this->NumberofOffices);
		$criteria->compare('IDDocumentType', $this->IDDocumentType, true);
		$criteria->compare('IDDocumentNumber', $this->IDDocumentNumber, true);
		$criteria->compare('IDDocumentPlaceofIssue', $this->IDDocumentPlaceofIssue, true);
		$criteria->compare('IDDocumentIssueDateGregorian', $this->IDDocumentIssueDateGregorian, true);
		$criteria->compare('IDDocumentExpiryDateGregorian', $this->IDDocumentExpiryDateGregorian, true);
		$criteria->compare('Title', $this->Title, true);
		$criteria->compare('FirstName', $this->FirstName, true);
		$criteria->compare('MiddleName', $this->MiddleName, true);
		$criteria->compare('LastName', $this->LastName, true);
		$criteria->compare('Gender', $this->Gender, true);
		$criteria->compare('DateofBirth', $this->DateofBirth, true);
		$criteria->compare('Nationality', $this->Nationality, true);
		$criteria->compare('street', $this->street, true);
		$criteria->compare('POBox', $this->POBox, true);
		$criteria->compare('PostalCode', $this->PostalCode, true);
		$criteria->compare('City', $this->City, true);
		$criteria->compare('Region', $this->Region, true);
		$criteria->compare('Country', $this->Country, true);
		$criteria->compare('APIDType', $this->APIDType, true);
		$criteria->compare('APIDNumber', $this->APIDNumber, true);
		$criteria->compare('APIDPlaceofIssue', $this->APIDPlaceofIssue, true);
		$criteria->compare('APIDIssueDateGregorian', $this->APIDIssueDateGregorian, true);
		$criteria->compare('APIDExpiryDateGregorian', $this->APIDExpiryDateGregorian, true);
		$criteria->compare('EmailAddress', $this->EmailAddress, true);
		$criteria->compare('Mobile', $this->Mobile, true);
		$criteria->compare('Telephone', $this->Telephone, true);
		$criteria->compare('ContactPreference', $this->ContactPreference, true);
		$criteria->compare('CustomerCategory', $this->CustomerCategory, true);
		$criteria->compare('CompanyCapital', $this->CompanyCapital, true);
		$criteria->compare('CompanyAddress', $this->CompanyAddress, true);
		$criteria->compare('StreetAddress', $this->StreetAddress, true);

		return new CActiveDataProvider($this, array(
					'criteria' => $criteria,
				));
	}

}

