<?php

require_once ('users.php');

class Core
{

    private $users, $url;

    function __construct($url) {
        $this->users = new Users();
        $this->url = $url;
    }

    function load() {

        if(!isset($_SESSION ['id'])) {
            switch ($this->url) {
                case 'register':
                    $this->users->register();
                    break;
                case 'login':
                    $this->users->login();
                    break;
            }
        } else {
            switch ($this->url) {
                case 'register':
                    header('Location: home.php');
                    break;
                case 'login':
                    header('Location: home.php');
                    break;
            }
        }
    }
}

?>