<?php
    class Model_Offer {
        public $id;
        public $title;
        public $link;
        public $description;
        public $estimation;
        public $total;

        // estimation = [{'task': task, 'hrs': hrs, 'cost': cost}];
        function __construct($title = '', $link = '', $description = '', $estimation = '', $total = 0, $id = '') {
            $this->id = $id;
            $this->title = $title;
            $this->link = $link;
            $this->description = $description;
            $this->estimation = $estimation;
            $this->total = $total;
        }
    }
?>