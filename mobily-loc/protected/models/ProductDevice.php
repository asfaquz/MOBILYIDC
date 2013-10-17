<?php

/**
 * This is the model class for table "product_device".
 *
 * The followings are the available columns in table 'product_device':
 * @property integer $product_device_id
 * @property integer $id_item
 * @property integer $sku
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
 * @property string $enabled

 */
class ProductDevice extends CActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductDevice the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'product_device';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('device_name, group_id, img, name_en, name_ar', 'required'),
			array('group_id, cash_sale_allowed, cash_price', 'numerical', 'integerOnly' => true),
			array('device_name, pt, pr', 'length', 'max' => 250),
			array('img', 'file', 'mimeTypes' => 'image/gif, image/png, image/jpeg', 'maxSize' => 1024 * 1024, 'allowEmpty' => true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_device_id, id_item, sku, device_name, group_id, cash_sale_allowed, cash_price, pt, pr, customer_type, name_en, name_ar', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'devicegroups' => array(self::BELONGS_TO, 'ProductDeviceGroup', 'group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'product_device_id' => 'Product Device ID',
			'id_item' => 'ID Item',
			'sku' => 'SKU',
			'device_name' => 'Device Name',
			'group_id' => 'Group',
			'cash_sale_allowed' => 'Cash Sale Allowed',
			'cash_price' => 'Cash Price',
			'pt' => 'PT',
			'pr' => 'PR',
			'customer_type' => 'Customer Type',
			'img' => 'Image',
			'name_en' => 'Name EN',
			'name_ar' => 'Name AR',
			'enabled' => 'Enabled'

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

		$criteria->compare('product_device_id', $this->product_device_id);
		$criteria->compare('id_item', $this->id_item);
		$criteria->compare('sku', $this->sku);
		$criteria->compare('device_name', $this->device_name, true);
		$criteria->compare('group_id', $this->group_id);
		$criteria->compare('cash_sale_allowed', $this->cash_sale_allowed);
		$criteria->compare('cash_price', $this->cash_price);
		$criteria->compare('pt', $this->pt, true);
		$criteria->compare('pr', $this->pr, true);
		$criteria->compare('customer_type', $this->customer_type, true);
		$criteria->compare('img', $this->img, true);
		$criteria->compare('name_en', $this->name_en);
		$criteria->compare('name_ar', $this->name_ar);
		$criteria->compare('enabled', $this->enabled);

		return new CActiveDataProvider($this, array(
					'criteria' => $criteria,
				));
	}

}