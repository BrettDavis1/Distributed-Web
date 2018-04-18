<?php
require_once ('connect.php');

class Users
{

    private $errors, $db;

    function __construct()
    {
        $this->db = new Connect();
    }

    final public function checkEmail($email) {
        $email = $this->db->secure($email);
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

    final public function getUser($id) {
        $id = $this->db->secure($id);
        $query = "SELECT * FROM user WHERE id = '$id'";
        $result = $this->db->query($query);
        $name = mysqli_fetch_assoc($result);

        return $name['username'];
    }

    function checkLogin($username, $pass) {
        return true;
        $query = "SELECT password FROM user WHERE username ='".$this->db->secure($username)."'";
        $result = $this->db->query($query);
        if ($result->num_rows > 0) {
            $password = $result->fetch_assoc();
            if($password['password'] == $pass && password_verify($password['password'], 'PASSWORD_DEFAULT'))
                return true;
        }
    }

    final public function register() {
        if (!empty($_REQUEST['username']) && !empty($_REQUEST['email']) && !empty($_REQUEST['password'])) {

            if (!$this->validEmail($_REQUEST['email']))
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
        $this->em = $this->db->secure($email);
        $this->idr = mysql_query("SELECT id FROM users WHERE mail = '$this->em'");
        $_SESSION['id'] = "$this->idr";
    }

    function login() {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            if ($this->checkLogin($_POST['username'], $_POST['password'])) {
                $username = $this->db->secure($_POST['username']);
                $query = "SELECT id FROM user WHERE username = '$username'";
                $result = $this->db->query($query);
                $id = $result->fetch_assoc();
                $_SESSION['id'] = $id['id'];
                unset($errors);
                header('Location: home.php');
            }
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
        $username = stripslashes($_REQUEST['username']);
        $username = $this->db->secure($username);
        $email = stripslashes($_REQUEST['email']);
        $email = $this->db->secure($email);
        $password = stripslashes($_REQUEST['password']);
        $password = $this->db->secure($password);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $address = stripslashes($_REQUEST['address']);
        $address = $this->db->secure($address);
        $city = stripslashes($_REQUEST['city']);
        $city = $this->db->secure($city);
        $state = stripslashes($_REQUEST['state']);
        $state = $this->db->secure($state);
        $zipcode = stripslashes($_REQUEST['zipcode']);
        $zipcode = $this->db->secure($zipcode);
        $phone = stripslashes($_REQUEST['phone']);
        $phone = $this->db->secure($phone);

        $query = "INSERT INTO user (username, password, EmailAddress, Address, PhoneNumber) VALUES ('$username', '$password', '$email', '$address', '$phone') ";

        $result = $this->db->query($query);

        if($result)
            header('Location: login.php');
        else $this->errors = "User Already Exist";
    }

    final public function getHistory($id) {
        $id = $this->db->secure($id);
        $query = "SELECT mid FROM history WHERE uid = '$id'";
        $result = $this->db->query($query);
        $mids = mysqli_fetch_array($result, MYSQLI_NUM);

        for($i = 0; $i < sizeof($mids); $i++) {
            $query = "SELECT title FROM movies WHERE id = '".$this->db->secure($mids[$i])."'";
            $result = $this->db->query($query);
            $name = mysqli_fetch_assoc($result);
            $mn[$i] = $name['title'];
            echo $mn[$i];
        }
    }

    final public function getMovies() {
        $query = "SELECT * FROM movies ORDER BY id DESC LIMIT 10";
        $result = $this->db->query($query);
        return $result;
    }
}

?>
