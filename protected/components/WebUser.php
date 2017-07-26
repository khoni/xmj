<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WebUser
 *
 * @author sani
 */
class WebUser extends CWebUser {

	//put your code here
	private $_model;

	public function checkAccess($operation, $params = array()) {
		if (empty($this->id)) {
			// Not identified => no rights
			return false;
		}
		$roles = explode(',', $this->getState('roles'));

		if (in_array($operation, $roles)) {
			return true;
		}
		// allow access if the operation request is the current user's role
		return ($operation === $roles);
	}

	public function get() {
		$user_id = Yii::app()->user->getId();
		$user = UserRole::model()->find(array('with' => array('user', 'role'), 'condition' => "user.userID='$user_id' and t.status='1'"));
		return $user;
	}

	public function session() {
		if (isset(Yii::app()->user->get()->id)) {
			$userRoleId = Yii::app()->user->get()->id;
			$session = Session::model()->find(array('select' => 'max(id) as id', 'condition' => "user_roleID='$userRoleId' AND status='1'"));
			return $session;
		}
	}

	public function module() {
		//return $this->role()->nama . '/profile';
		return 'profile/user/index';
	}

	public function role() {
		$role_id = Yii::app()->user->get()->roleID;
		$model = Role::model()->findByPk($role_id);
		return $model;
	}

	function uniqidReal($lenght = 13) {
		// uniqid gives 13 chars, but you could adjust it to your needs.
		if (function_exists("random_bytes")) {
			$bytes = random_bytes(ceil($lenght / 2));
		} elseif (function_exists("openssl_random_pseudo_bytes")) {
			$bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
		} else {
			throw new Exception("no cryptographically secure random function available");
		}
		return substr(bin2hex($bytes), 0, $lenght);
	}

}

?>
