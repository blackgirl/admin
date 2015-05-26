<?php
    class Model_User {
        public $username;
        public $password;
        public $email;
        public $fullname;
        public $id;
        function __construct($username = '', $password = '', $email = '', $fullname = '', $id = ''){
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->fullname = $fullname;
            $this->id = $id;
        }
    }
?>