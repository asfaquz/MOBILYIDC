<?php

/**
 * This is the model class for table "product_bundle_device".
 *
 * The followings are the available columns in table 'product_bundle_device':
 * @property integer $product_bundle_device_id
 * @property integer $product_refno
 * @property integer $device_group
 */
class ProductBundleDevice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductBundleDevice the static model class
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
		return 'product_bundle_device';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_refno, device_group', 'required'),
			array('product_refno, device_group', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_bundle_device_id, product_refno, device_group', 'safe', 'on'=>'search'),
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
			'product_bundle_device_id' => 'Product Bundle Device ID',
			'product_refno' => 'Product Refno',
			'device_group' => 'Device Group',
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

		$criteria->compare('product_bundle_device_id',$this->product_bundle_device_id);
		$criteria->compare('product_refno',$this->product_refno);
		$criteria->compare('device_group',$this->device_group);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function removeBundleDeviceIds($id) {
		$ids_arr = Yii::app()->db->createCommand()
				->delete('product_bundle_device','product_refno=:product_refno', array(':product_refno'=>$id));
	}
}