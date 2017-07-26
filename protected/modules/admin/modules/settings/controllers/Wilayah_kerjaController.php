<?php
class Wilayah_kerjaController extends Controller
{
    public $layout='//layouts/column2_right_content';
	public $kantor;

    public function filters(){
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules(){
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index','SetKabupaten'),
                'users'=>array('@'),
                //'roles'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex(){
        $model=new Kabupaten('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Kabupaten']))
            $model->attributes=$_GET['Kabupaten'];
		
		if (isset($_POST['id']) and isset($_POST['kantorID']) ){
			$this->generate_wilayah($_POST['id'],$_POST['kantorID']);
			$this->redirect(array('index'));
		}

		$this->kantor=CHtml::listData(Kantor::model()->findAll('t.kantorID in (select c.kantorID from cabang c)'),'kantorID','fullnama');
			
        $this->render('index',array(
            'model'=>$model,
        ));
    }

	public function generate_wilayah($id=array(),$kantorID){
		if (isset($id)){
			$criteria = new CDbCriteria();
			$criteria->addInCondition('kabupatenID', $id);
			$criteria->select=array('t.*');
			$mhs=Kabupaten::model()->findAll($criteria);
			$idx="";
			foreach($mhs as $data){
				$idx .= "'".$data->kabupatenID . "',";
			}

			$idx .= "'0'";
			if($idx != '0'){		
				$sql="update kabupaten set wilayah_kantorID = '".$kantorID."' where kabupatenID in (".$idx.")";
				Yii::app()->db->createCommand($sql)->execute();
			}
		}
		return true;
	}
    public function loadModel($id){
        $model=Kabupaten::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
    * Performs the AJAX validation.
    * @param CModel the model to be validated
    */
    protected function performAjaxValidation($model){
        if(isset($_POST['ajax']) && $_POST['ajax']==='kabupaten-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }


    public function actionSetKabupaten() {

        $id=$_POST['pk'];		
        $model = $this->loadModel($id);

        if (Yii::app()->request->isPostRequest) {
            if ($_POST['name'] == 'wilayah_kantorID') {
                $model->wilayah_kantorID= trim($_POST['value']);
				$model->save();
            }
        }
    }
}