<?php

/**
 * This is the model class for table "product_addon_value".
 *
 * The followings are the available columns in table 'product_addon_value':
 * @property integer $product_addon_value_id
 * @property integer $addon
 * @property integer $hours
 * @property double $fees
 * @property integer $min_t
 * @property integer $max_t
 * @property double $unit_price
 * @property string $value
 * @property double $price
 * @property integer $sort
 * @property integer $enabled
 * 
 */
class ProductAddonValue extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_addon_value';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('addon', 'required'),
			array('addon, hours, min_t, max_t, sort, enabled', 'numerical', 'integerOnly'=>true),
			array('fees, unit_price, price', 'numerical'),
			array('value', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('product_addon_value_id, addon, hours, fees, min_t, max_t, unit_price, value, price, sort, enabled', 'safe', 'on'=>'search'),
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
			'product_addon_value_id' => 'Product Addon Value',
			'addon' => 'Addon',
			'hours' => 'Hours',
			'fees' => 'Fees',
			'min_t' => 'Min T',
			'max_t' => 'Max T',
			'unit_price' => 'Unit Price',
			'value' => 'Value',
			'price' => 'Price',
			'sort' => 'Sort',
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

		$criteria->compare('product_addon_value_id',$this->product_addon_value_id);
		$criteria->compare('addon',$this->addon);
		$criteria->compare('hours',$this->hours);
		$criteria->compare('fees',$this->fees);
		$criteria->compare('min_t',$this->min_t);
		$criteria->compare('max_t',$this->max_t);
		$criteria->compare('unit_price',$this->unit_price);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('enabled',$this->enabled);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductAddonValue the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
