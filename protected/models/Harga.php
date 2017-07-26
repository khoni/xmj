<?php

/**
 * This is the model class for table "harga".
 *
 * The followings are the available columns in table 'harga':
 * @property string $hargaID
 * @property string $negaraID
 * @property string $propinsiID
 * @property string $kabupatenID
 * @property string $kecamatanID
 * @property string $kelurahanID
 * @property string $origin_kantorID
 * @property string $destinasi_kantorID
 * @property string $jenis_serviceID
 * @property integer $hari_estimasi
 * @property string $rp_transit_kgp
 * @property string $rp_transit_kgs
 * @property string $rp_transit_lainnya
 * @property string $rp_bp_kgp
 * @property string $rp_bp_kgs
 * @property string $rp_delivery
 * @property integer $updated_at
 * @property string $updated_by
 */
class Harga extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $nama_daerah;
	
	public function tableName()
	{
		return 'harga';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hargaID', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rp_transit_kgp, rp_transit_kgs, rp_transit_lainnya, rp_bp_kgp, rp_bp_kgs, rp_delivery, updated_at, updated_by', 'safe'),
			array('hargaID, negaraID, propinsiID, kabupatenID, kecamatanID, kelurahanID, origin_kantorID, destinasi_kantorID, jenis_serviceID, hari_estimasi, rp_transit_kgp, rp_transit_kgs, rp_transit_lainnya, rp_bp_kgp, rp_bp_kgs, rp_delivery, updated_at, updated_by', 'safe', 'on'=>'search'),
			array('hargaID, negaraID, propinsiID, kabupatenID, kecamatanID, kelurahanID, origin_kantorID, destinasi_kantorID, jenis_serviceID, hari_estimasi', 'required', 'on'=>'admin'),
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
            'negara' => array(self::BELONGS_TO, "Negara", 'negaraID'),
            'propinsi' => array(self::BELONGS_TO, "Propinsi", 'propinsiID'),
            'kabupaten' => array(self::BELONGS_TO, "Kabupaten", 'kabupatenID'),
            'kecamatan' => array(self::BELONGS_TO, "Kecamatan", 'kecamatanID'),
            'kelurahan' => array(self::BELONGS_TO, "Kelurahan", 'kelurahanID'),
            'originKantor' => array(self::BELONGS_TO, "Kantor", 'origin_kantorID'),
            'destinasiKantor' => array(self::BELONGS_TO, "Kantor", 'destinasi_kantorID'),
            'jenisService' => array(self::BELONGS_TO, "JenisService", 'jenis_serviceID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'hargaID' => 'HargaID',
			'negaraID' => 'NegaraID',
			'propinsiID' => 'PropinsiID',
			'kabupatenID' => 'KabupatenID',
			'kecamatanID' => 'KecamatanID',
			'kelurahanID' => 'KelurahanID',
			'origin_kantorID' => 'Origin ',
			'destinasi_kantorID' => 'Destinasi',
			'jenis_serviceID' => 'Jenis Service',
			'hari_estimasi' => 'Estimasi',
			'rp_transit_kgp' => 'Rp Transit kgp',
			'rp_transit_kgs' => 'Rp Transit kgs',
			'rp_transit_lainnya' => 'Rp Transit Lain2',
			'rp_bp_kgp' => 'Rp BP kgp',
			'rp_bp_kgs' => 'Rp BP kgs',
			'rp_delivery' => 'Rp Delivery',
			'updated_at' => 'Updated at',
			'updated_by' => 'Updated by',
			'nama_daerah' => 'Nama Daerah',
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

		$criteria->compare('hargaID',$this->hargaID,true);
		$criteria->compare('negaraID',$this->negaraID,true);
		$criteria->compare('propinsiID',$this->propinsiID,true);
		$criteria->compare('kabupatenID',$this->kabupatenID,true);
		$criteria->compare('kecamatanID',$this->kecamatanID,true);
		$criteria->compare('kelurahanID',$this->kelurahanID,true);
		$criteria->compare('origin_kantorID',$this->origin_kantorID,true);
		$criteria->compare('destinasi_kantorID',$this->destinasi_kantorID,true);
		$criteria->compare('jenis_serviceID',$this->jenis_serviceID,true);
		$criteria->compare('hari_estimasi',$this->hari_estimasi);
		$criteria->compare('rp_transit_kgp',$this->rp_transit_kgp,true);
		$criteria->compare('rp_transit_kgs',$this->rp_transit_kgs,true);
		$criteria->compare('rp_transit_lainnya',$this->rp_transit_lainnya,true);
		$criteria->compare('rp_bp_kgp',$this->rp_bp_kgp,true);
		$criteria->compare('rp_bp_kgs',$this->rp_bp_kgs,true);
		$criteria->compare('rp_delivery',$this->rp_delivery,true);
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
	 * @return Harga the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
