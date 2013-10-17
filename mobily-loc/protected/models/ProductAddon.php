<?php

/**
 * This is the model class for table "product_addon".
 *
 * The followings are the available columns in table 'product_addon':
 * @property integer $product_addon_id
 * @property string $name
 * @property string $siebel_name
 * @property integer $group_id
 * @property string $type
 * @property string $name_en
 * @property string $name_ar
 * @property string $enabled

 */
class ProductAddon extends CActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $classname active record class name.
	 * @return ProductAddon the static model class
	 */
	public static function model($classname = __CLASS__) {
		return parent::model($classname);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tablename() {
		return 'product_addon';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, siebel_name, group_id, type, name_en, name_ar', 'required'),
			array('group_id', 'numerical', 'integerOnly' => true),
			array('name, siebel_name', 'length', 'max' => 250),
			array('type', 'in', 'range' => array('checkbox', 'select', 'select-hours', 'slider-rate'), 'allowEmpty' => false),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_addon_id, name, siebel_name, group_id, type, name_en, name_ar', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'values' => array(self::HAS_MANY, 'ProductAddonValue', 'addon')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'product_addon_id' => 'Product Addon ID',
			'name' => 'Name',
			'siebel_name' => 'Siebel name',
			'group_id' => 'Group',
			'type' => 'Type',
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

		$criteria->compare('product_addon_id', $this->product_addon_id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('siebel_name', $this->siebel_name, true);
		$criteria->compare('group_id', $this->group_id);
		$criteria->compare('type', $this->type);
		$criteria->compare('name_en', $this->name_en);
		$criteria->compare('name_ar', $this->name_ar);
		$criteria->compare('enabled', $this->enabled);

		return new CActiveDataProvider($this, array(
					'criteria' => $criteria,
				));
	}

}