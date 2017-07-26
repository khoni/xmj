<?php
class Jenis_serviceController extends Controller
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
        $model=new JenisService;
		
        if(isset($_POST['JenisService']))
        {
            $model->attributes=$_POST['JenisService'];
			$model->jenis_serviceID="js_".Yii::app()->user->uniqidReal();
			$model->updated_at=time();
			$model->updated_by=Yii::app()->user->id;
			
			$dir=Yii::app()->basePath."/../files/jenis_service";
			$model->file_gambar=Yii::app()->komponenBantu->simpan_file($model,'file_gambar',$dir);
			
            if($model->save())
                $this->redirect(array('view','id'=>$model->jenis_serviceID));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    public function actionUpdate($id){
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['JenisService']))
        {
            $model->attributes=$_POST['JenisService'];
			$model->updated_at=time();
			$model->updated_by=Yii::app()->user->id;
			
			$dir=Yii::app()->basePath."/../files/jenis_service";
			$old_name_file=$model->file_gambar;
			$model->file_gambar=Yii::app()->komponenBantu->simpan_file($model,'file_gambar',$dir,$old_name_file);
			
            if($model->save())
                $this->redirect(array('view','id'=>$model->jenis_serviceID));
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
        $model=new JenisService('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['JenisService']))
            $model->attributes=$_GET['JenisService'];

        $this->render('index',array(
            'model'=>$model,
        ));
    }

    public function loadModel($id){
        $model=JenisService::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
    * Performs the AJAX validation.
    * @param CModel the model to be validated
    */
    protected function performAjaxValidation($model){
        if(isset($_POST['ajax']) && $_POST['ajax']==='jenis-service-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}