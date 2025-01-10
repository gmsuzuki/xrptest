<?php 
class girlProfilelManager
{
    private $girlNumber;
    private $registrationDate;
    private $girlName;
    private $kanaName;
    private $girlAge;
    private $girlHeight;
    private $girlBustSize;
    private $girlBustCup;
    private $girlWest;
    private $girlHip;
    private $TrialShift;

    // コンストラクタ
    public function __construct($data = [])
    {
        $this->girlNumber = isset($data['girlNumber']) ? $data['girlNumber'] : null;
        $this->registrationDate = isset($data['registrationDate']) ? $data['registrationDate'] : null;
        $this->girlName = isset($data['girlName']) ? $data['girlName'] : null;
        $this->kanaName = isset($data['kanaName']) ? $data['kanaName'] : null;
        $this->girlAge = isset($data['girlAge']) ? $data['girlAge'] : null;
        $this->girlHeight = isset($data['girlHeight']) ? $data['girlHeight'] : null;
        $this->girlBustSize = isset($data['girlBustSize']) ? $data['girlBustSize'] : null;
        $this->girlBustCup = isset($data['girlBustCup']) ? $data['girlBustCup'] : null;
        $this->girlWest = isset($data['girlWest']) ? $data['girlWest'] : null;
        $this->girlHip = isset($data['girlHip']) ? $data['girlHip'] : null;
        $this->TrialShift = isset($data['TrialShift']) ? $data['TrialShift'] : null;
    }

    // ゲッター（getter）
    public function getGirlNumber() {
        return $this->girlNumber;
    }
    public function getRegistrationDate() {
        return $this->registrationDate;
    }

    public function getGirlName() {
        return $this->girlName;
    }

    public function getKanaName() {
        return $this->kanaName;
    }

    public function getgirlAge() {
        return $this->girlAge;
    }

    public function getGirlHeight() {
        return $this->girlHeight;
    }

    public function getGirlBustSize() {
        return $this->girlBustSize;
    }

    public function getGirlBustCup() {
        return $this->girlBustCup;
    }

    public function getGirlWest() {
        return $this->girlWest;
    }

    public function getGirlHip() {
        return $this->girlHip;
    }

    public function getTrialShift() {
        return $this->TrialShift;
    }


    // セッター（setter）
    public function setgirlNumber($girlNumber) {
        $this->girlNumber = $girlNumber;
    }

    public function setRegistrationDate($registrationDate) {
        $this->registrationDate = $registrationDate;
    }
    public function setGirlName($girlName) {
        $this->girlName = $girlName;
    }

    public function setKanaName($kanaName) {
        $this->kanaName = $kanaName;
    }

    public function setgirlAge($girlAge) {
        $this->girlAge = $girlAge;
    }

    public function setGirlHeight($girlHeight) {
        $this->girlHeight = $girlHeight;
    }

    public function setGirlBustSize($girlBustSize) {
        $this->girlBustSize = $girlBustSize;
    }

    public function setGirlBustCup($girlBustCup) {
        $this->girlBustCup = $girlBustCup;
    }

    public function setGirlWest($girlWest) {
        $this->girlWest = $girlWest;
    }

    public function setGirlHip($girlHip) {
        $this->girlHip = $girlHip;
    }

    public function setTrialShift($TrialShift) {
        $this->TrialShift = $TrialShift;
    }


    // かなでソート
  public static function sortByKanaName(&$profiles)
    {
        usort($profiles, function($a, $b) {
            return strcmp($a->getKanaName(), $b->getKanaName());
        });
    }

    // プロフィールの表示関数
    public function getProfileDescription()
    {
        return "T{$this->getGirlHeight()} B{$this->getGirlBustSize()}({$this->getGirlBustCup()}) W{$this->getGirlWest()} H{$this->getGirlHip()}";
    }


}




// 画像管理
class girlImageManager
{
    private $girlNumber;
    private $girlImage01;
    private $girlImage02;
    private $girlImage03;
    private $girlImage04;
    private $girlImage05;
    private $girlImage06;
    private $girlImage07;
    private $girlImage08;
    private $girlImage09;
    private $girlImage10;
    private $girlgurabia01;
    private $girlgurabia02;
    private $girlgurabia03;
    private $girlgurabia04;
    private $girlgurabia05;
    private $girlmovie01 = null;
    private $girlmovie02 = null;
    private $girlmovie03 = null;
    private $girlmovie04 = null;
    private $girlmovie05 = null;

