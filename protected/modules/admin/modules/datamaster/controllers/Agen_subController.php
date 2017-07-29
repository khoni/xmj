<?php
class Agen_subController extends Controller
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
            'model'=>$this->loadAgenSub($id),
        ));
    }

    public function actionCreate(){
        $user=new User;
		$user->setScenario('newKantorSubAgen');
		
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
						$agen_sub=new AgenSub;
						$agen_sub->agen_subID="sub_".Yii::app()->user->uniqidReal();
						$agen_sub->cabangID=$user->cabangID;
						$agen_sub->kantorID=$kantor->kantorID;
						$agen_sub->updated_at=time();
						$agen_sub->updated_by=Yii::app()->user->id;
						if($agen_sub->validate()){
							$user->save();
							$kantor->save();
							$agen_sub->save();
							$this->redirect(array('view','id'=>$agen_sub->agen_subID));
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
        $agen_sub=$this->loadAgenSub($id);
		$kantor=Kantor::model()->find("kantorID='".$agen_sub->kantorID."'");
		
		$user=$this->loadUser($agen_sub->kantor->userID);
		$user->setScenario('newKantorSubAgen');
		
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
		$user->cabangID=$agen_sub->cabangID;
		
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
					$agen_sub->save();
					$this->redirect(array('view','id'=>$agen_sub->agen_subID));
				}
			}
		}
        $this->render('update',array(
            'user'=>$user,
            'agen_sub'=>$agen_sub,
        ));
    }

    public function actionDelete($id){
        if(Yii::app()->request->isPostRequest)
        {
            $this->loadAgenSub($id)->delete();
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    public function actionIndex(){
        $agen_sub=new AgenSub('search');
        $agen_sub->unsetAttributes();  // clear any default values
        if(isset($_GET['AgenSub']))
            $agen_sub->attributes=$_GET['AgenSub'];

        $this->render('index',array(
            'agen_sub'=>$agen_sub,
        ));
    }

    public function loadAgenSub($id){
        $model=AgenSub::model()->findByPk($id);
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
        if(isset($_POST['ajax']) && $_POST['ajax']==='agen_sub-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionAddkantor($userid,$kantorid=''){
		$user=$this->loadUser($userid);
		
        $kantor=new Kantor;
		$kantor->setScenario('newKantorSubAgen');
		
        if(isset($_POST['Kantor'])){
            $kantor->attributes=$_POST['Kantor'];
			$kantor->kantorID="ktr_".Yii::app()->user->uniqidReal();
			$kantor->userID=$user->userID;
			$kantor->is_aktif=1;
			$kantor->updated_at=time();
			$kantor->updated_by=Yii::app()->user->id;
			if($kantor->validate()){
				$agen_sub=new AgenSub;
				$agen_sub->agen_subID="sub_".Yii::app()->user->uniqidReal();
				$agen_sub->kantorID=$kantor->kantorID;
				$agen_sub->cabangID=$kantor->cabangID;
				if($agen_sub->validate()){
					$kantor->save();
					$agen_sub->save();
					$this->redirect(array('view','id'=>$agen_sub->agen_subID));
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