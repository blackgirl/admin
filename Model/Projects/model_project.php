<?php
    class Model_Project {
        public $id;
        public $title;
        public $link;
        public $description;
        public $keyftrs;
        public $images;
        public $expertises;
        public $technologies;
        public $dnv;

        // $technologies = Array( Array( text => "JavaScript", value => "js"), Array(),)
        // $expertises = Array( Array( text => "Project Management", value => "pm"), Array(),)

        function __construct($title = '', $description = '', $keyftrs = '', $images = [], $expertises = '', $technologies = '', $id = '', $link = '',$dnv = false) {
            $this->id = $id;
            $this->title = $title;
            $this->link = $link;
            $this->description = $description;
            $this->keyftrs = $keyftrs;
            $this->images = $images;
            $this->dnv = $dnv;
            $this->expertises = $expertises;
            $this->technologies = $technologies;
        }
    }
?>