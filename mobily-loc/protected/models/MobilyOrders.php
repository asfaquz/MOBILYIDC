<?php

/**
 * This is the model class for table "mobily_orders".
 *
 * The followings are the available columns in table 'mobily_orders':
 * @property integer $id_mobily_orders
 * @property integer $product_type_id
 * @property string $id_order
 * @property string $order_date
 * @property integer $id_user
 * @property string $SIM
 * @property string $IMEI
 * @property integer $item_id
 * @property string $sku
 * @property string $status
 * @property string $order_details
 * @property integer $id_order_cart
 * @property integer $phone_number_id
 */
class MobilyOrders extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mobily_orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_type_id, id_order, order_date, id_user, item_id, sku', 'required'),
			array('product_type_id, id_user, item_id, id_order_cart, phone_number_id', 'numerical', 'integerOnly'=>true),
			array('id_order', 'length', 'max'=>20),
			array('SIM, IMEI, sku, status', 'length', 'max'=>45),
			array('order_details', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_mobily_orders, product_type_id, id_order, order_date, id_user, SIM, IMEI, item_id, sku, status, order_details, id_order_cart, phone_number_id', 'safe', 'on'=>'search'),
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
			'id_mobily_orders' => 'Id Mobily Orders',
			'product_type_id' => 'Product Type',
			'id_order' => 'Id Order',
			'order_date' => 'Order Date',
			'id_user' => 'Id User',
			'SIM' => 'Sim',
			'IMEI' => 'Imei',
			'item_id' => 'Item',
			'sku' => 'Sku',
			'status' => 'Status',
			'order_details' => 'Order Details',
			'id_order_cart' => 'Id Order Cart',
			'phone_number_id' => 'Phone Number',
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

		$criteria->compare('id_mobily_orders',$this->id_mobily_orders);
		$criteria->compare('product_type_id',$this->product_type_id);
		$criteria->compare('id_order',$this->id_order,true);
		$criteria->compare('order_date',$this->order_date,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('SIM',$this->SIM,true);
		$criteria->compare('IMEI',$this->IMEI,true);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('sku',$this->sku,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('order_details',$this->order_details,true);
		$criteria->compare('id_order_cart',$this->id_order_cart);
		$criteria->compare('phone_number_id',$this->phone_number_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MobilyOrders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