    // コンストラクタ
    public function __construct($girlNumber, $data = [])
    {
        $this->girlNumber =  $girlNumber;
        $this->girlImage01 = isset($data['girlImage01']) ? $data['girlImage01'] : null;
        $this->girlImage02 = isset($data['girlImage02']) ? $data['girlImage02'] : null;
        $this->girlImage03 = isset($data['girlImage03']) ? $data['girlImage03'] : null;
        $this->girlImage04 = isset($data['girlImage04']) ? $data['girlImage04'] : null;
        $this->girlImage05 = isset($data['girlImage05']) ? $data['girlImage05'] : null;
        $this->girlImage06 = isset($data['girlImage06']) ? $data['girlImage06'] : null;
        $this->girlImage07 = isset($data['girlImage07']) ? $data['girlImage07'] : null;
        $this->girlImage08 = isset($data['girlImage08']) ? $data['girlImage08'] : null;
        $this->girlImage09 = isset($data['girlImage09']) ? $data['girlImage09'] : null;
        $this->girlImage10 = isset($data['girlImage10']) ? $data['girlImage10'] : null;
        $this->girlgurabia01 = isset($data['girlgurabia01']) ? $data['girlgurabia01'] : null;
        $this->girlgurabia02 = isset($data['girlgurabia02']) ? $data['girlgurabia02'] : null;
        $this->girlgurabia03 = isset($data['girlgurabia03']) ? $data['girlgurabia03'] : null;
        $this->girlgurabia04 = isset($data['girlgurabia04']) ? $data['girlgurabia04'] : null;
        $this->girlgurabia05 = isset($data['girlgurabia05']) ? $data['girlgurabia05'] : null;
        $this->girlmovie01 = isset($data['girlmovie01']) ? $data['girlmovie01'] : null;
        $this->girlmovie02 = isset($data['girlmovie02']) ? $data['girlmovie02'] : null;
        $this->girlmovie03 = isset($data['girlmovie03']) ? $data['girlmovie03'] : null;
        $this->girlmovie04 = isset($data['girlmovie04']) ? $data['girlmovie04'] : null;
        $this->girlmovie05 = isset($data['girlmovie05']) ? $data['girlmovie05'] : null;
    }
    

    // ゲッター（getter）
    public function getGirlNumber() {
        return $this->girlNumber;
    }

    public function getGirlImage01() {
        return $this->girlImage01;
    }

    public function getGirlImage02() {
        return $this->girlImage02;
    }

    public function getGirlImage03() {
        return $this->girlImage03;
    }

    public function getGirlImage04() {
        return $this->girlImage04;
    }

    public function getGirlImage05() {
        return $this->girlImage05;
    }

    public function getGirlImage06() {
        return $this->girlImage06;
    }

    public function getGirlImage07() {
        return $this->girlImage07;
    }

    public function getGirlImage08() {
        return $this->girlImage08;
    }

    public function getGirlImage09() {
        return $this->girlImage09;
    }

    public function getGirlImage10() {
        return $this->girlImage10;
    }

    public function getGirlgurabia01() {
        return $this->girlgurabia01;
    }

    public function getGirlgurabia02() {
        return $this->girlgurabia02;
    }

    public function getGirlgurabia03() {
        return $this->girlgurabia03;
    }

    public function getGirlgurabia04() {
        return $this->girlgurabia04;
    }

    public function getGirlgurabia05() {
        return $this->girlgurabia05;
    }

    // セッター（setter）
    public function setgirlNumber($girlNumber) {
        $this->girlNumber = $girlNumber;
    }

    public function setGirlImage01($girlImage01) {
        $this->girlImage01 = $girlImage01;
    }

    public function setGirlImage02($girlImage02) {
        $this->girlImage02 = $girlImage02;
    }

    public function setGirlImage03($girlImage03) {
        $this->girlImage03 = $girlImage03;
    }

    public function setGirlImage04($girlImage04) {
        $this->girlImage04 = $girlImage04;
    }

