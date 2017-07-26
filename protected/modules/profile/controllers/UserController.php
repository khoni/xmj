<?php

class UserController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2_right_content';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'admin', 'create', 'update', 'change_password', 'change_role'),
                'users' => array('@'),
                //'roles' => array('cabang')
            ),
            /*
              array('allow', // allow admin user to perform 'admin' and 'delete' actions
              'actions'=>array('admin','delete'),
              'users'=>array('admin'),
              ),
             */
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User;


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);


        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);


        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {

            // we only allow deletion via POST request

            $this->loadModel($id)->delete();


            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser

            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

        $id = Yii::app()->user->id;
        $changePwd = new User;
        $changePwd->setScenario('changePwd');

        $changeRole = new UserRole;
        //$changeRole->setScenario('changeRole');

        $this->render('index', array(
            'model' => $this->loadModel($id),
            'changePwd' => $changePwd,
            'changeRole' => $changeRole
        ));
    }

    public function actionChange_password($id) {
        //$model = new User;
        $model = User::model()->findByPk(Yii::app()->user->get()->user->id); //User::model()->findByAttributes(array('id' => $id));
        $model->setScenario('changePwd');


        if (isset($_POST['User'])) {

            $model->attributes = $_POST['User'];
            $valid = $model->validate();

            if ($valid) {

                $new_password = hash('sha1', $_POST['User']['new_password']);
                $model->password = hash('sha256', sha1($new_password . 'deb20e4d16e72eabc95198add4cde0619ec39bbc'));
                if ($model->save()) {
                    $data = array();
                    $data["type"] = 'success';
                    $data["title"] = 'Success';
                    $data["text"] = 'Password berhasil diubah!';
                    $data["delay"] = 3000;
                    $data["styling"] = 'bootstrap3';
                    echo CJavaScript::jsonEncode($data);
                    Yii::app()->end();
                } else {
                    $errors = $model->getErrors();
                    $error_text = '';

                    foreach ($errors as $key => $val) {
                        $error_text .= $errors[$key][0] . "\n";
                    }

                    $data = array();
                    $data["type"] = 'error';
                    $data["title"] = 'Error';
                    $data["text"] = $error_text;
                    $data["delay"] = 3000;
                    $data["styling"] = 'bootstrap3';
                    echo CJavaScript::jsonEncode($data);

                    Yii::app()->end();
                }
            } else {
                $errors = $model->getErrors();
                $error_text = '';

                foreach ($errors as $key => $val) {
                    $error_text .= $errors[$key][0] . "\n";
                }

                $data = array();
                $data["type"] = 'warning';
                $data["title"] = 'Peringatan';
                $data["text"] = $error_text;
                $data["delay"] = 3000;
                $data["styling"] = 'bootstrap3';
                echo CJavaScript::jsonEncode($data);

                Yii::app()->end();
            }
        }
    }

    public function actionChange_role() {

        $userId = Yii::app()->user->id;
        $modelOff = UserRole::model()->find("userID=:uid AND status='1'", array(":uid" => $userId));

        if (isset($_POST['UserRole'])) {

            //$model->attributes = $_POST['UserRole'];
            //$command = Yii::app()->db->createCommand();

            $issetUserRole = UserRole::model()->find('userID=:user_id AND roleID=:role_id', array(':role_id' => $_POST['UserRole']['roleID'], ':user_id' => $userId));

            if (!empty($issetUserRole)) {
                $modelOff->status = 0;
                if ($modelOff->save()) {
                    $modelOn = UserRole::model()->find("userID=:uid AND roleID=:rid", array(":uid" => $userId, ":rid" => $_POST['UserRole']['roleID']));
                    $modelOn->status = 1;
                    if ($modelOn->save()) {
                        $role = Role::model()->findByPk($modelOn->roleID);
                        Yii::app()->user->setState('roles',$role->nama);
                        
                        $data = array();
                        $data["type"] = 'success';
                        $data["title"] = 'Success';
                        $data["role"] = $role->nama;
                        $data["text"] = 'Role berhasil diubah!';
                        $data["delay"] = 3000;
                        $data["styling"] = 'bootstrap3';
                        echo CJavaScript::jsonEncode($data);
                        Yii::app()->end();
                    } else {

                        $errors = $modelOn->getErrors();
                        $error_text = '';

                        foreach ($errors as $key => $val) {
                            $error_text .= $errors[$key][0] . "\n";
                        }

                        $data = array();
                        $data["type"] = 'error';
                        $data["title"] = 'Error';
                        $data["text"] = $error_text;
                        $data["delay"] = 3000;
                        $data["styling"] = 'bootstrap3';
                        echo CJavaScript::jsonEncode($data);

                        Yii::app()->end();
                    }
                } else {

                    $errors = $modelOff->getErrors();
                    $error_text = '';

                    foreach ($errors as $key => $val) {
                        $error_text .= $errors[$key][0] . "\n";
                    }

                    $data = array();
                    $data["type"] = 'error';
                    $data["title"] = 'Error';
                    $data["text"] = $error_text;
                    $data["delay"] = 3000;
                    $data["styling"] = 'bootstrap3';
                    echo CJavaScript::jsonEncode($data);

                    Yii::app()->end();
                }
                /*
                  $command->update('user_role', array(
                  'status' => '0',
                  ), 'role_id=:role_id AND user_id=:user_id', array(':role_id' => Yii::app()->user->get()->role->id, ':user_id' => Yii::app()->user->id));

                  $command->update('user_role', array(
                  'status' => '1',
                  ), 'role_id=:role_id AND user_id=:user_id', array(':role_id' => $_POST['UserRole']['role_id'], ':user_id' => $_POST['UserRole']['user_id']));

                  $this->redirect(array('site/logout'));
                 * 
                 */
            } else {
                $data = array();
                $data["type"] = 'warning';
                $data["title"] = 'Peringatan';
                $data["text"] = "Role tidak ditemukan";
                $data["delay"] = 3000;
                $data["styling"] = 'bootstrap3';
                echo CJavaScript::jsonEncode($data);

                Yii::app()->end();
            }

            if ($valid) {

                if ($model->save()) {
                    $data = array();
                    $data["type"] = 'success';
                    $data["title"] = 'Success';
                    $data["text"] = 'Password berhasil diubah!';
                    $data["delay"] = 3000;
                    $data["styling"] = 'bootstrap3';
                    echo CJavaScript::jsonEncode($data);
                    Yii::app()->end();
                } else {
                    $errors = $model->getErrors();
                    $error_text = '';

                    foreach ($errors as $key => $val) {
                        $error_text .= $errors[$key][0] . "\n";
                    }

                    $data = array();
                    $data["type"] = 'error';
                    $data["title"] = 'Error';
                    $data["text"] = $error_text;
                    $data["delay"] = 3000;
                    $data["styling"] = 'bootstrap3';
                    echo CJavaScript::jsonEncode($data);

                    Yii::app()->end();
                }
            } else {
                $errors = $model->getErrors();
                $error_text = '';

                foreach ($errors as $key => $val) {
                    $error_text .= $errors[$key][0] . "\n";
                }

                $data = array();
                $data["type"] = 'warning';
                $data["title"] = 'Peringatan';
                $data["text"] = $error_text;
                $data["delay"] = 3000;
                $data["styling"] = 'bootstrap3';
                echo CJavaScript::jsonEncode($data);

                Yii::app()->end();
            }
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
