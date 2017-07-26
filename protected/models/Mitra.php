<?php

/**
 * This is the model class for table "mitra".
 *
 * The followings are the available columns in table 'mitra':
 * @property string $mitraID
 * @property string $kantorID
 * @property string $nama
 * @property string $alamat
 * @property string $daerahID
 * @property string $telepon
 * @property string $hp
 * @property string $fax
 * @property string $npwp
 * @property string $ktp
 * @property string $passport
 * @property integer $is_aktif
 */
class Mitra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mitra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mitraID, kantorID, nama, alamat, daerahID, telepon, hp, fax, npwp, ktp, passport', 'required'),
			array('is_aktif', 'numerical', 'integerOnly'=>true),
			array('mitraID, kantorID, nama, alamat, daerahID, telepon, hp, fax, npwp, ktp, passport', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mitraID, kantorID, nama, alamat, daerahID, telepon, hp, fax, npwp, ktp, passport, is_aktif', 'safe', 'on'=>'search'),
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
			'mitraID' => 'Mitra',
			'kantorID' => 'Kantor',
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'daerahID' => 'Daerah',
			'telepon' => 'Telepon',
			'hp' => 'Hp',
			'fax' => 'Fax',
			'npwp' => 'Npwp',
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

		$criteria->compare('mitraID',$this->mitraID,true);
		$criteria->compare('kantorID',$this->kantorID,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('daerahID',$this->daerahID,true);
		$criteria->compare('telepon',$this->telepon,true);
		$criteria->compare('hp',$this->hp,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('npwp',$this->npwp,true);
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
	 * @return Mitra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
