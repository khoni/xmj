<?php

/**
 * This is the model class for table "user_role".
 *
 * The followings are the available columns in table 'user_role':
 * @property integer $id
 * @property integer $roleID
 * @property integer $userID
 * @property string $status
 */
class UserRole extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UserRole the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user_role';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_roleID, roleID, userID', 'required'),
            //array('roleID, userID', 'numerical', 'integerOnly' => true),
            array('status', 'length', 'max' => 64),
            array('created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, roleID, userID, status', 'safe', 'on' => 'search'),
            array('id, roleID, userID, status', 'safe', 'on' => 'byUser'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'session' => array(self::HAS_MANY, 'Session', 'user_roleID'),
            'role' => array(self::BELONGS_TO, 'Role', 'roleID'),
            'user' => array(self::BELONGS_TO, 'User', 'userID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
			'user_roleID' => 'User Role ID',
            'roleID' => 'Role ID',
            'userID' => 'User ID',
            'status' => 'Status',
        );
    }

    public function beforeSave() {

        if (parent::beforeSave() && $this->isNewRecord) {
            $userID = $this->userID;
            $record = UserRole::model()->find(array('condition' => "roleID='$this->roleID' and userID='$userID'"));
            if ($record === NULL) {
                return true;
            } else {
                $this->addError($attribute, 'Role telah aktif, pilih role lain');
                return false;
            }
        } else {
            return true;
        }
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('roleID', $this->roleID);
        $criteria->compare('userID', $this->userID);
        $criteria->compare('status', $this->status, true);


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function byUser($userId) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('roleID', $this->roleID);
        $criteria->compare('userID', $userId);
        $criteria->compare('status', $this->status, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