    public function setGirlImage05($girlImage05) {
        $this->girlImage05 = $girlImage05;
    }

    public function setGirlImage06($girlImage06) {
        $this->girlImage06 = $girlImage06;
    }

    public function setGirlImage07($girlImage07) {
        $this->girlImage07 = $girlImage07;
    }

    public function setGirlImage08($girlImage08) {
        $this->girlImage08 = $girlImage08;
    }

    public function setGirlImage09($girlImage09) {
        $this->girlImage09 = $girlImage09;
    }

    public function setGirlImage10($girlImage10) {
        $this->girlImage10 = $girlImage10;
    }

    public function setGirlgurabia01($girlgurabia01) {
        $this->girlgurabia01 = $girlgurabia01;
    }

    public function setGirlgurabia02($girlgurabia02) {
        $this->girlgurabia02 = $girlgurabia02;
    }

    public function setGirlgurabia03($girlgurabia03) {
        $this->girlgurabia03 = $girlgurabia03;
    }

    public function setGirlgurabia04($girlgurabia04) {
        $this->girlgurabia04 = $girlgurabia04;
    }

    public function setGirlgurabia05($girlgurabia05) {
        $this->girlgurabia05 = $girlgurabia05;
    }


    // Setter for girlmovie01
    public function setGirlMovie01($movie) {
        $this->girlmovie01 = $movie;
    }

    // Getter for girlmovie01
    public function getGirlMovie01() {
        return $this->girlmovie01;
    }

    // Setter for girlmovie02
    public function setGirlMovie02($movie) {
        $this->girlmovie02 = $movie;
    }

    // Getter for girlmovie02
    public function getGirlMovie02() {
        return $this->girlmovie02;
    }

    // Setter for girlmovie03
    public function setGirlMovie03($movie) {
        $this->girlmovie03 = $movie;
    }

    // Getter for girlmovie03
    public function getGirlMovie03() {
        return $this->girlmovie03;
    }

    // Setter for girlmovie04
    public function setGirlMovie04($movie) {
        $this->girlmovie04 = $movie;
    }

    // Getter for girlmovie04
    public function getGirlMovie04() {
        return $this->girlmovie04;
    }

    // Setter for girlmovie05
    public function setGirlMovie05($movie) {
        $this->girlmovie05 = $movie;
    }

    // Getter for girlmovie05
    public function getGirlMovie05() {
        return $this->girlmovie05;
    }
}




// 特定の$attendanceNoに対応するgirlProfilelManagerのインスタンスを探す関数
function findGirlByAttendanceNo($attendanceNo, $girlProfiles)
{
    foreach ($girlProfiles as $girl) {
        if ($girl->getGirlNumber() == $attendanceNo) {
            return $girl;
        }
    }
    return null; // 見つからなかった場合
}   

// 画像０１を出す関数


// 指定した girlNumber の girlImage01 を取得する関数
function getGirlImageByNumber($girlImages, $girlNumber)
{
    foreach ($girlImages as $girlImage) {
        if ($girlImage->getGirlNumber() === $girlNumber) {
            return $girlImage->getGirlImage01();
        }
    }
    return null; // 該当する画像がない場合
}


// sns管理
class girlSnsManager {
    private $girlNumber;
    private $girlSnsX;
    private $girlSnsInsta;

    // コンストラクタ
    public function __construct($girlNumber, $data = []) {
        $this->girlNumber = $girlNumber;
        $this->girlSnsX = isset($data['X']) ? $data['X'] : null;
        $this->girlSnsInsta = isset($data['Insta']) ? $data['Insta'] : null;
    }

    // girlNumberのゲッター
    public function getGirlNumber() {
        return $this->girlNumber;
    }

    // girlSnsXのゲッター
    public function getGirlSnsX() {
        return $this->girlSnsX;
    }

    // girlSnsInstaのゲッター
    public function getGirlSnsInsta() {
        return $this->girlSnsInsta;
    }

      // girlNumberのセッター
    public function setGirlNumber($girlNumber) {
        $this->girlNumber = $girlNumber;
    }

    // girlSnsXのセッター
    public function setGirlSnsX($girlSnsX) {
        $this->girlSnsX = $girlSnsX;
    }

