<?php

/**
 * This is the model class for table "manifest".
 *
 * The followings are the available columns in table 'manifest':
 * @property string $manifestID
 * @property string $packingID
 * @property string $to_kantorID
 * @property double $berat_manifest_kg
 */
class Manifest extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'manifest';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('manifestID, packingID, to_kantorID', 'required'),
			array('berat_manifest_kg', 'numerical'),
			array('manifestID, packingID, to_kantorID', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('manifestID, packingID, to_kantorID, berat_manifest_kg', 'safe', 'on'=>'search'),
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
			'manifestID' => 'Manifest',
			'packingID' => 'Packing',
			'to_kantorID' => 'To Kantor',
			'berat_manifest_kg' => 'Berat Manifest Kg',
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

		$criteria->compare('manifestID',$this->manifestID,true);
		$criteria->compare('packingID',$this->packingID,true);
		$criteria->compare('to_kantorID',$this->to_kantorID,true);
		$criteria->compare('berat_manifest_kg',$this->berat_manifest_kg);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Manifest the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
