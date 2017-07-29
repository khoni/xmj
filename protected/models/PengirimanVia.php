<?php

/**
 * This is the model class for table "pengiriman_via".
 *
 * The followings are the available columns in table 'pengiriman_via':
 * @property string $pengiriman_viaID
 * @property string $nama
 * @property integer $rp_rumus_pembagi
 * @property integer $updated_at
 * @property string $updated_by
 */
class PengirimanVia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pengiriman_via';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pengiriman_viaID, nama', 'required'),
			array('rp_rumus_pembagi, updated_at', 'numerical', 'integerOnly'=>true),
			array('pengiriman_viaID, nama, updated_by', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pengiriman_viaID, nama, rp_rumus_pembagi, updated_at, updated_by', 'safe', 'on'=>'search'),
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
			'pengiriman_viaID' => 'Pengiriman Via',
			'nama' => 'Nama',
			'rp_rumus_pembagi' => 'Rp Rumus Pembagi',
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

		$criteria->compare('pengiriman_viaID',$this->pengiriman_viaID,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('rp_rumus_pembagi',$this->rp_rumus_pembagi);
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
	 * @return PengirimanVia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
