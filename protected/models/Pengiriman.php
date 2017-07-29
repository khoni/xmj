<?php

/**
 * This is the model class for table "pengiriman".
 *
 * The followings are the available columns in table 'pengiriman':
 * @property string $pengirimanID
 * @property string $connoteID
 * @property string $origin_kantorID
 * @property string $destination_kantorID
 * @property string $pengiriman_viaID
 * @property string $jenis_serviceID
 * @property string $jenis_barangID
 * @property string $instruksi
 * @property string $deskripsi
 * @property integer $is_cash
 * @property integer $is_member
 * @property string $pengirim_no_identitas
 * @property string $pengirim_nama
 * @property string $pengirim_alamat
 * @property string $pengirim_telepon
 * @property string $penerima_nama
 * @property string $penerima_telepon
 * @property string $penerima_negaraID
 * @property string $penerima_propinsiID
 * @property string $penerima_kabupatenID
 * @property string $penerima_kecamatanID
 * @property string $penerima_kelurahanID
 * @property string $penerima_alamat
 * @property integer $updated_at
 * @property string $updated_by
 */
class Pengiriman extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $nama_kantor_pengirim, $nama_kantor_penerima, $nama_kantor_transit, $nomer_connote;
	public function tableName()
	{
		return 'pengiriman';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pengirimanID, origin_kantorID, destination_kantorID, connoteID, pengiriman_viaID, jenis_serviceID, jenis_barangID, is_cash', 'required'),
			array('is_cash, is_member', 'numerical', 'integerOnly'=>true),

			array('
				pengirimanID, origin_kantorID, destination_kantorID, connoteID, pengiriman_viaID, jenis_serviceID, jenis_barangID, is_cash',
				'required', 'on'=>'newPengirimanAdmin'
			),
			array(
				'nomer_connote, transit_kantorID, nama_kantor_penerima, nama_kantor_transit, nama_kantor_pengirim, destination_kantorID, origin_cabangID, origin_agensubID, origin_agenID, instruksi, deskripsi, pengirim_no_identitas, pengirim_nama, pengirim_alamat, pengirim_telepon, penerima_nama, penerima_telepon, penerima_alamat,
 				 penerima_negaraID,penerima_propinsiID,penerima_kabupatenID,penerima_kecamatanID,penerima_kelurahanID', 
				'safe','on'=>'newPengirimanAdmin'
			),
			
			array('
				pengirimanID, origin_kantorID, destination_kantorID, pengiriman_viaID, jenis_serviceID, jenis_barangID, is_cash', 
				'required', 'on'=>'updatePengirimanAdmin'
			),
			array(
				'transit_kantorID, nama_kantor_penerima, nama_kantor_transit, nama_kantor_pengirim, destination_kantorID, origin_cabangID, origin_agensubID, origin_agenID, instruksi, deskripsi, pengirim_no_identitas, pengirim_nama, pengirim_alamat, pengirim_telepon, penerima_nama, penerima_telepon, penerima_alamat,
				penerima_negaraID,penerima_propinsiID,penerima_kabupatenID,penerima_kecamatanID,penerima_kelurahanID', 
				'safe','on'=>'updatePengirimanAdmin'
			),
			
			array(
				'pengirimanID, connoteID, origin_kantorID, destination_kantorID, pengiriman_viaID, jenis_serviceID, jenis_barangID, instruksi, deskripsi, is_cash, is_member, pengirim_no_identitas, pengirim_nama, pengirim_alamat, pengirim_telepon, penerima_nama, penerima_telepon, penerima_kelurahanID, penerima_alamat,
				 nomer_connote', 
				'safe', 'on'=>'search'
			),
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
			'originKantor' => array(self::BELONGS_TO, "Kantor", 'origin_kantorID'),
			'destinationKantor' => array(self::BELONGS_TO, "Kantor", 'destination_kantorID'),
			'transitKantor' => array(self::BELONGS_TO, "Kantor", 'transit_kantorID'),
			'connote' => array(self::BELONGS_TO, "Connote", 'connoteID'),
			'pengirimanVia' => array(self::BELONGS_TO, "PengirimanVia", 'pengiriman_viaID'),
			'jenisService' => array(self::BELONGS_TO, "JenisService", 'jenis_serviceID'),
			'jenisBarang' => array(self::BELONGS_TO, "JenisBarang", 'jenis_barangID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pengirimanID' => 'PengirimanID',
			'connoteID' => 'ConnoteID',
			'origin_kantorID' => 'Origin',
			'destination_kantorID' => 'Destinasi',
			'transit_kantorID' => 'Transit',
			'pengiriman_viaID' => 'Via (Jenis Angkutan)',
			'jenis_serviceID' => 'Jenis Service',
			'jenis_barangID' => 'Jenis Barang',
			'instruksi' => 'Instruksi',
			'deskripsi' => 'Deskripsi',
			'is_cash' => 'Cara Pembayaran',
			'is_member' => 'Is Member',
			'pengirim_no_identitas' => 'No Identitas Pengirim ',
			'pengirim_nama' => 'Nama Pengirim ',
			'pengirim_alamat' => 'Alamat Pengirim ',
			'pengirim_telepon' => 'Telepon Pengirim ',
			'penerima_nama' => 'Nama Penerima ',
			'penerima_telepon' => 'Telepon Penerima ',
			'penerima_negaraID' => 'Negara Penerima ',
			'penerima_propinsiID' => 'Propinsi Penerima ',
			'penerima_kabupatenID' => 'Kabupaten Penerima ',
			'penerima_kecamatanID' => 'Kecamatan Penerima ',
			'penerima_kelurahanID' => 'Kelurahan Penerima ',
			'penerima_alamat' => 'Alamat Penerima',
			'updated_at' => 'Updated at',
			'updated_by' => 'Updated by',
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

		$criteria->compare('pengirimanID',$this->pengirimanID,true);
		$criteria->compare('connoteID',$this->connoteID,true);
		$criteria->compare('origin_kantorID',$this->origin_kantorID,true);
		$criteria->compare('destination_kantorID',$this->destination_kantorID,true);
		$criteria->compare('pengiriman_viaID',$this->pengiriman_viaID,true);
		$criteria->compare('jenis_serviceID',$this->jenis_serviceID,true);
		$criteria->compare('jenis_barangID',$this->jenis_barangID,true);
		$criteria->compare('instruksi',$this->instruksi,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('is_cash',$this->is_cash);
		$criteria->compare('is_member',$this->is_member);
		/*
		$criteria->compare('pengirim_no_identitas',$this->pengirim_no_identitas,true);
		$criteria->compare('pengirim_nama',$this->pengirim_nama,true);
		$criteria->compare('pengirim_alamat',$this->pengirim_alamat,true);
		$criteria->compare('pengirim_telepon',$this->pengirim_telepon,true);
		$criteria->compare('penerima_nama',$this->penerima_nama,true);
		$criteria->compare('penerima_telepon',$this->penerima_telepon,true);
		$criteria->compare('penerima_negaraID',$this->penerima_negaraID,true);
		$criteria->compare('penerima_propinsiID',$this->penerima_propinsiID,true);
		$criteria->compare('penerima_kabupatenID',$this->penerima_kabupatenID,true);
		$criteria->compare('penerima_kecamatanID',$this->penerima_kecamatanID,true);
		$criteria->compare('penerima_kelurahanID',$this->penerima_kelurahanID,true);
		$criteria->compare('penerima_alamat',$this->penerima_alamat,true);
		$criteria->compare('updated_at',$this->updated_at);
		$criteria->compare('updated_by',$this->updated_by,true);
		*/

		$criteria->join=" left join connote c on t.connoteID=c.connoteID ";
		$criteria->compare('c.nomer',$this->nomer_connote);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pengiriman the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function isCashList(){
		$tmp=array();
		$tmp[]=array('code'=>1,'carabayar'=>'Cash/Tunai');
		$tmp[]=array('code'=>2,'carabayar'=>'Transfer');
		return $tmp;
	}	
	public function cara_pembayaran($id){
		$list=$this->isCashList();
		foreach($list as $dt){
			if($dt['code']==$id){
				return $dt['carabayar'];
				break;
			}
		}
		return false;
	}
}
