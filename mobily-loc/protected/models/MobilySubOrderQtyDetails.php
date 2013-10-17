<?php

/**
 * This is the model class for table "mobily_sub_order_qty_details".
 *
 * The followings are the available columns in table 'mobily_sub_order_qty_details':
 * @property string $id_mobily_sub_order_qty_details
 * @property string $id_mobily_sub_order
 * @property integer $id_phone_number
 * @property string $sim_serial_number
 * @property string $imei_device
 * @property string $stand_device_account_msisdn
 */
class MobilySubOrderQtyDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mobily_sub_order_qty_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_mobily_sub_order', 'required'),
			array('id_phone_number', 'numerical', 'integerOnly'=>true),
			array('id_mobily_sub_order', 'length', 'max'=>20),
			array('sim_serial_number, imei_device', 'length', 'max'=>250),
			array('stand_device_account_msisdn', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_mobily_sub_order_qty_details, id_mobily_sub_order, id_phone_number, sim_serial_number, imei_device, stand_device_account_msisdn', 'safe', 'on'=>'search'),
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
			'id_mobily_sub_order_qty_details' => 'Id Mobily Sub Order Qty Details',
			'id_mobily_sub_order' => 'Id Mobily Sub Order',
			'id_phone_number' => 'Id Phone Number',
			'sim_serial_number' => 'Sim Serial Number',
			'imei_device' => 'Imei Device',
			'stand_device_account_msisdn' => 'Stand Device Account Msisdn',
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

		$criteria->compare('id_mobily_sub_order_qty_details',$this->id_mobily_sub_order_qty_details,true);
		$criteria->compare('id_mobily_sub_order',$this->id_mobily_sub_order,true);
		$criteria->compare('id_phone_number',$this->id_phone_number);
		$criteria->compare('sim_serial_number',$this->sim_serial_number,true);
		$criteria->compare('imei_device',$this->imei_device,true);
		$criteria->compare('stand_device_account_msisdn',$this->stand_device_account_msisdn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MobilySubOrderQtyDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
