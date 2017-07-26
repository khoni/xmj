<?php

/**
 * This is the model class for table "kantor".
 *
 * The followings are the available columns in table 'kantor':
 * @property string $kantorID
 * @property string $userID
 * @property string $kode
 * @property double $discount
 * @property string $nama_kantor
 * @property string $alamat
 * @property string $daerahID
 * @property string $telepon
 * @property string $hp
 * @property string $fax
 * @property string $npwp
 * @property string $ktp
 * @property string $passport
 * @property integer $is_aktif
 *
 * The followings are the available model relations:
 * @property Deposit[] $deposits
 * @property Harga[] $hargas
 * @property Harga[] $hargas1
 * @property Saldo[] $saldos
 */
class Kantor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $nama, $cabangID, $agen_subID, $agenID;
	
	public function tableName()
	{
		return 'kantor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kantorID, userID', 'required'),

			array('kode, nama_kantor, alamat','filter', 'filter'=>'trim'),
			array('kode,nama_kantor','filter','filter'=>'strtoupper'),

			array('kode, nama_kantor, kantorID, userID, alamat_negaraID, alamat_propinsiID, alamat_kabupatenID, alamat_jalan', 'required', 'on' => 'newKantorCabang'),
			array('kode, nama_kantor, kantorID, cabangID, userID, alamat_negaraID, alamat_propinsiID, alamat_kabupatenID, alamat_jalan', 'required', 'on' => 'newKantorSubAgen'),
			array('kode, nama_kantor, kantorID, agen_subID, userID, alamat_negaraID, alamat_propinsiID, alamat_kabupatenID, alamat_jalan', 'required', 'on' => 'newKantorAgen'),
			
			//array('is_aktif', 'numerical', 'integerOnly'=>true),
			//array('discount', 'numerical'),
			//array('kantorID, userID, kode, nama_kantor, alamat, daerahID', 'length', 'max'=>50),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('kode, nama, alamat, alamat_kecamatanID, alamat_kelurahanID', 'safe'),
			array('kantorID, userID, kode, nama_kantor, kantorID, userID, alamat_negaraID, alamat_propinsiID, alamat_kabupatenID, alamat_jalan, discount, nama_kantor, is_aktif', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, "User", 'userID'),
            'negara' => array(self::BELONGS_TO, "Negara", 'alamat_negaraID'),
            'propinsi' => array(self::BELONGS_TO, "Propinsi", 'alamat_propinsiID'),
            'kabupaten' => array(self::BELONGS_TO, "Kabupaten", 'alamat_kabupatenID'),
            'kecamatan' => array(self::BELONGS_TO, "Kecamatan", 'alamat_kecamatanID'),
            'kelurahan' => array(self::BELONGS_TO, "Kelurahan", 'alamat_kelurahanID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kantorID' => 'Kantor ID',
			'userID' => 'User ID',
			'kode' => 'Kode',
			'discount' => 'Discount',
			'alamat_kelurahanID' => 'Kelurahan',
			'alamat_kecamatanID' => 'Kecamatan',
			'alamat_kabupatenID' => 'Kota / Kabupaten',
			'alamat_propinsiID' => 'Propinsi',
			'alamat_negaraID' => 'Negara',
			'cabangID' => 'Cabang ID',
			'agen_subID' => 'Sub Agen ID',
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

		$criteria->compare('kantorID',$this->kantorID);
		$criteria->compare('userID',$this->userID);
		$criteria->compare('kode',$this->kode);
		$criteria->compare('discount',$this->discount);
		$criteria->compare('nama_kantor',$this->nama_kantor,true);
		
		$criteria->join .= " left join user u on t.userID=u.userID ";
		$criteria->compare('u.nama',$this->nama,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kantor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getFullnama(){
		return $this->nama_kantor.' ['. $this->kode.']';
	}

	public function searchCabang()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('kantorID',$this->kantorID,true);
		$criteria->compare('userID',$this->userID,true);
		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('discount',$this->discount);
		$criteria->compare('nama_kantor',$this->nama_kantor,true);
		$criteria->compare('alamat',$this->alamat,true);
		
		$criteria->join=" right join cabang c on t.kantorID=c.kantorID ";
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}
