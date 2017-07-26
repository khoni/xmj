<?php

/**
 * This is the model class for table "biaya_pusat".
 *
 * The followings are the available columns in table 'biaya_pusat':
 * @property string $biaya_pusatID
 * @property integer $rp_perawatan_sistem
 * @property integer $persen_ppn
 * @property integer $persen_royalti
 * @property integer $persen_standart_diskon
 * @property integer $rp_standart_delivery
 * @property integer $updated_at
 * @property string $updated_by
 */
class BiayaPusat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'biaya_pusat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('biaya_pusatID', 'required'),
			array('rp_perawatan_sistem, persen_ppn, persen_royalti, persen_standart_diskon, rp_standart_delivery, updated_at', 'numerical', 'integerOnly'=>true),
			array('biaya_pusatID, updated_by', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('biaya_pusatID, rp_perawatan_sistem, persen_ppn, persen_royalti, persen_standart_diskon, rp_standart_delivery, updated_at, updated_by', 'safe', 'on'=>'search'),
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
			'biaya_pusatID' => 'Biaya Pusat ID',
			'rp_perawatan_sistem' => 'Perawatan Sistem (Rp.)',
			'persen_ppn' => 'PPn (%)',
			'persen_royalti' => 'Royalti (%)',
			'persen_standart_diskon' => 'Standart Diskon (%)',
			'rp_standart_delivery' => 'Standart Delivery (Rp.)',
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

		$criteria->compare('biaya_pusatID',$this->biaya_pusatID,true);
		$criteria->compare('rp_perawatan_sistem',$this->rp_perawatan_sistem);
		$criteria->compare('persen_ppn',$this->persen_ppn);
		$criteria->compare('persen_royalti',$this->persen_royalti);
		$criteria->compare('persen_standart_diskon',$this->persen_standart_diskon);
		$criteria->compare('rp_standart_delivery',$this->rp_standart_delivery);
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
	 * @return BiayaPusat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
