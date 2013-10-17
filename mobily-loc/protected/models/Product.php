<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $product_id
 * @property integer $product_refno
 * @property integer $sort
 * @property integer $package
 * @property integer $product_type
 * @property integer $plan_type
 * @property integer $speed
 * @property string $name
 * @property string $siebel_package_name
 * @property integer $mandatory_addon_group
 * @property string $msisdn_method
 * @property integer $sim_needed
 * @property string $sim_method
 * @property integer $bundle_device
 * @property integer $optional_addon_group
 * @property string $vanity
 * @property string $enabled

 */
class Product extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $classname active record class name.
	 * @return Product the static model class
	 */
	public static function model($classname=__CLASS__)
	{
		return parent::model($classname);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tablename()
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
			array('product_refno, sort, package,product_type, name, siebel_package_name, msisdn_method', 'required'),
			array('product_refno, sort, package, product_type,mandatory_addon_group, sim_needed, bundle_device, optional_addon_group', 'numerical', 'integerOnly'=>true),
			array('name, siebel_package_name', 'length', 'max'=>250),
			array('plan_type', 'length', 'max'=>45),
			array('speed', 'length', 'max'=>50),
			array('msisdn_method', 'length', 'max'=>22),
			array('sim_method', 'length', 'max'=>16),
			array('product_refno','unique','className'=>'Product'),
			array('sort','sortValexists'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_id, product_refno, product_type,plan_type,speed, name, siebel_package_name, mandatory_addon_group, msisdn_method, sim_needed, sim_method, bundle_device, optional_addon_group, vanity', 'safe', 'on'=>'search'),
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
                    'bundle_devices' => array(self::HAS_MANY, 'ProductBundleDevice', array('product_refno' => 'product_refno')),
                    'pricing' => array(self::HAS_MANY, 'ProductPricing', array('product_refno' => 'product_refno'), 'order'=>'period ASC'),
                    'mand_addons' => array(self::HAS_MANY, 'ProductAddon', array('group_id' => 'mandatory_addon_group')),
                    'opnl_addons' => array(self::HAS_MANY, 'ProductAddon', array('group_id' => 'optional_addon_group')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'product_id' => 'Product ID',
			'product_refno' => 'Product Refno',
			'sort' => 'Sort',
			'package' => 'Package',
			'product_type' => 'Product Type',
			'plan_type' => 'Plan Type',
			'speed' => 'Speed',
			'name' => 'name',
			'siebel_package_name' => 'Siebel Package name',
			'mandatory_addon_group' => 'Mandatory Addon Group',
			'msisdn_method' => 'Msisdn Method',
			'sim_needed' => 'Sim Needed',
			'sim_method' => 'Sim Method',
			'bundle_device' => 'Bundle Device',
			'optional_addon_group' => 'Optional Addon Group',
			'vanity' => 'Vanity',
			'enabled' => 'Enabled'

		);
	}

	/*
 	*  Checking sort value is exists or not By ramesh
 	*/
	public function sortValexists($attribute,$params)
	{
		$action=Yii::app()->controller->action->id;
		if($action=="create")
		{
			$attributCount='';
			
			if($this->attributes['sort']!=0)
			$attributCount=Product::model()->findByAttributes(array('sort'=>$this->attributes['sort'], 'package'=>$this->attributes['package']));
				
			if(count($attributCount)!=0)
			{
				$this->addError($attribute, 'Please change the value of sort');
			}
		}	
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

		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('product_refno',$this->product_refno);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('package',$this->package);
		$criteria->compare('product_type',$this->product_type);
		$criteria->compare('plan_type',$this->plan_type);
		$criteria->compare('speed',$this->speed);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('siebel_package_name',$this->siebel_package_name,true);
		$criteria->compare('mandatory_addon_group',$this->mandatory_addon_group);
		$criteria->compare('msisdn_method',$this->msisdn_method,true);
		$criteria->compare('sim_needed',$this->sim_needed);
		$criteria->compare('sim_method',$this->sim_method,true);
		$criteria->compare('bundle_device',$this->bundle_device);
		$criteria->compare('optional_addon_group',$this->optional_addon_group);
		$criteria->compare('vanity',$this->vanity);
		$criteria->compare('enabled', $this->enabled);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}