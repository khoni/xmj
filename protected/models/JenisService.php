<?php

/**
 * This is the model class for table "jenis_service".
 *
 * The followings are the available columns in table 'jenis_service':
 * @property string $jenis_serviceID
 * @property string $nama
 *
 * The followings are the available model relations:
 * @property Harga[] $hargas
 */
class JenisService extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jenis_service';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jenis_serviceID, nama', 'required'),
			array('jenis_serviceID, nama', 'length', 'max'=>50),
			
			array('nama, keterangan', 'filter','filter'=>'trim'),
			array('nama', 'filter','filter'=>'strtoupper'),
			
			array('file_gambar', 'file', 'types'=>'jpg, jpeg, gif, png, ico'),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('file_gambar, keterangan', 'safe'),

			array('jenis_serviceID, nama', 'safe', 'on'=>'search'),
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
			'jenis_serviceID' => 'Jenis Service ID',
			'nama' => 'Nama Service / Produk',
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

		$criteria->compare('jenis_serviceID',$this->jenis_serviceID,true);
		$criteria->compare('nama',$this->nama,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return JenisService the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
