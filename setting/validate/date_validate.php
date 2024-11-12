<?php

class Check_date {

    private $input_date;
    private $err_inclass;

    public function __construct($inpu_date)
    {

        $this->input_date = $inpu_date;
    }



    // ゲッター系----------------------
    public function get_input_date()
    {
        return $this->input_date;
    }
    
      
    public function get_err_inclass()
    {
        return $this->err_inclass;
    }

    // 日付なのか？チェック系

    public function is_this_date(){
       try {
        $date = new DateTime($this->get_input_date(), new DateTimeZone('UTC'));
        return  true;
    } catch (Exception $e) {
      $this->err_inclass = '日付以外が入っているよ: ' . $e->getMessage();
    }

    }
    
    //曜日を漢字で返す 
        public function day_of_the_week(){}

  }
  

// 文章に連絡先などが入っていないか？



?>