    // girlSnsInstaのセッター
    public function setGirlSnsInsta($girlSnsInsta) {
        $this->girlSnsInsta = $girlSnsInsta;
    }
}

// 指定した girlNumber の girlsns を取得する関数
function getGirlSnsByNumber($girlNumber,$girlSnses)
{
    foreach ($girlSnses as $girlSns) {
        if ($girlSns->getGirlNumber() === $girlNumber) {
            return [
                'X' => $girlSns->getGirlSnsX(),
                'Insta' => $girlSns->getGirlSnsInsta()
            ];
        }
    }
    return null; // 該当する画像がない場合
}


// オプション管理
class girlOptionManager
{
    private $girlNumber;
    private $option01;
    private $option02;
    private $option03;
    private $option04;
    private $option05;
    private $option06;
    private $option07;
    private $option08;
    private $option09;
    private $option10;




    public function __construct($girlNumber, $data = [])
    {
        $this->girlNumber =  $girlNumber;
        $this->option01 = isset($data['option01']) ? $data['option01'] : null;
        $this->option02 = isset($data['option02']) ? $data['option02'] : null;
        $this->option03 = isset($data['option03']) ? $data['option03'] : null;
        $this->option04 = isset($data['option04']) ? $data['option04'] : null;
        $this->option05 = isset($data['option05']) ? $data['option05'] : null;
        $this->option06 = isset($data['option06']) ? $data['option06'] : null;
        $this->option07 = isset($data['option07']) ? $data['option07'] : null;
        $this->option08 = isset($data['option08']) ? $data['option08'] : null;
        $this->option09 = isset($data['option09']) ? $data['option09'] : null;
        $this->option10 = isset($data['option10']) ? $data['option10'] : null;
     
    }
    // ゲッターとセッター

    public function getgirlNumber() {
        return $this->girlNumber;
    }

    public function setgirlNumber($girlNumber) {
        $this->girlNumber = $girlNumber;
    }

    public function getOption01() {
        return $this->option01;
    }

    public function setOption01($option01) {
        $this->option01 = $option01;
    }

    public function getOption02() {
        return $this->option02;
    }

    public function setOption02($option02) {
        $this->option02 = $option02;
    }

    public function getOption03() {
        return $this->option03;
    }

    public function setOption03($option03) {
        $this->option03 = $option03;
    }

    public function getOption04() {
        return $this->option04;
    }

    public function setOption04($option04) {
        $this->option04 = $option04;
    }

    public function getOption05() {
        return $this->option05;
    }

    public function setOption05($option05) {
        $this->option05 = $option05;
    }

    public function getOption06() {
        return $this->option06;
    }

    public function setOption06($option06) {
        $this->option06 = $option06;
    }

    public function getOption07() {
        return $this->option07;
    }

    public function setOption07($option07) {
        $this->option07 = $option07;
    }

    public function getOption08() {
        return $this->option08;
    }

    public function setOption08($option08) {
        $this->option08 = $option08;
    }

    public function getOption09() {
        return $this->option09;
    }

    public function setOption09($option09) {
        $this->option09 = $option09;
    }

    public function getOption10() {
        return $this->option10;
    }

    public function setOption10($option10) {
        $this->option10 = $option10;
    }

  public function getOptions() {
        return [
            'option01' => $this->option01,
            'option02' => $this->option02,
            'option03' => $this->option03,
            'option04' => $this->option04,
            'option05' => $this->option05,
            'option06' => $this->option06,
            'option07' => $this->option07,
            'option08' => $this->option08,
            'option09' => $this->option09,
            'option10' => $this->option10,
        ];
    }

    }

// オプション管理
class girlSpOptionManager
{
    private $girlNumber;
    private $spOption01;
    private $spOption02;
    private $spOption03;
    private $spOption04;
    private $spOption05;
    private $spOption06;
    private $spOption07;
    private $spOption08;
    private $spOption09;
    private $spOption10;

