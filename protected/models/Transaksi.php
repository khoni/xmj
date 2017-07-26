<?php

/**
 * This is the model class for table "transaksi".
 *
 * The followings are the available columns in table 'transaksi':
 * @property string $transaksiID
 * @property string $connoteID
 * @property string $origin_cabangID
 * @property string $destination_daerahID
 * @property string $jenis_serviceID
 * @property string $instruksi
 * @property string $deskripsi
 * @property string $jenis_kirimanID
 * @property string $cara_pembayaranID
 * @property string $pengirim_nama
 * @property string $pengirim_alamat
 * @property string $pengirim_telepon
 * @property string $pengirim_fax
 * @property string $penerima_nama
 * @property string $penerima_alamat
 * @property string $penerima_daerahID
 * @property string $penerima_telepon
 * @property string $penerima_fax
 */
class Transaksi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transaksi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('transaksiID, connoteID, origin_cabangID, destination_daerahID, jenis_serviceID, cara_pembayaranID', 'required'),
			array('transaksiID, connoteID, origin_cabangID, destination_daerahID, jenis_serviceID, instruksi, deskripsi, jenis_kirimanID, cara_pembayaranID, pengirim_nama, pengirim_alamat, pengirim_telepon, pengirim_fax, penerima_nama, penerima_alamat, penerima_daerahID, penerima_telepon, penerima_fax', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('transaksiID, connoteID, origin_cabangID, destination_daerahID, jenis_serviceID, instruksi, deskripsi, jenis_kirimanID, cara_pembayaranID, pengirim_nama, pengirim_alamat, pengirim_telepon, pengirim_fax, penerima_nama, penerima_alamat, penerima_daerahID, penerima_telepon, penerima_fax', 'safe', 'on'=>'search'),
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
			'transaksiID' => 'Transaksi',
			'connoteID' => 'Connote',
			'origin_cabangID' => 'Origin Cabang',
			'destination_daerahID' => 'Destination Daerah',
			'jenis_serviceID' => 'Jenis Service',
			'instruksi' => 'Instruksi',
			'deskripsi' => 'Deskripsi',
			'jenis_kirimanID' => 'Jenis Kiriman',
			'cara_pembayaranID' => 'Cara Pembayaran',
			'pengirim_nama' => 'Pengirim Nama',
			'pengirim_alamat' => 'Pengirim Alamat',
			'pengirim_telepon' => 'Pengirim Telepon',
			'pengirim_fax' => 'Pengirim Fax',
			'penerima_nama' => 'Penerima Nama',
			'penerima_alamat' => 'Penerima Alamat',
			'penerima_daerahID' => 'Penerima Daerah',
			'penerima_telepon' => 'Penerima Telepon',
			'penerima_fax' => 'Penerima Fax',
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

		$criteria->compare('transaksiID',$this->transaksiID,true);
		$criteria->compare('connoteID',$this->connoteID,true);
		$criteria->compare('origin_cabangID',$this->origin_cabangID,true);
		$criteria->compare('destination_daerahID',$this->destination_daerahID,true);
		$criteria->compare('jenis_serviceID',$this->jenis_serviceID,true);
		$criteria->compare('instruksi',$this->instruksi,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('jenis_kirimanID',$this->jenis_kirimanID,true);
		$criteria->compare('cara_pembayaranID',$this->cara_pembayaranID,true);
		$criteria->compare('pengirim_nama',$this->pengirim_nama,true);
		$criteria->compare('pengirim_alamat',$this->pengirim_alamat,true);
		$criteria->compare('pengirim_telepon',$this->pengirim_telepon,true);
		$criteria->compare('pengirim_fax',$this->pengirim_fax,true);
		$criteria->compare('penerima_nama',$this->penerima_nama,true);
		$criteria->compare('penerima_alamat',$this->penerima_alamat,true);
		$criteria->compare('penerima_daerahID',$this->penerima_daerahID,true);
		$criteria->compare('penerima_telepon',$this->penerima_telepon,true);
		$criteria->compare('penerima_fax',$this->penerima_fax,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transaksi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
