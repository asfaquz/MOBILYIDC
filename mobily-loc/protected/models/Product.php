<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property string $product_id
 * @property integer $product_refno
 * @property integer $sort
 * @property integer $package
 * @property integer $product_type
 * @property string $plan_type
 * @property string $speed
 * @property string $name
 * @property string $siebel_package_name
 * @property integer $mandatory_addon_group
 * @property string $msisdn_method
 * @property integer $sim_needed
 * @property string $sim_method
 * @property integer $bundle_device
 * @property integer $optional_addon_group
 * @property string $vanity
 * @property integer $enabled
 * fdf
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_refno, package, product_type, name, siebel_package_name, msisdn_method', 'required'),
			array('product_refno, sort, package, product_type, mandatory_addon_group, sim_needed, bundle_device, optional_addon_group, enabled', 'numerical', 'integerOnly'=>true),
			array('plan_type', 'length', 'max'=>12),
			array('speed', 'length', 'max'=>50),
			array('name, siebel_package_name', 'length', 'max'=>250),
			array('msisdn_method', 'length', 'max'=>22),
			array('sim_method', 'length', 'max'=>16),
			array('vanity', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('product_id, product_refno, sort, package, product_type, plan_type, speed, name, siebel_package_name, mandatory_addon_group, msisdn_method, sim_needed, sim_method, bundle_device, optional_addon_group, vanity, enabled', 'safe', 'on'=>'search'),
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
			'product_id' => 'Product',
			'product_refno' => 'Product Refno',
			'sort' => 'Sort',
			'package' => 'Package',
			'product_type' => 'Product Type',
			'plan_type' => 'Plan Type',
			'speed' => 'Speed',
			'name' => 'Name',
			'siebel_package_name' => 'Siebel Package Name',
			'mandatory_addon_group' => 'Mandatory Addon Group',
			'msisdn_method' => 'Msisdn Method',
			'sim_needed' => 'Sim Needed',
			'sim_method' => 'Sim Method',
			'bundle_device' => 'Bundle Device',
			'optional_addon_group' => 'Optional Addon Group',
			'vanity' => 'Vanity',
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

		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('product_refno',$this->product_refno);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('package',$this->package);
		$criteria->compare('product_type',$this->product_type);
		$criteria->compare('plan_type',$this->plan_type,true);
		$criteria->compare('speed',$this->speed,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('siebel_package_name',$this->siebel_package_name,true);
		$criteria->compare('mandatory_addon_group',$this->mandatory_addon_group);
		$criteria->compare('msisdn_method',$this->msisdn_method,true);
		$criteria->compare('sim_needed',$this->sim_needed);
		$criteria->compare('sim_method',$this->sim_method,true);
		$criteria->compare('bundle_device',$this->bundle_device);
		$criteria->compare('optional_addon_group',$this->optional_addon_group);
		$criteria->compare('vanity',$this->vanity,true);
		$criteria->compare('enabled',$this->enabled);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
