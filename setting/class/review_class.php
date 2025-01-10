<?php
// ナンバー,ユーザー名前,mail,入った女の子,利用日,利用コース,評価１,評価2,評価3,評価4,評価5,タイトル,内容,承認
class ReviewManager
{
  private $reviewNumber;
  private $userNumber;
  private $employeeNumber;
  private $playDate;
  private $playTime;
  private $rate01;
  private $rate02;
  private $rate03;
  private $rate04;
  private $rate05;
  private $reviewTitle;
  private $reviewBody;
  private $approval;
 

      public function __construct($data = []){

        $this->reviewNumber = isset($data["reviewNumber"]) ? $data["reviewNumber"] : null;
        $this->userNumber = isset($data["userNumber"]) ? $data["userNumber"] : null;
        $this->employeeNumber = isset($data["employeeNumber"]) ? $data["employeeNumber"] : null;
        $this->playDate = isset($data["playDate"]) ? $data["playDate"] : null;
        $this->playTime = isset($data["playTime"]) ? $data["playTime"] : null;
        $this->rate01 = isset($data["rate01"]) ? $data["rate01"] : null;
        $this->rate02 = isset($data["rate02"]) ? $data["rate02"] : null;
        $this->rate03 = isset($data["rate03"]) ? $data["rate03"] : null;
        $this->rate04 = isset($data["rate04"]) ? $data["rate04"] : null;
        $this->rate05 = isset($data["rate05"]) ? $data["rate05"] : null;
        $this->reviewTitle = isset($data["reviewTitle"]) ? $data["reviewTitle"] : null;
        $this->reviewBody = isset($data["reviewBody"]) ? $data["reviewBody"] : null;
        $this->approval = isset($data["approval"]) ? $data["approval"] : null;
    }


   // 平均を計算する関数
    public function calculateAverageRate()
    {
        $rates = [$this->rate01, $this->rate02, $this->rate03, $this->rate04, $this->rate05];
        $validRates = array_filter($rates, function ($rate) {
            return is_numeric($rate);
        });

        // 有効な評価があれば平均を計算する
        if (count($validRates) > 0) {
            return array_sum($validRates) / count($validRates);
        }

        // 評価がすべて無効ならnullを返す
        return null;
    }


    // ゲッター
    public function getReviewNumber()
    {
        return $this->reviewNumber;
    }
    public function getUserNumber()
    {
        return $this->userNumber;
    }

   
    public function getEmployeeNumber()
    {
        return $this->employeeNumber;
    }

    public function getPlayDate()
    {
        return $this->playDate;
    }

    public function getPlayTime()
    {
        return $this->playTime;
    }

    public function getRate01()
    {
        return $this->rate01;
    }

    public function getRate02()
    {
        return $this->rate02;
    }

    public function getRate03()
    {
        return $this->rate03;
    }

    public function getRate04()
    {
        return $this->rate04;
    }

    public function getRate05()
    {
        return $this->rate05;
    }

    public function getReviewTitle()
    {
        return $this->reviewTitle;
    }

    public function getReviewBody()
    {
        return $this->reviewBody;
    }

    public function getApproval()
    {
        return $this->approval;
    }

    public function getAverageStar(){
      $total = $this->rate01 + $this->rate02 + $this->rate03 + $this->rate04 + $this->rate05;
      // 平均を計算
        $average = $total / 5;
        return $average;
    }

    public function getNgwordCheck($text){
    // メールアドレスの正規表現パターン
    $patterns = array(
        '/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}/',
        '/\b(https?|ftp):\/\/\S+\b/',
        '/<[^>]*>/',
        '/<script\b[^>]*>[\s\S]*?<\/script>/',
        '/死ね|殺す|本盤|やれる|円|店外/'
    );
  
    // テキスト内でメールアドレスおよびURLのパターンを検索 
    foreach ($patterns as $pattern) {
        $text = preg_replace($pattern, '<span style="color: red;">$0</span>', $text);
    }

    return $text;
}


    // セッター
    public function setReviewNumber($reviewNumber)
    {
        $this->reviewNumber = $reviewNumber;
    }
    public function setUserNumber($userNumber)
    {
        $this->userNumber = $userNumber;
    }


    public function setEmployeeNumber($employeeNumber)
    {
        $this->employeeNumber = $employeeNumber;
    }

    public function setPlayDate($playDate)
    {
        $this->playDate = $playDate;
    }

    public function setPlayTime($playTime)
    {
        $this->playTime = $playTime;
    }

    public function setRate01($rate01)
    {
        $this->rate01 = $rate01;
    }

    public function setRate02($rate02)
    {
        $this->rate02 = $rate02;
    }

    public function setRate03($rate03)
    {
        $this->rate03 = $rate03;
    }

    public function setRate04($rate04)
    {
        $this->rate04 = $rate04;
    }

    public function setRate05($rate05)
    {
        $this->rate05 = $rate05;
    }

    public function setReviewTitle($reviewTitle)
    {
        $this->reviewTitle = $reviewTitle;
    }

    public function setReviewBody($reviewBody)
    {
        $this->reviewBody = $reviewBody;
    }

    public function setApproval($approval)
    {
        $this->approval = $approval;
    }
    
    // チェッカーメールアドレスがあればtrue
    public function checkWord() {
        $text = $this->reviewTitle . $this->reviewBody;
    // メールアドレスを検出する正規表現パターン
    $emailPattern = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}/';

    // URLを検出する正規表現パターン
    $urlPattern = '/\b(?:https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|]/i';

    // HTMLタグを検出する正規表現パターン
    $htmlPattern = '/<[^>]*>/';

    // JavaScriptコードを検出する正規表現パターン
    $jsPattern = '/<script\b[^>]*>[\s\S]*?<\/script>/';

    //  特定の不適切な言葉を検出する正規表現パターン
    $inappropriateWordsPattern =  '/(死ね|殺す|ブス|デブ)/u';

    // テキスト内でこれらの要素が一致しないかを確認
    if (preg_match($emailPattern, $text) || preg_match($urlPattern, $text) ||
        preg_match($htmlPattern, $text) || preg_match($jsPattern, $text) ||
        preg_match($inappropriateWordsPattern, $text)) {
        return true; // メールアドレス、URL、HTML、JavaScriptが含まれている
    } else {
        return false; // メールアドレス、URL、HTML、JavaScriptが含まれていない
    }
}

}