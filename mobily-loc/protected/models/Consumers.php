<?php

/**
 * This is the model class for table "consumers".
 *
 * The followings are the available columns in table 'consumers':
 * @property integer $consumers_id
 * @property integer $user_id
 * @property string $Title#
 * @property string $FirstName
 * @property string $LastName
 * @property string $Gender#
 * @property string $Nationality
 * @property string $DOBFormat
 * @property string $DateofBirth
 * @property string $IDDocumentType#
 * @property string $IDDocumentNumber#
 * @property string $IDDocExpDateFormat
 * @property string $IDDocumentHExpiryDate#
 * @property string $ContactPreference
 * @property string $LanguagePreference#
 * @property string $Occupation#
 * @property string $PostalCode#
 * @property string $POBox#
 * @property string $Country#
 * @property string $City#
 * @property string $EmailAddress#
 * @property string $StreetAddress#
 */
class Consumers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Consumers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'consumers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, Title, FirstName, LastName, Gender, Nationality, DOBFormat, DateofBirth, IDDocumentType, IDDocumentNumber, IDDocExpDateFormat, IDDocumentHExpiryDate, ContactPreference, LanguagePreference, Occupation, PostalCode, POBox, Country, City, EmailAddress, StreetAddress', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('Title, Nationality, LanguagePreference, POBox', 'length', 'max'=>45),
			array('FirstName, LastName, ContactPreference, Occupation, Country, City, EmailAddress, StreetAddress', 'length', 'max'=>255),
			array('Gender', 'length', 'max'=>6),
			array('IDDocumentHExpiryDate', 'date', 'format'=>array('dd/mm/yyyy')),
			array('EmailAddress', 'email'),
			array('IDDocumentNumber, PostalCode', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('consumers_id, user_id, Title, FirstName, LastName, Gender, Nationality, DOBFormat, DateofBirth, IDDocumentType, IDDocumentNumber, IDDocExpDateFormat, IDDocumentHExpiryDate, ContactPreference, LanguagePreference, Occupation, PostalCode, POBox, Country, City, EmailAddress, StreetAddress', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'consumers_id' => 'Consumers',
			'user_id' => 'User',
			'Title' => 'Title',
			'FirstName' => 'First Name',
			'LastName' => 'Last Name',
			'Gender' => 'Gender',
			'Nationality' => 'Nationality',
			'DOBFormat' => 'Dobformat',
			'DateofBirth' => 'Dateof Birth',
			'IDDocumentType' => 'Iddocument Type',
			'IDDocumentNumber' => 'Iddocument Number',
			'IDDocExpDateFormat' => 'Iddoc Exp Date Format',
			'IDDocumentHExpiryDate' => 'Iddocument Hexpiry Date',
			'ContactPreference' => 'Contact Preference',
			'LanguagePreference' => 'Language Preference',
			'Occupation' => 'Occupation',
			'PostalCode' => 'Postal Code',
			'POBox' => 'Pobox',
			'Country' => 'Country',
			'City' => 'City',
			'EmailAddress' => 'Email Address',
			'StreetAddress' => 'Street Address',
			'consumer_document' => 'Consumer Document'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('consumers_id',$this->consumers_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('FirstName',$this->FirstName,true);
		$criteria->compare('LastName',$this->LastName,true);
		$criteria->compare('Gender',$this->Gender,true);
		$criteria->compare('Nationality',$this->Nationality,true);
		$criteria->compare('DOBFormat',$this->DOBFormat,true);
		$criteria->compare('DateofBirth',$this->DateofBirth,true);
		$criteria->compare('IDDocumentType',$this->IDDocumentType);
		$criteria->compare('IDDocumentNumber',$this->IDDocumentNumber,true);
		$criteria->compare('IDDocExpDateFormat',$this->IDDocExpDateFormat,true);
		$criteria->compare('IDDocumentHExpiryDate',$this->IDDocumentHExpiryDate,true);
		$criteria->compare('ContactPreference',$this->ContactPreference,true);
		$criteria->compare('LanguagePreference',$this->LanguagePreference,true);
		$criteria->compare('Occupation',$this->Occupation,true);
		$criteria->compare('PostalCode',$this->PostalCode,true);
		$criteria->compare('POBox',$this->POBox,true);
		$criteria->compare('Country',$this->Country,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('EmailAddress',$this->EmailAddress,true);
		$criteria->compare('StreetAddress',$this->StreetAddress,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}