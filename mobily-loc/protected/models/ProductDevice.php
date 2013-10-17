<?php

/**
 * This is the model class for table "product_device".
 *
 * The followings are the available columns in table 'product_device':
 * @property string $product_device_id
 * @property string $id_item
 * @property string $sku
 * @property string $device_name
 * @property integer $group_id
 * @property integer $cash_sale_allowed
 * @property integer $cash_price
 * @property string $pt
 * @property string $pr
 * @property string $customer_type
 * @property string $img
 * @property string $name_en
 * @property string $name_ar
 * @property integer $enabled
 */
class ProductDevice extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_device';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('device_name, group_id, customer_type, name_en, name_ar', 'required'),
			array('group_id, cash_sale_allowed, cash_price, enabled', 'numerical', 'integerOnly'=>true),
			array('id_item', 'length', 'max'=>20),
			array('sku', 'length', 'max'=>45),
			array('device_name, pt, pr, img, name_en, name_ar', 'length', 'max'=>250),
			array('customer_type', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('product_device_id, id_item, sku, device_name, group_id, cash_sale_allowed, cash_price, pt, pr, customer_type, img, name_en, name_ar, enabled', 'safe', 'on'=>'search'),
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
			'product_device_id' => 'Product Device',
			'id_item' => 'Id Item',
			'sku' => 'Sku',
			'device_name' => 'Device Name',
			'group_id' => 'Group',
			'cash_sale_allowed' => 'Cash Sale Allowed',
			'cash_price' => 'Cash Price',
			'pt' => 'Pt',
			'pr' => 'Pr',
			'customer_type' => 'Customer Type',
			'img' => 'Img',
			'name_en' => 'Name En',
			'name_ar' => 'Name Ar',
			'enabled' => 'Enabled',
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

		$criteria->compare('product_device_id',$this->product_device_id,true);
		$criteria->compare('id_item',$this->id_item,true);
		$criteria->compare('sku',$this->sku,true);
		$criteria->compare('device_name',$this->device_name,true);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('cash_sale_allowed',$this->cash_sale_allowed);
		$criteria->compare('cash_price',$this->cash_price);
		$criteria->compare('pt',$this->pt,true);
		$criteria->compare('pr',$this->pr,true);
		$criteria->compare('customer_type',$this->customer_type,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_ar',$this->name_ar,true);
		$criteria->compare('enabled',$this->enabled);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductDevice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
