<?php

/**
 * This is the model class for table "customers_files".
 *
 * The followings are the available columns in table 'customers_files':
 * @property integer $id
 * @property integer $user_id
 * @property string $file
 * @property string $mime
 * @property string $type
 */
class CustomersFiles extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CustomersFiles the static model class
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
        return 'customers_files';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('file', 'required'),
            //array('user_id', 'numerical', 'integerOnly'=>true),
            //array('file', 'length', 'max'=>250),
        	//array('file', 'file','mimeTypes'=>'image/gif, image/png, image/jpeg', 'maxSize'=>1024 * 1024 * 2),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_id, file, mime, type', 'safe', 'on'=>'search'),
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
            'id' => 'ID',
            'user_id' => 'User',
            'file' => 'File',
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

        $criteria->compare('id',$this->id);
        $criteria->compare('user_id',$this->user_id);
        $criteria->compare('file',$this->file,true);
        $criteria->compare('mime',$this->mime,true);
        $criteria->compare('type',$this->type,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}