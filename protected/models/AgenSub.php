<?php

/**
 * This is the model class for table "agen_sub".
 *
 * The followings are the available columns in table 'agen_sub':
 * @property string $agen_subID
 * @property string $kantorID
 * @property string $cabangID
 */
class AgenSub extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $nama_kantor,$kode,$is_aktif, $nama;

	public function tableName()
	{
		return 'agen_sub';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('agen_subID, kantorID, cabangID', 'required'),
			array('agen_subID, kantorID, cabangID', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('agen_subID, kantorID, cabangID, kode, nama_kantor', 'safe', 'on'=>'search'),
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
            'cabang' => array(self::BELONGS_TO, "Cabang", 'cabangID'),
            'user' => array(self::BELONGS_TO, "User", 'userID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'agen_subID' => 'Sub Agen ID',
			'kantorID' => 'Kantor',
			'cabangID' => 'Cabang',
			'nama_kantor' => 'Nama Kantor Sub Agen',
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

		$criteria->compare('agen_subID',$this->agen_subID,true);
		$criteria->compare('kantorID',$this->kantorID,true);
		$criteria->compare('cabangID',$this->cabangID,true);
		
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
	 * @return AgenSub the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
