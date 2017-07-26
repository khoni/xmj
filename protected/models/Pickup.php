<?php

/**
 * This is the model class for table "pickup".
 *
 * The followings are the available columns in table 'pickup':
 * @property string $pickupID
 * @property string $no_order
 * @property integer $jumlah_koli
 * @property string $korporasiID
 * @property string $penanggung_jawab
 * @property string $kurirID
 */
class Pickup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pickup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pickupID, no_order, korporasiID, penanggung_jawab, kurirID', 'required'),
			array('jumlah_koli', 'numerical', 'integerOnly'=>true),
			array('pickupID, no_order, korporasiID, penanggung_jawab, kurirID', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pickupID, no_order, jumlah_koli, korporasiID, penanggung_jawab, kurirID', 'safe', 'on'=>'search'),
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
			'pickupID' => 'Pickup',
			'no_order' => 'No Order',
			'jumlah_koli' => 'Jumlah Koli',
			'korporasiID' => 'Korporasi',
			'penanggung_jawab' => 'Penanggung Jawab',
			'kurirID' => 'Kurir',
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

		$criteria->compare('pickupID',$this->pickupID,true);
		$criteria->compare('no_order',$this->no_order,true);
		$criteria->compare('jumlah_koli',$this->jumlah_koli);
		$criteria->compare('korporasiID',$this->korporasiID,true);
		$criteria->compare('penanggung_jawab',$this->penanggung_jawab,true);
		$criteria->compare('kurirID',$this->kurirID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pickup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
