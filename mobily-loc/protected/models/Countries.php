<?php

/**
 * This is the model class for table "countries".
 *
 * The followings are the available columns in table 'countries':
 * @property integer $id_country
 * @property string $country_iso_code
 * @property integer $country_code
 * @property integer $is_default
 *
 * The followings are the available model relations:
 * @property Cities[] $cities
 */
class Countries extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Countries the static model class
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
		return 'countries';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country_code, is_default', 'numerical', 'integerOnly'=>true),
			array('country_iso_code', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_country, country_iso_code, country_code, is_default', 'safe', 'on'=>'search'),
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
			'cities' => array(self::HAS_MANY, 'Cities', 'id_country'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_country' => 'Id Country',
			'country_iso_code' => 'Country Iso Code',
			'country_code' => 'Country Code',
			'is_default' => 'Is Default',
		);
	}

	public function getCountriesList($dIdLanguage)
	{
		$aCountriesLabels	= $this->getCountries(Yii::app()->params[Yii::app()->getLanguage()]);
		$aCountriesValues	= $this->getCountriesValues();
		$aResult			= array();

		for ($i=0; $i < count($aCountriesLabels); $i++) {
			$aResult[] = array(
							'id'	=> $aCountriesValues[$i]['id_country'],
							'value'	=> $aCountriesValues[$i]['name'],
							'name'	=> $aCountriesLabels[$i]['name'],
						);
		}

		return $aResult;
	}

	private function getCountries($dIdLanguage)
	{
		$aCountries = Yii::app()->db->createCommand()
								->select('a.id_country, b.name')
								->from('countries a')
								->join('countries_labels b', 'a.id_country=b.id_country')
								->where('b.id_language=:id', array(':id' => $dIdLanguage))
								->order('a.is_default desc, a.id_country asc')
								->queryAll();
		return $aCountries;
	}

	private function getCountriesValues()
	{
		$aCountries = Yii::app()->db->createCommand()
								->select('a.id_country, b.name')
								->from('countries a')
								->join('countries_labels b', 'a.id_country=b.id_country')
								->where('b.id_language=1')
								->order('a.is_default desc, a.id_country asc')
								->queryAll();
		return $aCountries;
	}

	public function getDefaultCountryId()
	{
		$aCountry = Yii::app()->db->createCommand()
								->select('id_country')
								->from('countries')
								->where('is_default=1')
								->queryRow();
		return $aCountry['id_country'];
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

		$criteria->compare('id_country',$this->id_country);
		$criteria->compare('country_iso_code',$this->country_iso_code,true);
		$criteria->compare('country_code',$this->country_code);
		$criteria->compare('is_default',$this->is_default);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}