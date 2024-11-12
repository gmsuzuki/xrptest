<?php
class Check_txt
{
    private $checking_txt;
    private $max_input;
    private $checkig_txt_length;
    private $err_inclass;

    public function __construct($checkig_txt, $max_input)
    {

        $this->checking_txt = $checkig_txt;
        $this->max_input = $max_input;
    }
    // ゲッター系----------------------
    public function get_checking_txt()
    {
        return $this->checking_txt;
    }
    public function get_max_input()
    {
        return $this->max_input;
    }
    public function get_err_inclass()
    {
        return $this->err_inclass;
    }

    public function get_checkig_txt_length()
    {
        return $this->checkig_txt_length;
    }


    // セッター系
    public function set_checking_text($checkig_txt)
    {
        $this->checking_txt = $checkig_txt;
    }


    // チェック系系----------------------
    //  長さチェック
    public function check_length($check_length)
    {
        $text_length = mb_strlen($check_length);
        if ($text_length > $this->max_input) {
            $this->err_inclass = $this->max_input . "文字以内にしてねねね";
        } else {
            return  'true';
        }
    }

    // 変換系----------------------
    //長いときに短縮する★長さチェックと統合するかも
    public function too_long()
    {
        return mb_substr($this->checking_txt, 0, $this->max_input);
    }
    // htmlスペシャル
    public function hchars()
    {
        return htmlspecialchars($this->checking_txt, ENT_QUOTES, 'UTF-8');
    }
    // 改行コードを消します系
    public function tex_replace()
    {
        $array = array("\r\n", "\r", "\n");
        $replace_txt = str_replace($array, '', $this->checking_txt);
        $this->checkig_txt_length = mb_strlen($replace_txt);
        return $replace_txt;
    }
    // 改行コードもスペースもタブもすべて消します系
    public function all_replace()
    {
        $array = array(' ', '　', "\r\n", "\r", "\n", "\t");
        $all_replace_txt = str_replace($array, '', $this->checking_txt);
        $this->checkig_txt_length = mb_strlen($all_replace_txt);
        return $all_replace_txt;
    }
}