<?php

/**
 * This is the model class for table "product_pricing".
 *
 * The followings are the available columns in table 'product_pricing':
 * @property integer $product_pricing_id
 * @property integer $product_refno
 * @property integer $period
 * @property integer $free_period
 * @property string $price_tier
 * @property integer $nrc
 * @property string $nrc_pr
 * @property string $nrc_pt
 * @property integer $mrc
 * @property string $mrc_pr
 * @property string $mrc_pt
 * @property integer $device
 */
class ProductPricing extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductPricing the static model class
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
		return 'product_pricing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_refno', 'required'),
			array('product_refno, period, free_period, nrc, mrc, device', 'numerical', 'integerOnly'=>true),
			array('price_tier', 'length', 'max'=>45),
			array('nrc_pr, nrc_pt, mrc_pr, mrc_pt', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_pricing_id, product_refno, period, free_period, price_tier, nrc, nrc_pr, nrc_pt, mrc, mrc_pr, mrc_pt, device', 'safe', 'on'=>'search'),
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
			'product_pricing_id' => 'Product Pricing ID',
			'product_refno' => 'Product Refno',
			'period' => 'period',
			'free_period' => 'Free period',
			'price_tier' => 'Price Tier',
			'nrc' => 'Nrc',
			'nrc_pr' => 'Nrc Pr',
			'nrc_pt' => 'Nrc Pt',
			'mrc' => 'Mrc',
			'mrc_pr' => 'Mrc Pr',
			'mrc_pt' => 'Mrc Pt',
			'device' => 'device',
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

		$criteria->compare('product_pricing_id',$this->product_pricing_id);
		$criteria->compare('product_refno',$this->product_refno);
		$criteria->compare('period',$this->period);
		$criteria->compare('free_period',$this->free_period);
		$criteria->compare('price_tier',$this->price_tier,true);
		$criteria->compare('nrc',$this->nrc);
		$criteria->compare('nrc_pr',$this->nrc_pr,true);
		$criteria->compare('nrc_pt',$this->nrc_pt,true);
		$criteria->compare('mrc',$this->mrc);
		$criteria->compare('mrc_pr',$this->mrc_pr,true);
		$criteria->compare('mrc_pt',$this->mrc_pt,true);
		$criteria->compare('device',$this->device);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function removePriceIds($id) {
		$ids_arr = Yii::app()->db->createCommand()
				->delete('product_pricing','product_refno=:product_refno', array(':product_refno'=>$id));
	}
}