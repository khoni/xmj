<?php

/**
 * This is the model class for table "kecamatan".
 *
 * The followings are the available columns in table 'kecamatan':
 * @property string $kecamatanID
 * @property string $nama
 */
class Kecamatan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $negaraID, $propinsiID, $kabupatenID, $nama_negara, $nama_propinsi, $nama_kabupaten;

	public function tableName()
	{
		return 'kecamatan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kecamatanID, nama', 'required'),
			array('nama','filter', 'filter'=>'trim'),
			array('nama','filter','filter'=>'strtoupper'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('kecamatanID, nama, nama_negara, nama_propinsi, nama_kabupaten', 'safe', 'on'=>'search'),
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
			'kabupaten' => array(self::BELONGS_TO, "Kabupaten", 'kabupatenID'),
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
			'kecamatanID' => 'KecamatanID',
			'nama' => 'Nama Kecamatan',
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

		$criteria->compare('t.kecamatanID',$this->kecamatanID,true);
		$criteria->compare('t.nama',$this->nama,true);

		$criteria->join=" 
			left join kabupaten kab on t.kabupatenID=kab.kabupatenID
			left join propinsi p on kab.propinsiID=p.propinsiID
			left join negara n on p.negaraID=n.negaraID 
		";
		$criteria->compare('n.nama',$this->nama_negara,true);
		$criteria->compare('p.nama',$this->nama_propinsi,true);
		$criteria->compare('kab.nama',$this->nama_kabupaten,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kecamatan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
