<?php

/**
 * This is the model class for table "pengiriman_detail".
 *
 * The followings are the available columns in table 'pengiriman_detail':
 * @property string $pengiriman_detailID
 * @property string $pengirimanID
 * @property double $berat_aktual_kg
 * @property double $berat_volume_kg
 * @property integer $koli
 * @property double $panjang_cm
 * @property double $lebar_cm
 * @property double $tinggi_cm
 * @property string $nilai_barang
 * @property string $rp_asuransi
 * @property string $rp_biaya_kirim
 * @property string $rp_admin
 * @property string $rp_packing
 * @property string $rp_handling
 * @property string $rp_diskon
 * @property integer $updated_at
 * @property string $updated_by
 */
class PengirimanDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pengiriman_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pengiriman_detailID, pengirimanID', 'required'),
			array('koli, updated_at', 'numerical', 'integerOnly'=>true),
			array('berat_aktual_kg, berat_volume_kg, panjang_cm, lebar_cm, tinggi_cm', 'numerical'),
			array('pengiriman_detailID, pengirimanID, updated_by', 'length', 'max'=>50),
			array('nilai_barang, rp_asuransi, rp_biaya_kirim, rp_admin, rp_packing, rp_handling, rp_diskon', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pengiriman_detailID, pengirimanID, berat_aktual_kg, berat_volume_kg, koli, panjang_cm, lebar_cm, tinggi_cm, nilai_barang, rp_asuransi, rp_biaya_kirim, rp_admin, rp_packing, rp_handling, rp_diskon, updated_at, updated_by', 'safe', 'on'=>'search'),
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
			'pengiriman_detailID' => 'Pengiriman Detail',
			'pengirimanID' => 'Pengiriman',
			'berat_aktual_kg' => 'Berat Aktual Kg',
			'berat_volume_kg' => 'Berat Volume Kg',
			'koli' => 'Koli',
			'panjang_cm' => 'Panjang Cm',
			'lebar_cm' => 'Lebar Cm',
			'tinggi_cm' => 'Tinggi Cm',
			'nilai_barang' => 'Nilai Barang',
			'rp_asuransi' => 'Rp Asuransi',
			'rp_biaya_kirim' => 'Rp Biaya Kirim',
			'rp_admin' => 'Rp Admin',
			'rp_packing' => 'Rp Packing',
			'rp_handling' => 'Rp Handling',
			'rp_diskon' => 'Rp Diskon',
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

		$criteria->compare('pengiriman_detailID',$this->pengiriman_detailID,true);
		$criteria->compare('pengirimanID',$this->pengirimanID,true);
		$criteria->compare('berat_aktual_kg',$this->berat_aktual_kg);
		$criteria->compare('berat_volume_kg',$this->berat_volume_kg);
		$criteria->compare('koli',$this->koli);
		$criteria->compare('panjang_cm',$this->panjang_cm);
		$criteria->compare('lebar_cm',$this->lebar_cm);
		$criteria->compare('tinggi_cm',$this->tinggi_cm);
		$criteria->compare('nilai_barang',$this->nilai_barang,true);
		$criteria->compare('rp_asuransi',$this->rp_asuransi,true);
		$criteria->compare('rp_biaya_kirim',$this->rp_biaya_kirim,true);
		$criteria->compare('rp_admin',$this->rp_admin,true);
		$criteria->compare('rp_packing',$this->rp_packing,true);
		$criteria->compare('rp_handling',$this->rp_handling,true);
		$criteria->compare('rp_diskon',$this->rp_diskon,true);
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
	 * @return PengirimanDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
