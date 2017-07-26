<?php
class CabangController extends Controller
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
            'model'=>$this->loadCabang($id),
        ));
    }

    public function actionCreate(){
        $user=new User;
		$user->setScenario('newKantorCabang');
		
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
					$kantor->is_aktif=1;
					$kantor->kantorID="ktr_".Yii::app()->user->uniqidReal();
					$kantor->updated_at=time();
					$kantor->updated_by=Yii::app()->user->id;
					if($kantor->validate()){
						$cabang=new Cabang;
						$cabang->cabangID="cab_".Yii::app()->user->uniqidReal();
						$cabang->kantorID=$kantor->kantorID;
						if($cabang->validate()){
							$user->save();
							$kantor->save();
							$cabang->save();
							$this->redirect(array('view','id'=>$cabang->cabangID));
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
        $cabang=$this->loadCabang($id);
		$kantor=Kantor::model()->find("kantorID='".$cabang->kantorID."'");
		
		$user=$this->loadUser($cabang->kantor->userID);
		$user->setScenario('newKantorCabang');
		
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
				$kantor->is_aktif=1;
				$kantor->updated_at=time();
				$kantor->updated_by=Yii::app()->user->id;
				if($kantor->validate()){
					$user->save();
					$kantor->save();
					$cabang->save();
					$this->redirect(array('view','id'=>$cabang->cabangID));
				}
			}
		}
		
        $this->render('update',array(
            'user'=>$user,
            'cabang'=>$cabang,
        ));
    }

    public function actionDelete($id){
        if(Yii::app()->request->isPostRequest)
        {
            $this->loadCabang($id)->delete();
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    public function actionIndex(){
        $cabang=new Cabang('search');
        $cabang->unsetAttributes();  // clear any default values
        if(isset($_GET['Cabang']))
            $cabang->attributes=$_GET['Cabang'];

        $this->render('index',array(
            'cabang'=>$cabang,
        ));
    }

    public function loadCabang($id){
        $model=Cabang::model()->findByPk($id);
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
        if(isset($_POST['ajax']) && $_POST['ajax']==='cabang-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionAddkantor($userid){
		$user=$this->loadUser($userid);
		
        $kantor=new Kantor;
		$kantor->setScenario('newKantorCabang');
		
        if(isset($_POST['Kantor'])){
            $kantor->attributes=$_POST['Kantor'];
			$kantor->kantorID="ktr_".Yii::app()->user->uniqidReal();
			$kantor->userID=$user->userID;
			$kantor->is_aktif=1;
			$kantor->updated_at=time();
			$kantor->updated_by=Yii::app()->user->id;
			if($kantor->validate()){
				$cabang=new Cabang;
				$cabang->cabangID="cab_".Yii::app()->user->uniqidReal();
				$cabang->kantorID=$kantor->kantorID;
				if($cabang->validate()){
					$kantor->save();
					$cabang->save();
					$this->redirect(array('view','id'=>$cabang->cabangID));
				}
			}
		}
        $this->render('addkantor',array(
            'user'=>$user,
            'kantor'=>$kantor,
        ));
		
	}
}