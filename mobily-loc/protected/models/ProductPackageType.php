<?php

/**
 * This is the model class for table "product_package_type".
 *
 * The followings are the available columns in table 'product_package_type':
 * @property integer $product_package_type_id
 * @property string $package_type_name
 * @property string $customer_type
 * @property string $name_en
 * @property string $name_ar
 */
class ProductPackageType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductPackageType the static model class
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
		return 'product_package_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_package_type_id, package_type_name, customer_type, name_en, name_ar', 'required'),
			array('product_package_type_id', 'numerical', 'integerOnly'=>true),
			array('package_type_name', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_package_type_id, package_type_name, customer_type, name_en, name_ar', 'safe', 'on'=>'search'),
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
			'product_package_type_id' => 'Product Package Type',
			'package_type_name' => 'Package Type Name',
			'customer_type' => 'Customer Type',
			'name_en' => 'Name EN',
			'name_ar' => 'Name AR',
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

		$criteria->compare('product_package_type_id',$this->product_package_type_id);
		$criteria->compare('package_type_name',$this->package_type_name,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_ar',$this->name_ar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}