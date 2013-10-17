<?php

/**
 * This is the model class for table "cities".
 *
 * The followings are the available columns in table 'cities':
 * @property integer $id_city
 * @property integer $id_country
 * @property string $city_iso_code
 * @property integer $priority
 * @property integer $is_default
 */
class Cities extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_country, priority, is_default', 'numerical', 'integerOnly'=>true),
			array('city_iso_code', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_city, id_country, city_iso_code, priority, is_default', 'safe', 'on'=>'search'),
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
			'id_city' => 'Id City',
			'id_country' => 'Id Country',
			'city_iso_code' => 'City Iso Code',
			'priority' => 'Priority',
			'is_default' => 'Is Default',
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

		$criteria->compare('id_city',$this->id_city);
		$criteria->compare('id_country',$this->id_country);
		$criteria->compare('city_iso_code',$this->city_iso_code,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('is_default',$this->is_default);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cities the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
