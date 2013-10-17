<?php

/**
 * This is the model class for table "countries_labels".
 *
 * The followings are the available columns in table 'countries_labels':
 * @property integer $id_country_label
 * @property integer $id_country
 * @property integer $id_language
 * @property string $name
 * @property string $name_long
 * @property string $nationality
 */
class CountriesLabels extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CountriesLabels the static model class
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
		return 'countries_labels';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_country, id_language', 'required'),
			array('id_country, id_language', 'numerical', 'integerOnly'=>true),
			array('name, name_long, nationality', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_country_label, id_country, id_language, name, name_long, nationality', 'safe', 'on'=>'search'),
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
			'id_country_label' => 'Id Country Label',
			'id_country' => 'Id Country',
			'id_language' => 'Id Language',
			'name' => 'Name',
			'name_long' => 'Name Long',
			'nationality' => 'Nationality',
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

		$criteria->compare('id_country_label',$this->id_country_label);
		$criteria->compare('id_country',$this->id_country);
		$criteria->compare('id_language',$this->id_language);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('name_long',$this->name_long,true);
		$criteria->compare('nationality',$this->nationality,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}