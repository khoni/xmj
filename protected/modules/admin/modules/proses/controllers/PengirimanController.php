<?php
class PengirimanController extends Controller
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
                'actions'=>array('index','view','create','update'),
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
            'model'=>$this->loadModel($id),
        ));
    }

    public function actionCreate(){
        $model=new Pengiriman;
		$model->setScenario('newPengirimanAdmin');

        if(isset($_POST['Pengiriman']))
        {
            $model->attributes=$_POST['Pengiriman'];
			$model->pengirimanID="tr_".Yii::app()->user->uniqidReal(20);
            if($model->save())
                $this->redirect(array('view','id'=>$model->pengirimanID));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    public function actionUpdate($id){
        $model=$this->loadModel($id);
		$model->setScenario('updatePengirimanAdmin');

		$model->nama_kantor_pengirim=empty($model->originKantor->nama_kantor) ? '' : $model->originKantor->nama_kantor . " [".$model->originKantor->kode."]";
		$model->nama_kantor_penerima=empty($model->destinationKantor->nama_kantor) ? '' : $model->destinationKantor->nama_kantor . " [".$model->destinationKantor->kode."]";
		$model->nama_kantor_transit=empty($model->transitKantor->nama_kantor) ? '' : $model->transitKantor->nama_kantor . " [".$model->transitKantor->kode."]";
		$model->nomer_connote=empty($model->connote->nomer) ? '' : $model->connote->nomer;
		
		//$oldModel=new Pengiriman;
		//$oldModel->attributes=$model->attributes;

        if(isset($_POST['Pengiriman'])){
            $model->attributes=$_POST['Pengiriman'];
			/* ketika update data tidak boleh diubah
			$model->connoteID=$oldModel->connoteID;
			$model->origin_kantorID=$oldModel->origin_kantorID;
			$model->origin_cabangID=$oldModel->origin_cabangID;
			$model->origin_agenID=$oldModel->origin_agenID;
			$model->origin_agensubID=$oldModel->origin_agensubID;
			$model->destination_kantorID=$oldModel->destination_kantorID;
			*/			
            if($model->save())
                $this->redirect(array('view','id'=>$model->pengirimanID));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    public function actionDelete($id){
        if(Yii::app()->request->isPostRequest)
        {
            $this->loadModel($id)->delete();
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    public function actionIndex(){
        $model=new Pengiriman('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Pengiriman']))
            $model->attributes=$_GET['Pengiriman'];

        $this->render('index',array(
            'model'=>$model,
        ));
    }

    public function loadModel($id){
        $model=Pengiriman::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
    * Performs the AJAX validation.
    * @param CModel the model to be validated
    */
    protected function performAjaxValidation($model){
        if(isset($_POST['ajax']) && $_POST['ajax']==='pengiriman-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}