    public function __construct($girlNumber, $data = [])
    {
        $this->girlNumber =  $girlNumber;
        $this->spOption01 = isset($data['spOption01']) ? $data['spOption01'] : null;
        $this->spOption02 = isset($data['spOption02']) ? $data['spOption02'] : null;
        $this->spOption03 = isset($data['spOption03']) ? $data['spOption03'] : null;
        $this->spOption04 = isset($data['spOption04']) ? $data['spOption04'] : null;
        $this->spOption05 = isset($data['spOption05']) ? $data['spOption05'] : null;
        $this->spOption06 = isset($data['spOption06']) ? $data['spOption06'] : null;
        $this->spOption07 = isset($data['spOption07']) ? $data['spOption07'] : null;
        $this->spOption08 = isset($data['spOption08']) ? $data['spOption08'] : null;
        $this->spOption09 = isset($data['spOption09']) ? $data['spOption09'] : null;
        $this->spOption10 = isset($data['spOption10']) ? $data['spOption10'] : null;
    }

    public function getgirlNumber() {
        return $this->girlNumber;
    }

    public function setgirlNumber($girlNumber) {
        $this->girlNumber = $girlNumber;
    }

    public function getSpOption01() {
        return $this->spOption01;
    }

    public function setSpOption01($spOption01) {
        $this->spOption01 = $spOption01;
    }

    public function getSpOption02() {
        return $this->spOption02;
    }

    public function setSpOption02($spOption02) {
        $this->spOption02 = $spOption02;
    }

    public function getSpOption03() {
        return $this->spOption03;
    }

    public function setSpOption03($spOption03) {
        $this->spOption03 = $spOption03;
    }

    public function getSpOption04() {
        return $this->spOption04;
    }

    public function setSpOption04($spOption04) {
        $this->spOption04 = $spOption04;
    }

    public function getSpOption05() {
        return $this->spOption05;
    }

    public function setSpOption05($spOption05) {
        $this->spOption05 = $spOption05;
    }

    public function getSpOption06() {
        return $this->spOption06;
    }

    public function setSpOption06($spOption06) {
        $this->spOption06 = $spOption06;
    }

    public function getSpOption07() {
        return $this->spOption07;
    }

    public function setSpOption07($spOption07) {
        $this->spOption07 = $spOption07;
    }

    public function getSpOption08() {
        return $this->spOption08;
    }

    public function setSpOption08($spOption08) {
        $this->spOption08 = $spOption08;
    }

    public function getSpOption09() {
        return $this->spOption09;
    }

    public function setSpOption09($spOption09) {
        $this->spOption09 = $spOption09;
    }

    public function getSpOption10() {
        return $this->spOption10;
    }

    public function setSpOption10($spOption10) {
        $this->spOption10 = $spOption10;
    }

// オプションだけ取り出す
// sqlでは使わないかも
 public function getSpOptions() {
        return [
            'option01' => $this->spOption01,
            'option02' => $this->spOption02,
            'option03' => $this->spOption03,
            'option04' => $this->spOption04,
            'option05' => $this->spOption05,
            'option06' => $this->spOption06,
            'option07' => $this->spOption07,
            'option08' => $this->spOption08,
            'option09' => $this->spOption09,
            'option10' => $this->spOption10,
        ];
    }

}


// タグ管理
class girlTagManager
{
    private $girlNumber;
    private $sptag01;
    private $staffcomment;
    private $tag01;
    private $tag02;
    private $tag03;
    private $tag04;
    private $tag05;

    // コンストラクタ
    public function __construct($girlNumber, $data = [])
    {
        $this->girlNumber = $girlNumber;
        $this->sptag01 = isset($data['sptag01']) ? $data['sptag01'] : null;
        $this->staffcomment = isset($data['staffcomment']) ? $data['staffcomment'] : null;
        $this->tag01 = isset($data['tag01']) ? $data['tag01'] : null;
        $this->tag02 = isset($data['tag02']) ? $data['tag02'] : null;
        $this->tag03 = isset($data['tag03']) ? $data['tag03'] : null;
        $this->tag04 = isset($data['tag04']) ? $data['tag04'] : null;
        $this->tag05 = isset($data['tag05']) ? $data['tag05'] : null;
    }

    // ゲッターとセッター
    public function getGirlNumber()
    {
        return $this->girlNumber;
    }

    public function setGirlNumber($girlNumber)
    {
        $this->girlNumber = $girlNumber;
    }

