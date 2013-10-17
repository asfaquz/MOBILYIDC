<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property integer $souq_id
 * @property integer $mobily_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $username
 * @property integer $souq_confirmed
 * @property string $user_status
 * @property integer $msisdn
 * @property integer $mba
 * @property string $lang
 * @property string $type
 * @property integer $document_type
 * @property string $document_number
 * @property integer $trans_id
 * @property string $consumer_expiry
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('souq_id, mobily_id, first_name, last_name, email, username, souq_confirmed, lang', 'required'),
				array('msisdn', 'numerical', 'integerOnly'=>true),
				array('first_name, last_name, username', 'length', 'max'=>50),
				array('email', 'length', 'max'=>60),
				array('email', 'email'),
				array('username, email, document_number', 'unique'),
				array('user_status', 'in', 'range'=>array('new','prospect_sent','prospect_fail','prospect_success','document_uploaded','document_fail','document_success','confirmed'),'allowEmpty'=>false),
				array('lang', 'in', 'range'=>array('ar','en'),'allowEmpty'=>false),
				array('id, souq_id, mobily_id, first_name, last_name, email, username, souq_confirmed, user_status, msisdn, mba, lang, type, document_type, document_number'
					,'filter','filter'=>array($obj=new CHtmlPurifier(),'purify')),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, souq_id, mobily_id, first_name, last_name, email, username, souq_confirmed, user_status, msisdn, mba, lang, type, document_type, document_number, trans_id', 'safe', 'on'=>'search'),
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
				'customer' => array(self::HAS_ONE, 'Customers', 'user_id'),
				'service' => array(self::HAS_ONE, 'CustomerServices', 'user_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'id' => 'ID',
				'souq_id' => 'Souq User ID',
				'mobily_id' => 'Mobily User Id',
				'first_name' => 'First Name',
				'last_name' => 'Last Name',
				'email' => 'Email',
				'username' => 'Username',
				'souq_confirmed' => 'Souq Confirmed',
				'user_status' => 'User Status',
				'msisdn' => 'MSISDN',
				'mba' => 'MBA',
				'lang' => 'Lang',
				'type' => 'Type',
				'document_type' => 'Document Type',
				'document_number' => 'Document Number',
				'trans_id' => 'Trans ID'
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

		$criteria->compare('id',$this->id);
		$criteria->compare('souq_id',$this->souq_id);
		$criteria->compare('mobily_id',$this->mobily_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('souq_confirmed',$this->souq_confirmed);
		$criteria->compare('user_status',$this->user_status,true);
		$criteria->compare('msisdn',$this->msisdn,true);
		$criteria->compare('mba',$this->mba,true);
		$criteria->compare('lan',$this->lang,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('document_type',$this->type,true);
		$criteria->compare('document_number',$this->type,true);
		$criteria->compare('trans_id',$this->trans_id,true);

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
}