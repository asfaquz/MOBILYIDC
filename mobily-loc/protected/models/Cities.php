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
 *
 * The followings are the available model relations:
 * @property Languages[] $languages
 * @property Countries $idCountry
 * @property Regions[] $regions
 */
class Cities extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cities the static model class
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
			// Please remove those attributes that should not be searched.
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
			'languages' => array(self::MANY_MANY, 'Languages', 'cities_labels(id_city, id_language)'),
			'idCountry' => array(self::BELONGS_TO, 'Countries', 'id_country'),
			'regions' => array(self::HAS_MANY, 'Regions', 'id_city'),
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

	public function getCitiesList($dIdLanguage, $dIdCountry=0)
	{

		if (!$dIdCountry) {
			$dIdCountry = Countries::model()->getDefaultCountryId();
		}

		$aCitiesLabels	= $this->getCities(Yii::app()->params[Yii::app()->getLanguage()], $dIdCountry);
		$aCitiesValues	= $this->getCitiesValues($dIdCountry);
		$aResult			= array();

		for ($i=0; $i < count($aCitiesLabels); $i++) {
			$aResult[] = array(
							'id'	=> $aCitiesValues[$i]['id_city'],
							'value'	=> $aCitiesValues[$i]['city_name'],
							'name'	=> $aCitiesLabels[$i]['city_name'],
						);
		}

		return $aResult;
	}

	public function getCities($dIdLanguage, $dIdCountry)
	{

		$aCities = Yii::app()->db->createCommand()
								->select('a.id_city,b.city_name')
								->from('cities a,countries c,cities_labels b')
								->where('b.id_city = a.id_city AND a.id_country= '.$dIdCountry.' AND b.id_language = '.$dIdLanguage)
								->order('a.is_default desc, a.priority asc')
								->queryAll();
		return $aCities;
	}

	private function getCitiesValues($dIdCountry)
	{
		$aCities = Yii::app()->db->createCommand()
								->select('a.id_city,b.city_name')
								->from('cities a,countries c,cities_labels b')
								->where('b.id_city = a.id_city AND a.id_country= '.$dIdCountry.' AND b.id_language = 1')
								->order('a.is_default desc, a.priority asc')
								->queryAll();
		return $aCities;
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

		$criteria->compare('id_city',$this->id_city);
		$criteria->compare('id_country',$this->id_country);
		$criteria->compare('city_iso_code',$this->city_iso_code,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('is_default',$this->is_default);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}