    public function getSptag01()
    {
        return $this->sptag01;
    }

    public function setSptag01($sptag01)
    {
        $this->sptag01 = $sptag01;
    }


    public function getStaffcomment()
    {
        return $this->staffcomment;
    }

    public function setStaffcomment($staffcomment)
    {
        $this->staffcomment = $staffcomment;
    }


    public function getTag01()
    {
        return $this->tag01;
    }

    public function setTag01($tag01)
    {
        $this->tag01 = $tag01;
    }

    public function getTag02()
    {
        return $this->tag02;
    }

    public function setTag02($tag02)
    {
        $this->tag02 = $tag02;
    }

    public function getTag03()
    {
        return $this->tag03;
    }

    public function setTag03($tag03)
    {
        $this->tag03 = $tag03;
    }

    public function getTag04()
    {
        return $this->tag04;
    }

    public function setTag04($tag04)
    {
        $this->tag04 = $tag04;
    }

    public function getTag05()
    {
        return $this->tag05;
    }


}

function getGirlTagByNumber($girlNumber,$girlTags)
{
    foreach ($girlTags as $tag) {
        if ($tag->getGirlNumber() === $girlNumber) {
            return  $tag;
        }
    }
    return null; // 該当する画像がない場合
}





// 質問管理
class girlQuestionManager
{
    private $girlNumber;
    private $answer01;
    private $answer02;
    private $answer03;
    private $answer04;
    private $answer05;
    private $answer06;
    private $answer07;
    private $answer08;
    private $answer09;
    private $answer10;

    public function __construct($girlNumber, $data = [])
    {   
        $this->girlNumber =  $girlNumber;
        $this->answer01 = isset($data['answer01']) ? $data['answer01'] : null;
        $this->answer02 = isset($data['answer02']) ? $data['answer02'] : null;
        $this->answer03 = isset($data['answer03']) ? $data['answer03'] : null;
        $this->answer04 = isset($data['answer04']) ? $data['answer04'] : null;
        $this->answer05 = isset($data['answer05']) ? $data['answer05'] : null;
        $this->answer06 = isset($data['answer06']) ? $data['answer06'] : null;
        $this->answer07 = isset($data['answer07']) ? $data['answer07'] : null;
        $this->answer08 = isset($data['answer08']) ? $data['answer08'] : null;
        $this->answer09 = isset($data['answer09']) ? $data['answer09'] : null;
        $this->answer10 = isset($data['answer10']) ? $data['answer10'] : null;
    }

    // ゲッターとセッター

    public function getgirlNumber() {
        return $this->girlNumber;
    }

    public function setgirlNumber($girlNumber) {
        $this->girlNumber = $girlNumber;
    }

    public function getAnswer01() {
        return $this->answer01;
    }

    public function setAnswer01($answer01) {
        $this->answer01 = $answer01;
    }

    public function getAnswer02() {
        return $this->answer02;
    }

    public function setAnswer02($answer02) {
        $this->answer02 = $answer02;
    }

    public function getAnswer03() {
        return $this->answer03;
    }

    public function setAnswer03($answer03) {
        $this->answer03 = $answer03;
    }

    public function getAnswer04() {
        return $this->answer04;
    }

    public function setAnswer04($answer04) {
        $this->answer04 = $answer04;
    }

    public function getAnswer05() {
        return $this->answer05;
    }

    public function setAnswer05($answer05) {
        $this->answer05 = $answer05;
    }

    public function getAnswer06() {
        return $this->answer06;
    }

    public function setAnswer06($answer06) {
        $this->answer06 = $answer06;
    }

    public function getAnswer07() {
        return $this->answer07;
    }

    public function setAnswer07($answer07) {
        $this->answer07 = $answer07;
    }

    public function getAnswer08() {
        return $this->answer08;
    }

    public function setAnswer08($answer08) {
        $this->answer08 = $answer08;
    }

    public function getAnswer09() {
        return $this->answer09;
    }

    public function setAnswer09($answer09) {
        $this->answer09 = $answer09;
    }

    public function getAnswer10() {
        return $this->answer10;
    }

    public function setAnswer10($answer10) {
        $this->answer10 = $answer10;
    }
}