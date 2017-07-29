<?php

/**
 * This is the model class for table "cabang".
 *
 * The followings are the available columns in table 'cabang':
 * @property string $cabangID
 * @property string $kantorID
 */
class Cabang extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $nama_kantor,$kode,$is_aktif, $nama;

 	public $agenID, $agen_subID;
	public $id_kantor_cabang,$id_kantor_agensub,$id_kantor_agen;
	public $nama_kantor_cabang,$nama_kantor_agensub,$nama_kantor_agen;
	public $kode_cabang,$kode_agensub,$kode_agen;
	public $awalan_connote_cabang,$awalan_connote_agensub,$awalan_connote_agen;
	
	public function tableName()
	{
		return 'cabang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cabangID, kantorID', 'required'),			
			array('cabangID, kantorID', 'length', 'max'=>50),
			array('cabangID, kantorID, nama, nama_kantor, kode', 'safe', 'on'=>'search'),
			array('nama_kantor_cabang, nama_kantor_agensub, nama_kantor_agen, kode_cabang, kode_agensub, kode_agen', 'safe', 'on'=>'korelasi_kantor'),
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
            'kantor' => array(self::BELONGS_TO, "Kantor", 'kantorID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cabangID' => 'CabangID',
			'kantorID' => 'KantorID',
			'nama_kantor' => 'Nama Kantor Cabang',
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

		$criteria->compare('cabangID',$this->cabangID);
		$criteria->compare('kantorID',$this->kantorID);
		
		$criteria->join.=" left join kantor k on t.kantorID=k.kantorID ";
		$criteria->join.=" left join user u on k.userID=u.userID ";
		
		$criteria->compare('k.kode',$this->kode,true);
		$criteria->compare('k.nama_kantor',$this->nama_kantor,true);
		$criteria->compare('u.nama',$this->nama,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cabang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function korelasi_kantor(){
		$criteria=new CDbCriteria;

		$criteria->compare('cabangID',$this->cabangID);		
		$criteria->join.=" 
			LEFT JOIN kantor k1 ON t.kantorID=k1.kantorID
			
			LEFT JOIN agen_sub ags ON ags.cabangID=t.cabangID
			LEFT JOIN kantor k2 ON ags.kantorID=k2.kantorID
			
			LEFT JOIN agen ag ON ags.agen_subID=ag.agen_subID
			LEFT JOIN kantor k3 ON ag.kantorID=k3.kantorID		
		";
		
		$criteria->select="
			t.cabangID,
			k1.kantorID as id_kantor_cabang,
			k1.nama_kantor as nama_kantor_cabang,
			k1.kode as kode_cabang,
			k1.awalan_connote as awalan_connote_cabang,
			
			ags.agen_subID,
			k2.kantorID as id_kantor_agensub,
			k2.nama_kantor as nama_kantor_agensub,
			k2.kode as kode_agensub,
			k2.awalan_connote as awalan_connote_agensub,
			
			ag.agenID,
			k3.kantorID as id_kantor_agen,
			k3.nama_kantor as nama_kantor_agen,
			k3.kode as kode_agen,
			k3.awalan_connote as awalan_connote_agen
		";
		
		$criteria->compare('t.cabangID',$this->nama_kantor_cabang,true,'AND');
		$criteria->compare('k1.kantorID',$this->nama_kantor_cabang,true,'OR');
		$criteria->compare('k1.nama_kantor',$this->nama_kantor_cabang,true,'OR');
		$criteria->compare('k1.kode',$this->nama_kantor_cabang,true,'OR');

		$criteria->compare('ags.agen_subID',$this->nama_kantor_agensub,true,'AND');
		$criteria->compare('k2.kantorID',$this->nama_kantor_agensub,true,'OR');
		$criteria->compare('k2.nama_kantor',$this->nama_kantor_agensub,true,'OR');
		$criteria->compare('k2.kode',$this->nama_kantor_agensub,true,'OR');

		$criteria->compare('ag.agenID',$this->nama_kantor_agen,true,'AND');
		$criteria->compare('k3.kantorID',$this->nama_kantor_agen,true,'OR');
		$criteria->compare('k3.nama_kantor',$this->nama_kantor_agen,true,'OR');
		$criteria->compare('k3.kode',$this->nama_kantor_agen,true,'OR');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pagesize' => 4,
			),
		));	
	}
}
