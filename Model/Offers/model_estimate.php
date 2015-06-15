<?php
    class Model_Estimate {
        public $id;
        public $task;
        public $hrs;
        public $cost;
        // public $total;

        // estimation = [{'task': task, 'hrs': hrs, 'cost': cost},{}];
        function __construct($task = '', $hrs = '', $cost = '',$id = ''){
            $this->id = $id;
            $this->task = $task;
            $this->hrs = $hrs;
            $this->cost = $cost;
            // $this->total = $total;
        }
    }
?>