<?php 

class SchedulePanel{

    private $panelName;
    private $panelImage;
    private $panelAge;
    private $panelHeight;
    private $panelBustSize;
    private $panelBustCup;
    private $panelWest;
    private $panelHip;
    private $panelStarttime;
    private $panelEndtime;
    private $panelMovie;
    private $panelTag;
    private $panelComment;
    private $panelSns01;
    private $panelSns02;
    private $panelNewgirl;
    private $panelTrialShift;
    private $panelGonaw;

    public static $count=0;

public function __construct()
    {
        // 全てのプロパティを初期化
        $this->panelName = null;
        $this->panelImage = null;
        $this->panelAge = null;
        $this->panelHeight = null;
        $this->panelBustSize = null;
        $this->panelBustCup = null;
        $this->panelWest = null;
        $this->panelHip = null;
        $this->panelStarttime = "00:00:00"; // 初期値を設定;
        $this->panelEndtime =  "00:00:00"; // 初期値を設定
        $this->panelMovie = false;
        $this->panelTag = null;
        $this->panelComment = null;
        $this->panelSns01 = null;
        $this->panelSns02 = null;
        $this->panelNewgirl = false;
        $this->panelTrialShift = false;
        $this->panelGonaw = false;
   
        self::$count++;
    }

    public function getPanelName() {
        return $this->panelName;
    }

    public function setPanelName($panelName) {
        $this->panelName = $panelName;
    }

    public function getPanelImage() {
        return $this->panelImage;
    }

    public function setPanelImage($panelImage) {
        $this->panelImage = $panelImage;
    }

    public function getPanelAge() {
        return $this->panelAge;
    }

    public function setPanelAge($panelAge) {
        $this->panelAge = $panelAge;
    }

    public function getPanelHeight() {
        return $this->panelHeight;
    }

    public function setPanelHeight($panelHeight) {
        $this->panelHeight = $panelHeight;
    }

    public function getPanelBustSize() {
        return $this->panelBustSize;
    }

    public function setPanelBustSize($panelBustSize) {
        $this->panelBustSize = $panelBustSize;
    }

    public function getPanelBustCup() {
        return $this->panelBustCup;
    }

    public function setPanelBustCup($panelBustCup) {
        $this->panelBustCup = $panelBustCup;
    }

    public function getPanelWest() {
        return $this->panelWest;
    }

    public function setPanelWest($panelWest) {
        $this->panelWest = $panelWest;
    }

    public function getPanelHip() {
        return $this->panelHip;
    }

    public function setPanelHip($panelHip) {
        $this->panelHip = $panelHip;
    }

    public function getPanelStarttime() {
        return $this->panelStarttime;
    }

    public function setPanelStarttime($panelStarttime) {
        $this->panelStarttime = $panelStarttime;
    }

    public function getPanelEndtime() {
        return $this->panelEndtime;
    }

    public function setPanelEndtime($panelEndtime) {
        $this->panelEndtime = $panelEndtime;
    }


// タグとCommentは一気に
    public function getPanelTag() {
        return $this->panelTag;
    }


    public function getPanelComment() {
        return $this->panelComment;
    }



    // x
    public function getPanelSns01() {
        return $this->panelSns01;
    }


    // tiktok
    public function getPanelSns02() {
        return $this->panelSns02;
    }


    //  新人かどうか？
    
    public function getPanelNewgirl() {
        return $this->panelNewgirl;
    }

    public function setPanelNewgirl($panelNewgirl) {
        $this->panelNewgirl = $panelNewgirl;
    }

    //   体入かどうか？
    
    public function getPanelTrialShift() {
        return $this->panelTrialShift;
    }

    public function setPanelTrialShift($panelTrialShift) {
        $this->panelTrialShift = $panelTrialShift;
    }


    // 今すぐ行けるか？
    public function getPanelGonaw() {
        return $this->panelGonaw;
    }

    public function setPanelGonaw($panelGonaw) {
        $this->panelGonaw = $panelGonaw;
    }

    //profileを入力

    public function setHerProfile($profile){
        
        $this->panelName = $profile->getGirlName();
        $this->panelAge = $profile->getGirlAge();
        $this->panelHeight = $profile->getGirlHeight();
        $this->panelBustSize = $profile->getGirlBustSize();
        $this->panelBustCup = $profile->getGirlBustCup();
        $this->panelWest = $profile->getGirlWest();
        $this->panelHip = $profile->getGirlHip();
        $this->panelTrialShift = $profile->getTrialShift();
    }


   // プロフィールの表示関数
    public function getProfileDescription()
    {
        return "T{$this->getPanelHeight()} B{$this->getPanelBustSize()}({$this->getPanelBustSize()}) W{$this->getPanelWest()} H{$this->getpanelHip()}";
    }



    // panel写真はセッターでよいか
    


    //スタートエンド
      public function setHerSchedule($schedule){
        $this -> panelStarttime = $schedule ->getWorkStartTime();
        $this -> panelEndtime = $schedule ->getWorkEndTime();
    }


    // movie
 // girlImageManagerのインスタンスをチェックして$panelMovieを設定する関数
    public function setPanelMovieStatus(girlImageManager $girlImageManager) {
        $movies = [
            $girlImageManager->getGirlMovie01(),
            $girlImageManager->getGirlMovie02(),
            $girlImageManager->getGirlMovie03(),
            $girlImageManager->getGirlMovie04(),
            $girlImageManager->getGirlMovie05()
        ];

        // 配列の中にnull以外の値があればtrue、全てnullならfalse
        $this->panelMovie = array_filter($movies, function($movie) {
        return $movie !== null;
        }) ? true : false;
    }

    // panelMovieの値を取得するGetter
    public function getPanelMovieStatus() {
        return $this->panelMovie;
    }

    // タグはスペシャルタグとスタッフコメント  
    // $panelTag;

      public function setHerTag($sptag){
         $this -> panelTag = $sptag -> getSptag01();
         $this -> panelComment = $sptag -> getStaffcomment();
      }

    //   sns
public function setHerSns($Sns) {
    // $Sns[0] に格納されている 'X' と 'Insta' を各プロパティにセット
    $this->panelSns01 = isset($Sns['X']) ? $Sns['X'] : null;   // 'X' を panelSns01 に
    $this->panelSns02 = isset($Sns['Insta']) ? $Sns['Insta'] : null; // 'Insta' を panelSns02 に
}





    //  $panelNewgirl;
    //  $panelGonaw;


}