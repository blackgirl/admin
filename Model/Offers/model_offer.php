<?php
    class Model_Offer {
        public $id;
        public $title;
        public $link;
        public $description;
        public $estimation;
        public $total;
        public $attachments;
        public $cases;

        // estimation = [{'task': task, 'hrs': hrs, 'cost': cost},{}];
        // $result[$i]['file_name'] = $imgs['file_name'];
        // $result[$i]['file_type'] = $imgs['file_type'];
        function __construct($title = '', $link = '', $description = '', $estimation = [], $id = '',$attachments = [],$cases = []) {
            $this->id = $id;
            $this->title = $title;
            $this->link = $link;
            $this->description = $description;
            $this->estimation = $estimation;
            $this->attachments = $attachments;
            $this->cases = $cases;
        }
    }
?>