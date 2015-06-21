<?php
    class Model_Project {
        public $id;
        public $title;
        public $link;
        public $description;
        public $keyftrs;
        public $images;
        // public $cases;
        public $expertises;
        public $technologies;
        public $nda;

        // $technologies = Array( Array( text => "JavaScript", value => "js"), Array(),)
        // $expertises = Array( Array( text => "Project Management", value => "pm"), Array(),)

        function __construct($title = '', $description = '', $keyftrs = '', $images = [],/*$cases = [],*/ $expertises = NULL, $technologies = NULL, $id = '', $link = NULL,$nda = false) {
            $this->id = $id;
            $this->title = $title;
            $this->link = $link;
            $this->description = $description;
            $this->keyftrs = $keyftrs;
            $this->images = $images;
            // $this->cases = $cases;
            $this->nda = $nda;
            $this->expertises = $expertises;
            $this->technologies = $technologies;
        }
    }
?>