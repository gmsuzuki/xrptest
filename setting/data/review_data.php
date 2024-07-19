<?php
// ナンバー,ユーザー名前,mail,入った女の子,利用日,利用コース,評価１,評価2,評価3,評価4,評価5,タイトル,内容,承認
class ReviewManager
{
  private $reviewNumber;
  private $userNumber;
  private $userName;
  private $userEmail;
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
  private $registrant;
 

      public function __construct($data){
        $this->reviewNumber = $data["レビュー番号"];
        $this->userNumber = $data["会員番号"];
        $this->userName = $data["ユーザー名前"];
        $this->userEmail = $data["メールアドレス"];
        $this->employeeNumber = $data["指名社員番号"];
        $this->playDate = $data["利用日"];
        $this->playTime = $data["プレイタイム"];
        $this->rate01 = $data["評価1"];
        $this->rate02 = $data["評価2"];
        $this->rate03 = $data["評価3"];
        $this->rate04 = $data["評価4"];
        $this->rate05 = $data["評価5"];
        $this->reviewTitle = $data["レビュータイトル"];
        $this->reviewBody = $data["レビュー本文"];
        $this->registrant = $data["承認"];
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

    public function getUserName()
    {
        return $this->userName;
    }

    public function getUserEmail()
    {
        return $this->userEmail;
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

    public function getRegistrant()
    {
        return $this->registrant;
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

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
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

    public function setRegistrant($registrant)
    {
        $this->registrant = $registrant;
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

    // テキスト内でこれらの要素が一致しないかを確認
    if (preg_match($emailPattern, $text) || preg_match($urlPattern, $text) ||
        preg_match($htmlPattern, $text) || preg_match($jsPattern, $text)) {
        return true; // メールアドレス、URL、HTML、JavaScriptが含まれている
    } else {
        return false; // メールアドレス、URL、HTML、JavaScriptが含まれていない
    }
}

}


?>



<!-- レビュー承認待ち -->
<?php

$approvalPendings = [
    [
        "レビュー番号" => 11,
        "会員番号" => 1,
        "ユーザー名前" => '未だめん',
        "メールアドレス" => '1234@gmail.com',
        "指名社員番号" => 3,
        "利用日" => '2023-09-02',
        "プレイタイム" => 90,
        "評価1" => 1,
        "評価2" => 1,
        "評価3" => 1,
        "評価4" => 1,
        "評価5" => 1,
        "レビュータイトル" => 'このやろう',
        "レビュー本文" => '死ねよきゃっきゃしながら歌って踊って完璧でしたわ',
        "承認" => 0
    ],
    [
        "レビュー番号" => 12,
        "会員番号" => 3,
        "ユーザー名前" => 'これから太郎',
        "メールアドレス" => '1234@gmail.com',
        "指名社員番号" => 4,
        "利用日" => '2023-08-12',
        "プレイタイム" => 120,
        "評価1" => 5,
        "評価2" => 3,
        "評価3" => 2,
        "評価4" => 5,
        "評価5" => 5,
        "レビュータイトル" => '金返せ',
        "レビュー本文" => '死ねてれてれてabc@gmail.comえこのままじゃいけてしまう',
        "承認" => 0
    ],
    [
        "レビュー番号" => 13,
        "会員番号" => 5,
        "ユーザー名前" => '承認太郎',
        "メールアドレス" => '1234@gmail.com',
        "指名社員番号" => 1,
        "利用日" => '2023-08-10',
        "プレイタイム" => 60,
        "評価1" => 5,
        "評価2" => 2,
        "評価3" => 5,
        "評価4" => 4,
        "評価5" => 5,
        "レビュータイトル" => 'ほれてまう',
        "レビュー本文" => '好きです大好きすごい、とにかくすごいすごすぎる',
        "承認" => 0
    ],
    [
        "レビュー番号" => 14,
        "会員番号" => null,
        "ユーザー名前" => 'これはだめ',
        "メールアドレス" => '1234@gmail.com',
        "指名社員番号" => 5,
        "利用日" => '2023-11-01',
        "プレイタイム" => 90,
        "評価1" => 5,
        "評価2" => 1,
        "評価3" => 4,
        "評価4" => 5,
        "評価5" => 4,
        "レビュータイトル" => 'きになるき',
        "レビュー本文" => 'きみかわうぃーね文句を言ってしまうのが僕の悪い癖ね文句を言ってしまうのが僕の悪い癖',
        "承認" => 0
    ],
];


 
?>