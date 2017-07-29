<?php

/**
 * This is the model class for table "deposit".
 *
 * The followings are the available columns in table 'deposit':
 * @property string $depositID
 * @property string $kantorID
 * @property string $tanggal_transfer
 * @property integer $is_transfer
 * @property string $nama_bank_asal
 * @property string $norek_bank_asal
 * @property string $nama_bank_tujuan
 * @property string $norek_bank_tujuan
 * @property string $rp_jumlah
 * @property integer $verified_flag
 * @property string $verified_time
 * @property string $verified_userID
 * @property integer $updated_at
 * @property string $updated_by
 */
class Deposit extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'deposit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('depositID, kantorID, tanggal_transfer, is_transfer, nama_bank_asal, nama_bank_tujuan, norek_bank_tujuan, rp_jumlah', 'required'),
			array('is_transfer, verified_flag, updated_at', 'numerical', 'integerOnly'=>true),
			array('depositID, kantorID, nama_bank_asal, norek_bank_asal, nama_bank_tujuan, norek_bank_tujuan, verified_userID, updated_by', 'length', 'max'=>50),
			array('rp_jumlah', 'length', 'max'=>20),
			array('verified_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('depositID, kantorID, tanggal_transfer, is_transfer, nama_bank_asal, norek_bank_asal, nama_bank_tujuan, norek_bank_tujuan, rp_jumlah, verified_flag, verified_time, verified_userID, updated_at, updated_by', 'safe', 'on'=>'search'),
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
			'depositID' => 'Deposit',
			'kantorID' => 'Kantor',
			'tanggal_transfer' => 'Tanggal Transfer',
			'is_transfer' => 'Is Transfer',
			'nama_bank_asal' => 'Nama Bank Asal',
			'norek_bank_asal' => 'Norek Bank Asal',
			'nama_bank_tujuan' => 'Nama Bank Tujuan',
			'norek_bank_tujuan' => 'Norek Bank Tujuan',
			'rp_jumlah' => 'Rp Jumlah',
			'verified_flag' => 'Verified Flag',
			'verified_time' => 'Verified Time',
			'verified_userID' => 'Verified User',
			'updated_at' => 'Updated At',
			'updated_by' => 'Updated By',
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

		$criteria->compare('depositID',$this->depositID,true);
		$criteria->compare('kantorID',$this->kantorID,true);
		$criteria->compare('tanggal_transfer',$this->tanggal_transfer,true);
		$criteria->compare('is_transfer',$this->is_transfer);
		$criteria->compare('nama_bank_asal',$this->nama_bank_asal,true);
		$criteria->compare('norek_bank_asal',$this->norek_bank_asal,true);
		$criteria->compare('nama_bank_tujuan',$this->nama_bank_tujuan,true);
		$criteria->compare('norek_bank_tujuan',$this->norek_bank_tujuan,true);
		$criteria->compare('rp_jumlah',$this->rp_jumlah,true);
		$criteria->compare('verified_flag',$this->verified_flag);
		$criteria->compare('verified_time',$this->verified_time,true);
		$criteria->compare('verified_userID',$this->verified_userID,true);
		$criteria->compare('updated_at',$this->updated_at);
		$criteria->compare('updated_by',$this->updated_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Deposit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
