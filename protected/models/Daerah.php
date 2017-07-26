<?php

/**
 * This is the model class for table "daerah".
 *
 * The followings are the available columns in table 'daerah':
 * @property string $daerahID
 * @property integer $kodepos
 * @property string $kelurahanID
 * @property string $kecamatanID
 * @property string $kabupatenID
 * @property string $propinsiID
 *
 * The followings are the available model relations:
 * @property Harga[] $hargas
 */
class Daerah extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $nama_daerah;
	
	public function tableName()
	{
		return 'daerah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('daerahID, kelurahanID, kecamatanID, kabupatenID, propinsiID', 'required'),
			array('kodepos', 'numerical', 'integerOnly'=>true),
			array('daerahID, kelurahanID, kecamatanID, kabupatenID, propinsiID', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('daerahID, kodepos, kelurahanID, kecamatanID, kabupatenID, propinsiID', 'safe', 'on'=>'search'),
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
			'hargas' => array(self::HAS_MANY, 'Harga', 'daerahID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'daerahID' => 'Daerah',
			'kodepos' => 'Kodepos',
			'kelurahanID' => 'Kelurahan',
			'kecamatanID' => 'Kecamatan',
			'kabupatenID' => 'Kabupaten',
			'propinsiID' => 'Propinsi',
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

		$criteria->compare('daerahID',$this->daerahID,true);
		$criteria->compare('kodepos',$this->kodepos);
		$criteria->compare('kelurahanID',$this->kelurahanID,true);
		$criteria->compare('kecamatanID',$this->kecamatanID,true);
		$criteria->compare('kabupatenID',$this->kabupatenID,true);
		$criteria->compare('propinsiID',$this->propinsiID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Daerah the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
