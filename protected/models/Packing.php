<?php

/**
 * This is the model class for table "packing".
 *
 * The followings are the available columns in table 'packing':
 * @property string $packingID
 * @property string $transaksiID
 * @property string $to_kantorID
 * @property string $jenis_serviceID
 * @property string $berat_packing_kg
 */
class Packing extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'packing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('packingID, transaksiID, to_kantorID, jenis_serviceID, berat_packing_kg', 'required'),
			array('packingID, transaksiID, to_kantorID, jenis_serviceID, berat_packing_kg', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('packingID, transaksiID, to_kantorID, jenis_serviceID, berat_packing_kg', 'safe', 'on'=>'search'),
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
			'packingID' => 'Packing',
			'transaksiID' => 'Transaksi',
			'to_kantorID' => 'To Kantor',
			'jenis_serviceID' => 'Jenis Service',
			'berat_packing_kg' => 'Berat Packing Kg',
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

		$criteria->compare('packingID',$this->packingID,true);
		$criteria->compare('transaksiID',$this->transaksiID,true);
		$criteria->compare('to_kantorID',$this->to_kantorID,true);
		$criteria->compare('jenis_serviceID',$this->jenis_serviceID,true);
		$criteria->compare('berat_packing_kg',$this->berat_packing_kg,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Packing the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
