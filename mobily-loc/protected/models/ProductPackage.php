<?php

/**
 * This is the model class for table "product_package".
 *
 * The followings are the available columns in table 'product_package':
 * @property integer $product_package_id
 * @property string $package_name
 * @property integer $speed_based
 * @property string $package_type
 * @property string $customer_type
 * @property string $img
 * @property integer $package_type_id
 * @property string $name_en
 * @property string $name_ar
 * @property string $desc_en
 * @property string $desc_ar
 * @property integer $enabled
 * dddd
 */
class ProductPackage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_package';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('package_name, package_type, customer_type, name_en, name_ar', 'required'),
			array('speed_based, package_type_id, enabled', 'numerical', 'integerOnly'=>true),
			array('package_name, img, name_en, name_ar', 'length', 'max'=>250),
			array('package_type', 'length', 'max'=>6),
			array('customer_type', 'length', 'max'=>3),
			array('desc_en, desc_ar', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('product_package_id, package_name, speed_based, package_type, customer_type, img, package_type_id, name_en, name_ar, desc_en, desc_ar, enabled', 'safe', 'on'=>'search'),
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
			'product_package_id' => 'Product Package',
			'package_name' => 'Package Name',
			'speed_based' => 'Speed Based',
			'package_type' => 'Package Type',
			'customer_type' => 'Customer Type',
			'img' => 'Img',
			'package_type_id' => 'Package Type',
			'name_en' => 'Name En',
			'name_ar' => 'Name Ar',
			'desc_en' => 'Desc En',
			'desc_ar' => 'Desc Ar',
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

		$criteria->compare('product_package_id',$this->product_package_id);
		$criteria->compare('package_name',$this->package_name,true);
		$criteria->compare('speed_based',$this->speed_based);
		$criteria->compare('package_type',$this->package_type,true);
		$criteria->compare('customer_type',$this->customer_type,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('package_type_id',$this->package_type_id);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_ar',$this->name_ar,true);
		$criteria->compare('desc_en',$this->desc_en,true);
		$criteria->compare('desc_ar',$this->desc_ar,true);
		$criteria->compare('enabled',$this->enabled);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductPackage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
