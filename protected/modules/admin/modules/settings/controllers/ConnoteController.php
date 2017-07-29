<?php
class ConnoteController extends Controller
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

    public function actionIndex(){
        $model=new Connote('search');
        $model->unsetAttributes();  // clear any default values

        if(isset($_POST['kantorID']) && isset($_POST['jumlah']))
			$this->generate_connote($_POST['kantorID'],$_POST['jumlah']);

        $this->render('index',array(
            'model'=>$model,
        ));
    }

	public function generate_connote($id,$jumlah){
		$kantor=Kantor::model()->findByPk($id);
		if($kantor==null)
			throw new CHttpException(404,'KantorID tidak ditemukan');
			
		$sql="SELECT RIGHT(nomer,10) FROM connote WHERE kantorID='".$kantor->kantorID."' ORDER BY nomer DESC LIMIT 1";
		$nomer_akhir_connote=(int)Yii::app()->db->createCommand($sql)->queryScalar();
		$start=($nomer_akhir_connote==0) ? 1 : ($nomer_akhir_connote+1);
		$max=($start+($jumlah-1));
		$query_insert="";
		$tmp=$kantor->awalan_connote*10000000000;
		for($i=$start;$i<=$max;$i++){
			$query_insert.="(
				'con_".Yii::app()->user->uniqidReal(20)."',
				'".$kantor->kantorID."',
				'".($tmp+$i)."',
				'".time()."',
				'".Yii::app()->user->id."'
			)".($i==$max ? ';' : ',');
		}
		$sql="INSERT INTO connote (connoteID,kantorID,nomer,updated_at,updated_by) values ".$query_insert;
		Yii::app()->db->createCommand($sql)->execute();
	}
	
    public function actionView($id,$status=null){
        $model=new Connote('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Connote']))
            $model->attributes=$_GET['Connote'];

		$model->kantorID=$id;
		$model->connote_statusID =$status;
		
        $this->render('view',array(
            'model'=>$model,
        ));
    }

    protected function performAjaxValidation($model){
        if(isset($_POST['ajax']) && $_POST['ajax']==='connote-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}