<?php

class Check_radio {

    private $checking_radio;
    private $max_radio;
    private $all_radio = array();
    private $err_inclass;

    public function __construct($checkig_radio, $max_radio)
    {

        $this->checking_radio = $checkig_radio;
        $this->max_radio = $max_radio;
        for ($i = 1; $i <= $max_radio; $i++) {
          $this->all_radio[] = $i;
    }
  }


  

    // ゲッター系----------------------
    public function get_checking_radio()
    {
        return $this->checking_radio;
    }
    public function get_max_radio()
    {
        return $this->max_radio;
    }
        public function get_all_radio()
    {
        return $this->all_radio;
    }
    public function get_err_inclass()
    {
        return $this->err_inclass;
    }


  
        // チェック系系----------------------
        //  長さチェック
        public function check_radio($checked_radio){
          if(!in_array($checked_radio, $this->all_radio)) {
            $this->err_inclass = "謎の選択をしていますよ";
        } else {
            return  'true';
        }
      }

}


?>