<?php

/**
 * This is the model class for table "pre_alert".
 *
 * The followings are the available columns in table 'pre_alert':
 * @property string $pre_alertID
 * @property string $manifestID
 * @property string $no_resi_moda
 * @property string $no_angkutan
 * @property string $moda_angkutanID
 * @property string $nama_angkutan
 * @property string $jenis_angkutanID
 * @property string $to_kantorID
 * @property string $berat_pre_alert_kg
 */
class PreAlert extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pre_alert';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pre_alertID, manifestID, no_resi_moda, no_angkutan, moda_angkutanID, nama_angkutan, jenis_angkutanID, to_kantorID, berat_pre_alert_kg', 'required'),
			array('pre_alertID, manifestID, no_resi_moda, no_angkutan, moda_angkutanID, nama_angkutan, jenis_angkutanID, to_kantorID, berat_pre_alert_kg', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pre_alertID, manifestID, no_resi_moda, no_angkutan, moda_angkutanID, nama_angkutan, jenis_angkutanID, to_kantorID, berat_pre_alert_kg', 'safe', 'on'=>'search'),
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
			'pre_alertID' => 'Pre Alert',
			'manifestID' => 'Manifest',
			'no_resi_moda' => 'No Resi Moda',
			'no_angkutan' => 'No Angkutan',
			'moda_angkutanID' => 'Moda Angkutan',
			'nama_angkutan' => 'Nama Angkutan',
			'jenis_angkutanID' => 'Jenis Angkutan',
			'to_kantorID' => 'To Kantor',
			'berat_pre_alert_kg' => 'Berat Pre Alert Kg',
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

		$criteria->compare('pre_alertID',$this->pre_alertID,true);
		$criteria->compare('manifestID',$this->manifestID,true);
		$criteria->compare('no_resi_moda',$this->no_resi_moda,true);
		$criteria->compare('no_angkutan',$this->no_angkutan,true);
		$criteria->compare('moda_angkutanID',$this->moda_angkutanID,true);
		$criteria->compare('nama_angkutan',$this->nama_angkutan,true);
		$criteria->compare('jenis_angkutanID',$this->jenis_angkutanID,true);
		$criteria->compare('to_kantorID',$this->to_kantorID,true);
		$criteria->compare('berat_pre_alert_kg',$this->berat_pre_alert_kg,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PreAlert the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
