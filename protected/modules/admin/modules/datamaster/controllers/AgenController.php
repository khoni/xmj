<?php
class AgenController extends Controller
{
    public $layout='//layouts/column2_right_content';

    public function filters(){
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules(){
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index','view','create','update','user_form','addkantor'),
                'users'=>array('@'),
                //'roles'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionView($id){
        $this->render('view',array(
            'model'=>$this->loadAgen($id),
        ));
    }

    public function actionCreate(){
        $user=new User;
		$user->setScenario('newKantorAgen');
		
        if(isset($_POST['User']))
        {
            $user->attributes=$_POST['User'];
			
			//$user->userID=str_replace("@","[at]",$user->email);
			$user->userID="usr_".Yii::app()->user->uniqidReal();
			$cek=Yii::app()->db->createCommand("select username from user where username='".$user->email."'")->queryScalar();
			if(!empty($cek)){
				$user->addError('email',"Email sudah pernah digunakan oleh seseorang sebagai username, gunakan alamat Email yang lain ! ");
			}else{
				$user->username=$user->email;
				$user->password = User::model()->enkripsi_password($user->email);
				$user->status=1;
				$user->updated_at=time();
				$user->updated_by=Yii::app()->user->id;
				if($user->validate()){
					$kantor=new Kantor;
					$kantor->userID=$user->userID;
					$kantor->kode=$user->kode;
					$kantor->nama_kantor=$user->nama_kantor;
					$kantor->alamat_negaraID=$user->ktr_alamat_negaraID;
					$kantor->alamat_propinsiID=$user->ktr_alamat_propinsiID;
					$kantor->alamat_kabupatenID=$user->ktr_alamat_kabupatenID;
					$kantor->alamat_kecamatanID=$user->ktr_alamat_kecamatanID;
					$kantor->alamat_kelurahanID=$user->ktr_alamat_kelurahanID;
					$kantor->alamat_jalan=$user->ktr_alamat_jalan;
					$kantor->koordinat_maps=$user->koordinat_maps;
					$kantor->discount=$user->discount;
					$kantor->awalan_connote=$user->awalan_connote;
					$kantor->is_aktif=1;
					$kantor->kantorID="ktr_".Yii::app()->user->uniqidReal();
					$kantor->updated_at=time();
					$kantor->updated_by=Yii::app()->user->id;
					if($kantor->validate()){
						$agen=new Agen;
						$agen->agenID="agen_".Yii::app()->user->uniqidReal();
						$agen->agen_subID=$user->agen_subID;
						$agen->kantorID=$kantor->kantorID;
						$agen->updated_at=time();
						$agen->updated_by=Yii::app()->user->id;
						if($agen->validate()){
							$user->save();
							$kantor->save();
							$agen->save();
							$this->redirect(array('view','id'=>$agen->agenID));
						}
					}
					
				}
			}			
        }

        $this->render('create',array(
            'user'=>$user,
        ));
    }

    public function actionUpdate($id){
        $agen=$this->loadAgen($id);
		$kantor=Kantor::model()->find("kantorID='".$agen->kantorID."'");
		
		$user=$this->loadUser($agen->kantor->userID);
		$user->setScenario('newKantorAgen');
		
		$user->ktr_alamat_negaraID=$kantor->alamat_negaraID;
		$user->ktr_alamat_propinsiID=$kantor->alamat_propinsiID;
		$user->ktr_alamat_kabupatenID=$kantor->alamat_kabupatenID;
		$user->ktr_alamat_kecamatanID=$kantor->alamat_kecamatanID;
		$user->ktr_alamat_kelurahanID=$kantor->alamat_kelurahanID;
		$user->ktr_alamat_jalan=$kantor->alamat_jalan;
		$user->nama_kantor=$kantor->nama_kantor;
		$user->kode=$kantor->kode;
		$user->discount=$kantor->discount;
		$user->koordinat_maps=$kantor->koordinat_maps;
		$user->agen_subID=$agen->agen_subID;
		$user->awalan_connote=$kantor->awalan_connote;
		
        if(isset($_POST['User'])){
            $user->attributes=$_POST['User'];
			$user->updated_at=time();
			$user->updated_by=Yii::app()->user->id;
			if($user->validate()){
				$kantor->kode=$user->kode;
				$kantor->nama_kantor=$user->nama_kantor;
				$kantor->alamat_negaraID=$user->ktr_alamat_negaraID;
				$kantor->alamat_propinsiID=$user->ktr_alamat_propinsiID;
				$kantor->alamat_kabupatenID=$user->ktr_alamat_kabupatenID;
				$kantor->alamat_kecamatanID=$user->ktr_alamat_kecamatanID;
				$kantor->alamat_kelurahanID=$user->ktr_alamat_kelurahanID;
				$kantor->alamat_jalan=$user->ktr_alamat_jalan;
				$kantor->koordinat_maps=$user->koordinat_maps;
				$kantor->discount=$user->discount;
				$kantor->awalan_connote=$user->awalan_connote;
				$kantor->is_aktif=1;
				$kantor->updated_at=time();
				$kantor->updated_by=Yii::app()->user->id;
				if($kantor->validate()){
					$user->save();
					$kantor->save();
					$agen->save();
					$this->redirect(array('view','id'=>$agen->agenID));
				}
			}
		}
        $this->render('update',array(
            'user'=>$user,
            'agen'=>$agen,
        ));
    }

    public function actionDelete($id){
        if(Yii::app()->request->isPostRequest)
        {
            $this->loadAgen($id)->delete();
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    public function actionIndex(){
        $agen=new Agen('search');
        $agen->unsetAttributes();  // clear any default values
        if(isset($_GET['Agen']))
            $agen->attributes=$_GET['Agen'];

        $this->render('index',array(
            'agen'=>$agen,
        ));
    }

    public function loadAgen($id){
        $model=Agen::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function loadUser($id){
        $model=User::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'User ID tidak ditemukan');
        return $model;
    }

    /**
    * Performs the AJAX validation.
    * @param CModel the model to be validated
    */
    protected function performAjaxValidation($model){
        if(isset($_POST['ajax']) && $_POST['ajax']==='agen-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionAddkantor($userid,$kantorid=''){
		$user=$this->loadUser($userid);
		
        $kantor=new Kantor;
		$kantor->setScenario('newKantorAgen');
		
        if(isset($_POST['Kantor'])){
            $kantor->attributes=$_POST['Kantor'];
			$kantor->kantorID="ktr_".Yii::app()->user->uniqidReal();
			$kantor->userID=$user->userID;
			$kantor->is_aktif=1;
			$kantor->updated_at=time();
			$kantor->updated_by=Yii::app()->user->id;
			if($kantor->validate()){
				$agen=new Agen;
				$agen->agenID="agen_".Yii::app()->user->uniqidReal();
				$agen->kantorID=$kantor->kantorID;
				$agen->agen_subID=$kantor->agen_subID;
				$agen->updated_at=time();
				$agen->updated_by=Yii::app()->user->id;
				if($agen->validate()){
					$kantor->save();
					$agen->save();
					$this->redirect(array('view','id'=>$agen->agenID));
				}
			}
		}
        $this->render('addkantor',array(
            'user'=>$user,
            'kantor'=>$kantor,
            'kantorid'=>$kantorid,
            'userid'=>$userid,
        ));
		
	}
}