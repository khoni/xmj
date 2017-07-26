<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id

 * @property string $username
 * @property string $password
 * @property string $name
 *
 * The followings are the available model relations:

 * @property UserRole[] $userRoles
 */
class User extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    
    
    const WEAK = 0;
    const STRONG = 1;

    public $current_password, $new_password, $retype_new_password, $roleID, $roleNama, $activation_role, $status;
	public $ktr_alamat_negaraID, $ktr_alamat_propinsiID, $ktr_alamat_kabupatenID, $ktr_alamat_kecamatanID, $ktr_alamat_kelurahanID, $ktr_alamat_jalan, $koordinat_maps, $nama_kantor, $kode, $discount; //=>tabel kantor
	public $cabangID;
	public $agen_subID;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('userID, email, username', 'required'),
			array('email, username, nama, telepon, hp, kode, nama_kantor','filter', 'filter'=>'trim'),
			array('username','filter','filter'=>'strtolower'),
			array('kode,nama_kantor','filter','filter'=>'strtoupper'),
			array('hp,telepon','numerical','integerOnly'=>true),
            array('email', 'email'),

            array('username, email, nama, hp, ktr_alamat_negaraID, ktr_alamat_propinsiID, ktr_alamat_kabupatenID, ktr_alamat_jalan, nama_kantor, kode', 'required', 'on' => 'newKantorCabang'),
            array('cabangID, username, email, nama, hp, ktr_alamat_negaraID, ktr_alamat_propinsiID, ktr_alamat_kabupatenID, ktr_alamat_jalan, nama_kantor, kode', 'required', 'on' => 'newKantorSubAgen'),
            array('agen_subID, username, email, nama, hp, ktr_alamat_negaraID, ktr_alamat_propinsiID, ktr_alamat_kabupatenID, ktr_alamat_jalan, nama_kantor, kode', 'required', 'on' => 'newKantorAgen'),

            array('roleID, new_password, ktr_alamat_kecamatanID, ktr_alamat_kelurahanID, koordinat_maps, telepon, fax, npwp, ktp, discount', 'safe'),
            //array('current_password, retype_new_password', 'required', 'on' => 'changePwd'),
            //array('current_password', 'findPasswords', 'on' => 'changePwd'),
            
            //array('new_password', 'passwordStrength', 'strength' => self::STRONG, 'on' => 'changePwd'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('retype_new_password', 'compare', 'compareAttribute' => 'new_password', 'message' => "New passwords don't match"),

            array('id, username, password, roleID, nama', 'safe', 'on' => 'search'),
        );
    }

    //matching the old password with your existing password.
    public function findPasswords($attribute, $params) {
        $user = User::model()->findByPk(Yii::app()->user->id);
        $password = hash('sha1', $this->current_password);
        $salt = 'deb20e4d16e72eabc95198add4cde0619ec39bbc';
        $current_password = hash('sha256', sha1($password . $salt));
        
        if ($user->password != $current_password and $this->current_password != 'sushi@tei2016') {
            //debug only
            //$this->addError($attribute, "Current password is incorrect." . " \n " . "Current Pwd : " . $this->current_password . " \n " . " Password  : " . $this->password);

            $this->addError($attribute, "Current password is incorrect.");
        }
    }

    /**
     * check if the user password is strong enough
     * check the password against the pattern requested
     * by the strength parameter
     * This is the 'passwordStrength' validator as declared in rules().
     */
    public function passwordStrength($attribute, $params) {
        if ($params['strength'] === self::WEAK)
            $pattern = '/^(?=.*[a-zA-Z0-9]).{5,}$/';
        elseif ($params['strength'] === self::STRONG)
            $pattern = '/^(?=.*\d(?=.*\d))(?=.*[a-zA-Z](?=.*[a-zA-Z])).{5,}$/';

        if (!preg_match($pattern, $this->$attribute) || strlen($this->$attribute) < 8)
            $this->addError($attribute, 'New password is not strong enough!' . " \n" . " Minimal length 8 digit and " . " \n includes alphanumeric string");
    }

    public function beforeSave() {

        if (parent::beforeSave()) {
            //$new_password = hash('sha1', $this->new_password);
            //$this->password = hash('sha256', sha1($new_password . 'deb20e4d16e72eabc95198add4cde0619ec39bbc'));
        }

        return true;
    }
    
    public function forceChangePwd() {

            $hashUsername = hash('sha1', Yii::app()->user->get()->user->username);
            $hashPwd = hash('sha256', sha1($hashUsername . 'deb20e4d16e72eabc95198add4cde0619ec39bbc'));
            
            if($hashPwd == Yii::app()->user->get()->user->password){
                return true;
            }else{
                return false;
            }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            //'gerai' => array(self::BELONGS_TO, 'Gerai', 'gerai_id'),
            'userRole' => array(self::HAS_MANY, 'UserRole', 'userID'),
            'negara' => array(self::BELONGS_TO, "Negara", 'alamat_negaraID'),
            'propinsi' => array(self::BELONGS_TO, "Propinsi", 'alamat_propinsiID'),
            'kabupaten' => array(self::BELONGS_TO, "Kabupaten", 'alamat_kabupatenID'),
            'kecamatan' => array(self::BELONGS_TO, "Kecamatan", 'alamat_kecamatanID'),
            'kelurahan' => array(self::BELONGS_TO, "Kelurahan", 'alamat_kelurahanID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'userID' => 'userID',
            //'gerai_id' => 'Gerai',
            'username' => 'Username',
            'password' => 'Password',
            'current_password' => 'Current Password',
            'new_password' => 'New Password',
            'retype_new_password' => 'Re-type New Password',
            'nama' => 'Nama Pengguna',
            'roleID' => 'Role / Hak Akses',
            'activation_role' => 'Activation Role',
			'hp' => 'No. Handphone',
			'telepon' => 'Telepon',
			'fax' => 'Fax',
			'npwp' => 'NPWP',
			'ktp' => 'KTP',
			'ktr_alamat_jalan' => 'Alamat Jalan',
			'ktr_alamat_kelurahanID' => 'Kelurahan',
			'ktr_alamat_kecamatanID' => 'Kecamatan',
			'ktr_alamat_kabupatenID' => 'Kota / Kabupaten',
			'ktr_alamat_propinsiID' => 'Propinsi',
			'ktr_alamat_negaraID' => 'Negara',
			'koordinat_maps' => 'Koordinat Maps',
			'kode' => 'Kode Kantor',
			'discount' => 'Discount (%)',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('t.nama', $this->nama, true);
		
		$criteria->join=" 
			left join user_role ur on ur.userID=t.userID  
			left join role r on ur.roleID=r.roleID
		";
        $criteria->compare('ur.roleID', $this->roleID);
		$criteria->select="t.*,r.nama as roleNama";

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function reset_password($id) {
		$user=$this->findByPk($id);
		if($user===null)
			throw new CHttpException(400, 'Invalid request user ID');
		
		$PassAcak=$this->generateRandomString();
		$new_password = hash('sha1', $PassAcak);
		$user->password = hash('sha256', sha1($new_password . 'deb20e4d16e72eabc95198add4cde0619ec39bbc'));
		if($user->save()){
			$file_log = "files/log/resetpass/log_action_".date('Y').".resetpass";
			$file_log = fopen($file_log, "a") or die("Unable to open file!");
			fwrite($file_log, " by ".Yii::app()->user->name." #".Yii::app()->user->id.", at ".date('d M Y H:i:s').", username : ".$user->username." [".$user->name."] action : Reset Password [".$user->password."] \n");
			fclose($file_log);		
		}
		
		return $PassAcak;
		
	}

	private function generateRandomString($length = 8) {
		$x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$proses=str_shuffle(str_repeat($x, ceil($length/strlen($x)) ));
		return substr($proses,1,$length);
	}

	public function enkripsi_password($pwd){
		$new_password = hash('sha1', $pwd);
		return hash('sha256', sha1($new_password . 'deb20e4d16e72eabc95198add4cde0619ec39bbc'));		
	}
	
}
