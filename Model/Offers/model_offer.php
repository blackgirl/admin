<?php
    class Model_Offer {
        public $id;
        public $title;
        public $link;
        public $description;
        public $images;
        public $cases;
        public $attachments;
        public $estimate;
        public $dnv;

        // $technologies = Array( Array( text => "JavaScript", value => "js"), Array(),)
        // $expertises = Array( Array( text => "Project Management", value => "pm"), Array(),)

        function __construct($title = '', $description = '', $cases = '',$attachments = '', $estimate = '',$id = '', $link = '',  $images = [],$dnv = false) {
            $this->id = $id;
            $this->title = $title;
            $this->link = $link;
            $this->description = $description;
            $this->cases = $cases;
            $this->images = $images;
            $this->dnv = $dnv;
            $this->attachments = $attachments;
            $this->estimate = $estimate;
        }
    }
?>