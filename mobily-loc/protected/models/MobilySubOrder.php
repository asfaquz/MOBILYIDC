<?php

/**
 * This is the model class for table "mobily_sub_order".
 *
 * The followings are the available columns in table 'mobily_sub_order':
 * @property integer $id_mobily_sub_order
 * @property string $id_order
 * @property integer $sub_order_no
 * @property integer $stand_device
 * @property integer $id_product_type
 * @property string $sub_order_details
 * @property integer $quantity
 * @property string $package_type
 * @property string $product_id
 * @property string $device_id
 * @property double $sub_order_total
 * @property string $sim_type
 * @property string $sim_id_item
 * @property string $sim_sku
 * @property string $device_id_item
 * @property string $device_sku
 */
class MobilySubOrder extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mobily_sub_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_mobily_sub_order, id_order, sub_order_no, sub_order_details, quantity, sub_order_total', 'required'),
			array('id_mobily_sub_order, sub_order_no, stand_device, id_product_type, quantity', 'numerical', 'integerOnly'=>true),
			array('sub_order_total', 'numerical'),
			array('id_order', 'length', 'max'=>20),
			array('package_type', 'length', 'max'=>10),
			array('product_id, device_id', 'length', 'max'=>11),
			array('sim_type', 'length', 'max'=>5),
			array('sim_id_item, sim_sku, device_id_item, device_sku', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_mobily_sub_order, id_order, sub_order_no, stand_device, id_product_type, sub_order_details, quantity, package_type, product_id, device_id, sub_order_total, sim_type, sim_id_item, sim_sku, device_id_item, device_sku', 'safe', 'on'=>'search'),
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
			'id_mobily_sub_order' => 'Id Mobily Sub Order',
			'id_order' => 'Id Order',
			'sub_order_no' => 'Sub Order No',
			'stand_device' => 'Stand Device',
			'id_product_type' => 'Id Product Type',
			'sub_order_details' => 'Sub Order Details',
			'quantity' => 'Quantity',
			'package_type' => 'Package Type',
			'product_id' => 'Product',
			'device_id' => 'Device',
			'sub_order_total' => 'Sub Order Total',
			'sim_type' => 'Sim Type',
			'sim_id_item' => 'Sim Id Item',
			'sim_sku' => 'Sim Sku',
			'device_id_item' => 'Device Id Item',
			'device_sku' => 'Device Sku',
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

		$criteria->compare('id_mobily_sub_order',$this->id_mobily_sub_order);
		$criteria->compare('id_order',$this->id_order,true);
		$criteria->compare('sub_order_no',$this->sub_order_no);
		$criteria->compare('stand_device',$this->stand_device);
		$criteria->compare('id_product_type',$this->id_product_type);
		$criteria->compare('sub_order_details',$this->sub_order_details,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('package_type',$this->package_type,true);
		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('device_id',$this->device_id,true);
		$criteria->compare('sub_order_total',$this->sub_order_total);
		$criteria->compare('sim_type',$this->sim_type,true);
		$criteria->compare('sim_id_item',$this->sim_id_item,true);
		$criteria->compare('sim_sku',$this->sim_sku,true);
		$criteria->compare('device_id_item',$this->device_id_item,true);
		$criteria->compare('device_sku',$this->device_sku,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MobilySubOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
