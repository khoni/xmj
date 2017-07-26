<?php

/**
 * This is the model class for table "propinsi".
 *
 * The followings are the available columns in table 'propinsi':
 * @property string $propinsiID
 * @property string $nama
 */
class Propinsi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $nama_negara;

	public function tableName()
	{
		return 'propinsi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('propinsiID, nama', 'required'),
			array('propinsiID, nama', 'length', 'max'=>50),
			array('nama','filter', 'filter'=>'trim'),
			array('nama','filter','filter'=>'strtoupper'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('propinsiID, nama, nama_negara', 'safe', 'on'=>'search'),
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
            'negara' => array(self::BELONGS_TO, "Negara", 'negaraID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'propinsiID' => 'Propinsi ID',
			'negaraID' => 'Negara ID',
			'nama' => 'Nama Propinsi',
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

		$criteria->compare('t.propinsiID',$this->propinsiID,true);
		$criteria->compare('t.nama',$this->nama,true);
		
		$criteria->join=" left join negara n on t.negaraID=n.negaraID ";
		$criteria->compare('n.nama',$this->nama_negara,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Propinsi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
