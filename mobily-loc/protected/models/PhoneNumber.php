<?php

/**
 * This is the model class for table "phone_number".
 *
 * The followings are the available columns in table 'phone_number':
 * @property integer $phone_number_id
 * @property string $number
 * @property integer $vanity
 * @property integer $active
 * @property string $added_date
 * @property string $updated_date
 */
class PhoneNumber extends CActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PhoneNumber the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'phone_number';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('number, vanity', 'required'),
			array('active', 'numerical', 'integerOnly' => true),
			array('number', 'length', 'max' => 15),
			array('added_date, updated_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('phone_number_id, number, vanity, active, added_date, updated_date', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'phone_number_id' => 'Phone Number',
			'number' => 'Number',
			'vanity' => 'Vanity',
			'active' => 'Active',
			'added_date' => 'Added Date',
			'updated_date' => 'Updated Date',
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

		$criteria->compare('phone_number_id', $this->phone_number_id);
		$criteria->compare('number', $this->number, true);
		$criteria->compare('vanity', $this->vanity, true);
		$criteria->compare('active', $this->active);
		$criteria->compare('added_date', $this->added_date, true);
		$criteria->compare('updated_date', $this->updated_date, true);

		return new CActiveDataProvider($this, array(
					'criteria' => $criteria,
				));
	}

	public function behaviors() {
		return array('CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'added_date',
				'updateAttribute' => 'updated_date'
			)
		);
	}

}