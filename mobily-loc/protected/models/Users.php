<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $souq_id
 * @property string $mobily_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $username
 * @property integer $souq_confirmed
 * @property string $user_status
 * @property string $msisdn
 * @property string $mba
 * @property string $lang
 * @property string $type
 * @property integer $document_type
 * @property integer $document_number
 * @property string $trans_id
 * @property string $consumer_expiry
 */
class Users extends CActiveRecord
{
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
			array('souq_id, mobily_id, first_name, last_name, email, username, souq_confirmed', 'required'),
			array('souq_confirmed, document_type, document_number', 'numerical', 'integerOnly'=>true),
			array('souq_id, mobily_id, msisdn, mba, trans_id', 'length', 'max'=>20),
			array('first_name, last_name, username', 'length', 'max'=>50),
			array('email', 'length', 'max'=>32),
			array('user_status', 'length', 'max'=>17),
			array('lang', 'length', 'max'=>2),
			array('type', 'length', 'max'=>3),
			array('consumer_expiry', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, souq_id, mobily_id, first_name, last_name, email, username, souq_confirmed, user_status, msisdn, mba, lang, type, document_type, document_number, trans_id, consumer_expiry', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'souq_id' => 'Souq',
			'mobily_id' => 'Mobily',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'username' => 'Username',
			'souq_confirmed' => 'Souq Confirmed',
			'user_status' => 'User Status',
			'msisdn' => 'Msisdn',
			'mba' => 'Mba',
			'lang' => 'Lang',
			'type' => 'Type',
			'document_type' => 'Document Type',
			'document_number' => 'Document Number',
			'trans_id' => 'Trans',
			'consumer_expiry' => 'Consumer Expiry',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('souq_id',$this->souq_id,true);
		$criteria->compare('mobily_id',$this->mobily_id,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('souq_confirmed',$this->souq_confirmed);
		$criteria->compare('user_status',$this->user_status,true);
		$criteria->compare('msisdn',$this->msisdn,true);
		$criteria->compare('mba',$this->mba,true);
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('document_type',$this->document_type);
		$criteria->compare('document_number',$this->document_number);
		$criteria->compare('trans_id',$this->trans_id,true);
		$criteria->compare('consumer_expiry',$this->consumer_expiry,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
