<?php
    class Model_Offer {
        public $id;
        public $title;
        public $link;
        public $description;
        public $estimation;
        public $total;
        public $images;

        // estimation = [{'task': task, 'hrs': hrs, 'cost': cost},{}];
        function __construct($title = '', $link = '', $description = '', $estimation = [], $id = '',$images = []) {
            $this->id = $id;
            $this->title = $title;
            $this->link = $link;
            $this->description = $description;
            $this->estimation = $estimation;
            $this->images = $images;
            // $this->total = $total;
        }
    }
?>