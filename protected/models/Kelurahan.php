<?php

/**
 * This is the model class for table "kelurahan".
 *
 * The followings are the available columns in table 'kelurahan':
 * @property string $kelurahanID
 * @property string $nama
 */
class Kelurahan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $negaraID, $propinsiID, $kabupatenID, $kecamatanID, $nama_negara, $nama_propinsi, $nama_kabupaten, $nama_kecamatan;

	public function tableName()
	{
		return 'kelurahan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kelurahanID, nama', 'required'),
			array('nama','filter', 'filter'=>'trim'),
			array('nama','filter','filter'=>'strtoupper'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('kelurahanID, nama', 'safe', 'on'=>'search'),
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
			'kecamatan' => array(self::BELONGS_TO, "Kecamatan", 'kecamatanID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'negaraID' => 'Negara',
			'propinsiID' => 'Propinsi',
			'kabupatenID' => 'Kabupaten',
			'kecamatanID' => 'Kecamatan',
			'kelurahanID' => 'KelurahanID',
			'nama' => 'Nama Kelurahan',
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

		$criteria->compare('t.kelurahanID',$this->kelurahanID,true);
		$criteria->compare('t.nama',$this->nama,true);

		$criteria->join=" 
			left join kecamatan kec on t.kecamatanID=kec.kecamatanID
			left join kabupaten kab on kec.kabupatenID=kab.kabupatenID
			left join propinsi p on kab.propinsiID=p.propinsiID
			left join negara n on p.negaraID=n.negaraID 
		";
		$criteria->compare('n.nama',$this->nama_negara,true);
		$criteria->compare('p.nama',$this->nama_propinsi,true);
		$criteria->compare('kab.nama',$this->nama_kabupaten,true);
		$criteria->compare('kec.nama',$this->nama_kecamatan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kelurahan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
