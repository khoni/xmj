<?php

/**
 * This is the model class for table "bank".
 *
 * The followings are the available columns in table 'bank':
 * @property string $bankID
 * @property string $kantorID
 * @property string $no_rekening
 * @property string $atas_nama
 * @property string $nama_bank
 * @property string $alamat_bank
 * @property integer $status
 */
class Bank extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bank';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bankID, kantorID, no_rekening, atas_nama, nama_bank, alamat_bank', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('bankID, kantorID, no_rekening, atas_nama, nama_bank, alamat_bank', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('bankID, kantorID, no_rekening, atas_nama, nama_bank, alamat_bank, status', 'safe', 'on'=>'search'),
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
			'bankID' => 'Bank',
			'kantorID' => 'Kantor',
			'no_rekening' => 'No Rekening',
			'atas_nama' => 'Atas Nama',
			'nama_bank' => 'Nama Bank',
			'alamat_bank' => 'Alamat Bank',
			'status' => 'Status',
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

		$criteria->compare('bankID',$this->bankID,true);
		$criteria->compare('kantorID',$this->kantorID,true);
		$criteria->compare('no_rekening',$this->no_rekening,true);
		$criteria->compare('atas_nama',$this->atas_nama,true);
		$criteria->compare('nama_bank',$this->nama_bank,true);
		$criteria->compare('alamat_bank',$this->alamat_bank,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bank the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
