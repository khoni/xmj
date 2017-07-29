<?php

class DaerahController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }
    
    public function accessRules(){
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('loadpropinsi','loadkabupaten','loadkecamatan','loadkelurahan','loadWilayah_kantor'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

	public function actionLoadpropinsi(){
	   $parent=Yii::app()->db->createCommand("select nama from negara where negaraID=:var ")->bindParam(':var',$_POST['neg_id'])->queryScalar();
	   //$data=Propinsi::model()->findAll('negaraID=:region_id',array(':region_id'=>$_POST['neg_id']));
	   $data=Propinsi::model()->findAll(array('order'=>'t.nama', 'condition'=>'negaraID=:region_id', 'params'=>array(':region_id'=>$_POST['neg_id'])));
	   $data=CHtml::listData($data,'propinsiID','nama');
	   
	   echo "<option value=''>Pilih Propinsi (Negara ".$parent.")</option>";
	   foreach($data as $value=>$name)
		   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true)
	   ;
	}
	
	public function actionLoadKabupaten(){
	   $parent=Yii::app()->db->createCommand("select nama from propinsi where propinsiID=:var ")->bindParam(':var',$_POST['prop_id'])->queryScalar();
	   //$data=Kabupaten::model()->findAll('propinsiID=:region_id',array(':region_id'=>$_POST['prop_id']));
	   $data=Kabupaten::model()->findAll(array('order'=>'t.nama', 'condition'=>'propinsiID=:region_id', 'params'=>array(':region_id'=>$_POST['prop_id'])));
	   $data=CHtml::listData($data,'kabupatenID','nama');
	   
	   echo "<option value=''>Pilih Kabupaten (Propinsi ".$parent.")</option>";
	   foreach($data as $value=>$name)
		   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true)
	   ;
	}

	public function actionLoadKecamatan(){
	   $parent=Yii::app()->db->createCommand("select nama from kabupaten where kabupatenID=:var ")->bindParam(':var',$_POST['kab_id'])->queryScalar();
	   //$data=Kecamatan::model()->findAll('kabupatenID=:region_id',array(':region_id'=>$_POST['kab_id']));
	   $data=Kecamatan::model()->findAll(array('order'=>'t.nama', 'condition'=>'kabupatenID=:region_id', 'params'=>array(':region_id'=>$_POST['kab_id'])));
	   $data=CHtml::listData($data,'kecamatanID','nama');
	   
	   echo "<option value=''>Pilih Kecamatan (Kota/Kabupaten ".$parent.")</option>";
	   foreach($data as $value=>$name)
		   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true)
	   ;
	}
	public function actionLoadKelurahan(){
	   $parent=Yii::app()->db->createCommand("select nama from kecamatan where kecamatanID=:var ")->bindParam(':var',$_POST['kec_id'])->queryScalar();
	   //$data=Kelurahan::model()->findAll('kecamatanID=:region_id',array(':region_id'=>$_POST['kec_id']));
	   $data=Kelurahan::model()->findAll(array('order'=>'t.nama', 'condition'=>'kecamatanID=:region_id', 'params'=>array(':region_id'=>$_POST['kec_id'])));
	   $data=CHtml::listData($data,'kelurahanID','nama');
	   
	   echo "<option value=''>Pilih Kelurahan (Kecamatan ".$parent.")</option>";
	   foreach($data as $value=>$name)
		   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true)
	   ;
	}

	public function actionLoadWilayah_kantor(){
	   $data=Kabupaten::model()->find("kabupatenID='".$_POST['kab_id']."'");
	   $txt='<div class="note note-warning"><b>Warning ! </b> Diluar Jangkauan Pengiriman.<br /><small>Set Jangkauan di menu "settings->wilayah kerja"<small></div>';
	   echo empty($data->wilayah_kantorID) ?  $txt : $data->wilayah_kantorID;
	}

}
