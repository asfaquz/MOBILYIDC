<?php

/**
 * This is the model class for table "product_package".
 *
 * The followings are the available columns in table 'product_package':
 * @property integer $product_package_id
 * @property string $package_name
 * @property string $speed_based
 * @property string $package_type
 * @property string $img
 * @property integer $package_type_id
 * @property string $name_en
 * @property string $name_ar
 * @property string $desc_en
 * @property string $desc_ar
 * @property string $enabled
 */
class ProductPackage extends CActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductPackage the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'product_package';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('package_name, speed_based, package_type, img, name_en, name_ar, desc_en, desc_ar', 'required'),
			array('package_name', 'length', 'max' => 250),
			array('package_type', 'in', 'range' => array('period', 'single', 'device'), 'allowEmpty' => false),
			array('img', 'file', 'mimeTypes' => 'image/gif, image/png, image/jpeg', 'maxSize' => 1024 * 1024, 'allowEmpty' => true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_package_id, package_name, speed_based, package_type, package_type_id', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'products' => array(self::HAS_MANY, 'Product', 'package', 'order' => 'sort ASC')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'product_package_id' => 'Product Package',
			'package_name' => 'Package Name',
			'speed_based' => 'Speed Based',
			'package_type' => 'Package Type',
			'img' => 'Image',
			'package_type_id' => 'Package Type Id',
			'name_en' => 'Name EN',
			'name_ar' => 'Name AR',
			'desc_en' => 'Desc EN',
			'desc_ar' => 'Desc AR',
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

		$criteria->compare('product_package_id', $this->product_package_id);
		$criteria->compare('package_name', $this->package_name, true);
		$criteria->compare('speed_based', $this->speed_based, true);
		$criteria->compare('package_type', $this->package_type, true);
		$criteria->compare('img', $this->img, true);
		$criteria->compare('package_type_id', $this->package_type_id, true);
		$criteria->compare('name_en', $this->name_en);
		$criteria->compare('name_ar', $this->name_ar);
		$criteria->compare('desc_en', $this->desc_en);
		$criteria->compare('desc_ar', $this->desc_ar);
		$criteria->compare('enabled', $this->enabled);
		return new CActiveDataProvider($this, array(
					'criteria' => $criteria,
				));
	}

}