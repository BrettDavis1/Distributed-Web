<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 3/27/18
 * Time: 8:23 PM
 */

namespace Movies;

require_once './global.php';

class Users
{

    public $errors;

    final public function checkEmail($email) {
        $email = $db->secure($email);
        $query = "SELECT id FROM users WHERE mail='$email'";
        $res = mysql_query($query);
        if (mysql_num_rows($res) > 0) {
            return(true); }
    }

    final public function validEmail($email)
    {
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if (preg_match($regex, $email)) {
            return(true); }
    }

    final public function checkUser($user) {
        $user = $db->secure($user);
        $query = "SELECT id FROM users WHERE username='$user'";
        $res = mysql_query($query);
        if (mysql_num_rows($res) > 0) {
            return(true); }
    }

    final public function checkLogin($email, $pass) {
        $this->e = $db->secure($email);
        $this->p = $db->secure(sha1($pass));
        $this->q = "SELECT * FROM users WHERE mail ='$this->e' AND password ='$this->p'";
        $this->r = mysql_query($this->q);
        if (mysql_num_rows($this->r) > 0) {
            return(true); }
    }

    final public function register() {
        if (!empty($_POST['rusername']) && !empty($_POST['rpassword']) && !empty($_POST['address']) && !empty($_POST['remail']) && !empty($_POST['city'])
            && !empty($_POST['state']) && !empty($_POST['zipcode']) && !empty($_POST['phone'])) {

            if (!$this->validEmail($_POST['remail']))
                $this->errors = "Enter Valid Email Address!";
            else {
                $this->addUser();
                unset($this->errors);
            }
        }

        elseif (empty($_POST['rusername']) || empty($_POST['rpassword']) || empty($_POST['rep_password']) && empty($_POST['remail'])) {
            $this->errors = "Please Fill in All Spaces";
            unset($this->errors);
        }
    }

    final public function session($email) {
        $this->em = $db->secure($email);
        $this->idr = mysql_query("SELECT id FROM users WHERE mail = '$this->em'");
        $_SESSION['id'] = "$this->idr";
    }

    final public function login() {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            if ($this->checkLogin($_POST['email'], $_POST['password'])) {
                $email = $db->secure($_POST['email']);
                $query = "SELECT id FROM users WHERE mail = '$email'";
                $result = mysql_query($query);
                $id = mysql_result($result, 0);
                $_SESSION['id'] = "$id";
                $date = date("F j, Y, g:i a");
                mysql_query("UPDATE users SET last_online='$date' WHERE id = '$id'");
                unset($errors);
                header('Location: me.php');
                exit; }
            else { $this->errors = 'Invalid Login Details'; return; }
        }
        elseif (empty($_POST['email']) || empty($_POST['password'])) { $this->errors = 'Fill in All Spaces!'; return;}
    }

    final public function loggedIn() {
        if (isset($_SESSION['id'])) {
            return(true);
        }
    }

    final public function logout() {
        session_unset();
        session_destroy();
    }

    final public function addUser() {
        $this->username = $db->secure($_POST['rusername']);
        $this->email = $db->secure($_POST['remail']);
        $this->password = $db->secure(sha1($_POST['rpassword']));
        $this->motto = $db->secure($this->motto);
        $this->auth_ticket = $db->secure($this->sso());
        $this->created = $db->secure(date("F j, Y, g:i a"));
        $this->ip = $db->secure($_SERVER['REMOTE_ADDR']);
        $this->last = $db->secure(date("F j, Y, g:i a"));
        $this->query = "INSERT INTO users (username, password, mail, motto, auth_ticket, account_created, last_online, ip_last, ip_reg) VALUES('$this->username ', '$this->password', '$this->email', '$this->motto', '$this->ticket', '$this->created', '$this->last', '$this->ip', '$this->ip')";
        $db->query($this->query);

        header('Location: index');
    }

    final public function sso($id) {
        $this->minimum = 5;
        $this->maximum = getrandmax();
        $this->sso = 'theCMS-'.rand(9,999).'/'.substr(sha1(time()).'/'.rand(9,9999999).'/'.rand(9,9999999).'/'.rand(9,9999999),0,33);
        mysql_query("UPDATE users SET auth_ticket = '$this->sso' WHERE id = '$id'");
        $_SESSION['user']['auth_ticket'] = $this->sso;
    }

    final public function housekeeping() {
        global $template;
        if ($this->loggedIn()) {
            $this->hid = $_SESSION['id'];
            $this->rank = mysql_query("SELECT rank FROM users WHERE id = '$this->hid'");

            if ($this->rank > 2) {
                $template->replace(array('housekeeping'=>'Housekeeping'));
            }
            else {
                $template->replace(array('housekeeping'=>''));
            }
        }
    }
}

?>
}