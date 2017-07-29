<?php

/**
 * This is the model class for table "connote".
 *
 * The followings are the available columns in table 'connote':
 * @property string $connoteID
 * @property string $kantorID
 * @property string $nomer
 * @property integer $connote_statusID
 * @property integer $updated_at
 * @property string $updated_by
 */
class Connote extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $total, $terpakai, $nama_kantor;
	
	public function tableName()
	{
		return 'connote';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('connoteID, kantorID, nomer', 'required'),
			array('connote_statusID, updated_at', 'numerical', 'integerOnly'=>true),
			array('connoteID, kantorID, updated_by', 'length', 'max'=>50),
			array('nomer', 'length', 'max'=>13),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('connoteID, kantorID, nama_kantor, nomer, connote_statusID, updated_at, updated_by', 'safe', 'on'=>'search'),
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
			'connoteStatus' => array(self::BELONGS_TO, "ConnoteStatus", 'connote_statusID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'connoteID' => 'Connote ID',
			'kantorID' => 'Kantor',
			'nomer' => 'Nomer',
			'connote_statusID' => 'connote_statusID',
			'total' => 'Total Connote',
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
	public function search(){
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('connoteID',$this->connoteID);
		$criteria->compare('kantorID',$this->kantorID);
		$criteria->compare('nomer',$this->nomer);
		$criteria->compare('connote_statusID',$this->connote_statusID);
				
		$criteria->join=" left join kantor k on t.kantorID=k.kantorID ";
		$criteria->compare('nama_kantor',$this->nama_kantor);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Connote the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function connote_cabang(){
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->select=" t.kantorID,COUNT(*) AS total,COUNT(CASE WHEN `connote_statusID`=1 THEN `connote_statusID` END) AS terpakai ";
		$criteria->group=" kantorID asc";		
		$criteria->order="kantorID asc, nomer asc";
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}
