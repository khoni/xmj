<?php

/**
 * This is the model class for table "pelanggan".
 *
 * The followings are the available columns in table 'pelanggan':
 * @property string $pelangganID
 * @property string $userID
 * @property string $nama
 * @property string $alamat
 * @property string $daerahID
 * @property string $telepon
 * @property string $hp
 * @property string $ktp
 * @property string $passport
 * @property integer $is_aktif
 */
class Pelanggan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pelanggan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pelangganID, userID, nama, alamat, daerahID', 'required'),
			array('is_aktif', 'numerical', 'integerOnly'=>true),
			array('pelangganID, userID, nama, alamat, daerahID', 'length', 'max'=>50),
			array('telepon, hp, ktp, passport', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pelangganID, userID, nama, alamat, daerahID, telepon, hp, ktp, passport, is_aktif', 'safe', 'on'=>'search'),
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
			'pelangganID' => 'Pelanggan',
			'userID' => 'User',
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'daerahID' => 'Daerah',
			'telepon' => 'Telepon',
			'hp' => 'Hp',
			'ktp' => 'Ktp',
			'passport' => 'Passport',
			'is_aktif' => 'Is Aktif',
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

		$criteria->compare('pelangganID',$this->pelangganID,true);
		$criteria->compare('userID',$this->userID,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('daerahID',$this->daerahID,true);
		$criteria->compare('telepon',$this->telepon,true);
		$criteria->compare('hp',$this->hp,true);
		$criteria->compare('ktp',$this->ktp,true);
		$criteria->compare('passport',$this->passport,true);
		$criteria->compare('is_aktif',$this->is_aktif);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pelanggan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
