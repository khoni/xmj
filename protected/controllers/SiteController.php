<?php

class SiteController extends Controller {

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
    

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        
        //$this->redirect('site/login');
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
       
        $this->layout = '//layouts/column1slider';

        if (isset(Yii::app()->user->id)) {
            $this->redirect(Yii::app()->user->module());
        } else {
            $this->redirect('login');
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }else {
            $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {

        $this->layout = '//layouts/column2left';
        $this->setPageTitle('Login - JMX');
        $model = new LoginForm;

        // collect user input data
        
        if (isset($_POST['LoginForm']) && isset($_POST['ajax'])) {
            $model->attributes = $_POST['LoginForm'];
			//echo "cc";
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
				//echo "aa";
				
                $data = array();
                $data["type"] = 'success';
                $data["title"] = 'Success';
                if (strpos(Yii::app()->user->returnUrl, Yii::app()->user->module()===false)) {
                    $data["page"] = Yii::app()->user->returnUrl . '/' . Yii::app()->user->module(); // or redirect to referer url
                } else {
                    $data["page"] = Yii::app()->user->returnUrl;
                }
				

                echo CJavaScript::jsonEncode($data);
                Yii::app()->end();
            } else {
				//echo "bb";
				
                $data = array();
                $data["type"] = 'failed';
                $data["title"] = 'Error';
                $data["page"] = 'login';
				
                echo CJavaScript::jsonEncode($data);
                Yii::app()->end();
            }
        }
        
        else if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $this->redirect("../" . Yii::app()->user->module());
            }else{
                Yii::app()->user->setFlash('error', "<strong>Maaf!</strong> Username atau password anda salah");
                $this->refresh();                
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }
	
	public function actionResetpass()
	{
		$this->layout = '//layouts/column3left';
		$this->setPageTitle('Reset Password - JMX');
		
		if (isset($_POST["ok"]) and !empty($_POST["uname"]) )
		{
			//echo $_POST['uname'];
			$kueri = "select id, email_lainnya from user where username = :uname";
			$command = Yii::app()->db->createCommand($kueri);
			$command->bindParam(":uname", $_POST["uname"], PDO::PARAM_STR);
			$result = $command->queryRow();
			$id_user = $result['id'];
			$email_lain = $result['email_lainnya'];
			
			$kode_reset = rand(10000, 99999);
			
			$sql = "
				Update user
				set pass_reset = '".$kode_reset."'
				where id = '".$id_user."'
			";
			$command = Yii::app()->db->createCommand($sql)->execute();
			
			$to      = $email_lain;
			$subject = 'JMX : Reset Password';
			$message = 'Username : '.$_POST["uname"] . "\r\n";
				$message .= 'Kode Reset Pass : '.$kode_reset;
			$headers = 'From: Admin@jmx.ac.id' . "\r\n" .
				'Reply-To: Admin@jmx.ac.id' . "\r\n" .
				'X-Mailer: PHP/';

			mail($to, $subject, $message, $headers);
			
			Yii::app()->user->setFlash('success', "Reset Berhasil. Silahkan buka email anda (".$email_lain."), untuk melihat kode reset password. Bila tidak ada di INBOX, bisa lihat di SPAM.");
		}
		else if (isset($_POST["ok_kode"]) and !empty($_POST["uname"]) and !empty($_POST["kode_reset"]) )
		{
			$kueri = "select id, pass_reset from user where username = :uname";
			$command = Yii::app()->db->createCommand($kueri);
			$command->bindParam(":uname", $_POST["uname"], PDO::PARAM_STR);
			$result = $command->queryRow();
			$id_user = $result['id'];
			$kode_reset = $result['pass_reset'];
			$pass_baru = rand(1000000, 9999999);
			$pass_baru_enkrip = hash('sha256', sha1(sha1($pass_baru).'deb20e4d16e72eabc95198add4cde0619ec39bbc'));
			
			if ($kode_reset == $_POST["kode_reset"])
			{
				$sql = "
					Update user
					set password = '".$pass_baru_enkrip."', pass_reset=''
					where id = '".$id_user."'
				";
				$command = Yii::app()->db->createCommand($sql)->execute();
				Yii::app()->user->setFlash('success', "Password berhasil direset. Password baru anda adalah : ".$pass_baru);
			}
			else
			{
				Yii::app()->user->setFlash('error', "Reset Gagal. Kode Reset Password, Salah.");
			}
		}
		
		$this->render('resetpass' );
	}

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->createUrl('login'));
    }

}
