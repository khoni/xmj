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
 * @property integer $is_aktif
 * @property integer $updated_at
 * @property string $updated_by
 */
class Kantorx extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
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
			array('kantorID, userID, kode', 'required'),
			array('is_aktif, updated_at', 'numerical', 'integerOnly'=>true),
			array('discount', 'numerical'),
			array('kantorID, userID, kode, nama_kantor, updated_by', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('kantorID, userID, kode, discount, nama_kantor, is_aktif, updated_at, updated_by', 'safe', 'on'=>'search'),
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
			'kantorID' => 'Kantor',
			'userID' => 'User',
			'kode' => 'Kode',
			'discount' => 'Discount',
			'nama_kantor' => 'Nama Kantor',
			'is_aktif' => 'Is Aktif',
			'updated_at' => 'Updated At',
			'updated_by' => 'Updated By',
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

		$criteria->compare('kantorID',$this->kantorID,true);
		$criteria->compare('userID',$this->userID,true);
		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('discount',$this->discount);
		$criteria->compare('nama_kantor',$this->nama_kantor,true);
		$criteria->compare('is_aktif',$this->is_aktif);
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
	 * @return Kantorx the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
