<?php

/**
 * This is the model class for table "file_valid".
 *
 * The followings are the available columns in table 'customers_files':
 * @property string $file
 */
class FileValid extends CActiveRecord
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
        	array('file', 'file','mimeTypes'=>'image/jpg, image/png, image/jpeg, application/pdf', 'maxSize'=>1024 * 1024 * 2),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('file', 'safe', 'on'=>'search'),
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
            'file' => 'File',
        );
    }

}