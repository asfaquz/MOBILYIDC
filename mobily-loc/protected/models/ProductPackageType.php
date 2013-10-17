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
			array('package_type_name, customer_type, name_en, name_ar', 'required'),
			array('package_type_name', 'length', 'max'=>150),
			array('customer_type', 'length', 'max'=>3),
			array('name_en, name_ar', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
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
			'name_en' => 'Name En',
			'name_ar' => 'Name Ar',
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

		$criteria->compare('product_package_type_id',$this->product_package_type_id);
		$criteria->compare('package_type_name',$this->package_type_name,true);
		$criteria->compare('customer_type',$this->customer_type,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_ar',$this->name_ar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductPackageType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
