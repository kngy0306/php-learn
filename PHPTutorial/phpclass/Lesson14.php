<?php

  class Student{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    function cal_avg($data){
        $sum = 0;
        for($i = 0; $i < count($data); $i++){
          $sum += $data[$i];
        }
        $avg = $sum / count($data);
        return $avg;
    }

    function judge($avg){
      $result = $avg >= 60 ? 'passed' : 'failed';
      return $result;
    }
  }

$a001 = new Student("kona");
$data = [70, 65, 50, 90, 30];
$avg = $a001->cal_avg($data);
$result = $a001->judge($avg);

echo count($data)."\n";
echo $a001->name."\n";
echo $avg."\n";
echo $result . "/n";