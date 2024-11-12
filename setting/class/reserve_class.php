<?php
class Reservation
{
    // 承認 
    private $approval;
    // 予約ナンバー
    private $reserveNo;
    // 誰が予約を作ったか？1スタッフ２キャスト３客
    private $reserveType;
    // 予約客は会員1か新規2か？
    private $reserveCustomerType;
    // 予約客のナンバーは？
    private $reserveCustomerNum;
    // 予約した女性は？
    private $reserveGirlNum;
    // 予約日取りは？
    private $reservePlayDay;
    // 予約時間は？
    private $reservePlaytime;
    // 予約コースは？
    private $reservePlayCourse;
    // プレイ場所はホテル自宅？
    private $reservePlaySpace;
    // 予約したホテルのエリアは
    private $reservePlayArea;
    // 予約した人の自宅住所は
    private $reservePlayAdress;
    // オプション１−１０
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
    // コスプレ番号
    private $cosplay;
    // コメントあれば
    private $comment;

    public function __construct($data = [])
    {
        $this->approval = isset($data["approval"]) ? $data["approval"] : null;
        $this->reserveNo = isset($data["reserveNo"]) ? $data["reserveNo"] : null;
        $this->reserveType = isset($data["reserveType"]) ? $data["reserveType"] : null;
        $this->reserveCustomerType = isset($data["reserveCustomerType"]) ? $data["reserveCustomerType"] : null;
        $this->reserveCustomerNum = isset($data["reserveCustomerNum"]) ? $data["reserveCustomerNum"] : null;
        $this->reserveGirlNum = isset($data["reserveGirlNum"]) ? $data["reserveGirlNum"] : null;
        $this->reservePlayDay = isset($data["reservePlayDay"]) ? $data["reservePlayDay"] : null;
        $this->reservePlaytime = isset($data["reservePlaytime"]) ? $data["reservePlaytime"] : null;
        $this->reservePlayCourse = isset($data["reservePlayCourse"]) ? $data["reservePlayCourse"] : null;
        $this->reservePlaySpace = isset($data["reservePlaySpace"]) ? $data["reservePlaySpace"] : null;
        $this->reservePlayArea = isset($data["reservePlayArea"]) ? $data["reservePlayArea"] : null;
        $this->reservePlayAdress = isset($data["reservePlayAdress"]) ? $data["reservePlayAdress"] : null;
        $this->option01 = isset($data["option01"]) ? $data["option01"] : null;
        $this->option02 = isset($data["option02"]) ? $data["option02"] : null;
        $this->option03 = isset($data["option03"]) ? $data["option03"] : null;
        $this->option04 = isset($data["option04"]) ? $data["option04"] : null;
        $this->option05 = isset($data["option05"]) ? $data["option05"] : null;
        $this->option06 = isset($data["option06"]) ? $data["option06"] : null;
        $this->option07 = isset($data["option07"]) ? $data["option07"] : null;
        $this->option08 = isset($data["option08"]) ? $data["option08"] : null;
        $this->option09 = isset($data["option09"]) ? $data["option09"] : null;
        $this->option10 = isset($data["option10"]) ? $data["option10"] : null;
        $this->cosplay = isset($data["cosplay"]) ? $data["cosplay"] : null;
        $this->comment = isset($data["comment"]) ? $data["comment"] : null;
    }


    // Approval
    public function getApproval()
    {
        return $this->approval;
    }

    public function setApproval($approval)
    {
        $this->approval = $approval;
    }

    // Reserve No
    public function getReserveNo()
    {
        return $this->reserveNo;
    }

    public function setReserveNo($reserveNo)
    {
        $this->reserveNo = $reserveNo;
    }

    // Reserve Type
    public function getReserveType()
    {
        return $this->reserveType;
    }

    public function setReserveType($reserveType)
    {
        $this->reserveType = $reserveType;
    }

    // Reserve Customer Type
    public function getReserveCustomerType()
    {
        return $this->reserveCustomerType;
    }

    public function setReserveCustomerType($reserveCustomerType)
    {
        $this->reserveCustomerType = $reserveCustomerType;
    }

    // Reserve Customer Num
    public function getReserveCustomerNum()
    {
        return $this->reserveCustomerNum;
    }

    public function setReserveCustomerNum($reserveCustomerNum)
    {
        $this->reserveCustomerNum = $reserveCustomerNum;
    }

    // Reserve Girl Num
    public function getReserveGirlNum()
    {
        return $this->reserveGirlNum;
    }

    public function setReserveGirlNum($reserveGirlNum)
    {
        $this->reserveGirlNum = $reserveGirlNum;
    }

    // Reserve Play Day
    public function getReservePlayDay()
    {
        return $this->reservePlayDay;
    }

    public function setReservePlayDay($reservePlayDay)
    {
        $this->reservePlayDay = $reservePlayDay;
    }

    // Reserve Playtime
    public function getReservePlaytime()
    {
        return $this->reservePlaytime;
    }

    public function setReservePlaytime($reservePlaytime)
    {
        $this->reservePlaytime = $reservePlaytime;
    }

    // Reserve Play Course
    public function getReservePlayCourse()
    {
        return $this->reservePlayCourse;
    }

    public function setReservePlayCourse($reservePlayCourse)
    {
        $this->reservePlayCourse = $reservePlayCourse;
    }

    // Reserve Play Space
    public function getReservePlaySpace()
    {
        return $this->reservePlaySpace;
    }

    public function setReservePlaySpace($reservePlaySpace)
    {
        $this->reservePlaySpace = $reservePlaySpace;
    }

    // Reserve Play Area
    public function getReservePlayArea()
    {
        return $this->reservePlayArea;
    }

    public function setReservePlayArea($reservePlayArea)
    {
        $this->reservePlayArea = $reservePlayArea;
    }

    // Reserve Play Adress
    public function getReservePlayAdress()
    {
        return $this->reservePlayAdress;
    }

    public function setReservePlayAdress($reservePlayAdress)
    {
        $this->reservePlayAdress = $reservePlayAdress;
    }

    // Option01
    public function getOption01()
    {
        return $this->option01;
    }

    public function setOption01($option01)
    {
        $this->option01 = $option01;
    }

    // Option02
    public function getOption02()
    {
        return $this->option02;
    }

    public function setOption02($option02)
    {
        $this->option02 = $option02;
    }

    // Option03
    public function getOption03()
    {
        return $this->option03;
    }

    public function setOption03($option03)
    {
        $this->option03 = $option03;
    }

    // Option04
    public function getOption04()
    {
        return $this->option04;
    }

    public function setOption04($option04)
    {
        $this->option04 = $option04;
    }

    // Option05
    public function getOption05()
    {
        return $this->option05;
    }

    public function setOption05($option05)
    {
        $this->option05 = $option05;
    }

    // Option06
    public function getOption06()
    {
        return $this->option06;
    }

    public function setOption06($option06)
    {
        $this->option06 = $option06;
    }

    // Option07
    public function getOption07()
    {
        return $this->option07;
    }

    public function setOption07($option07)
    {
        $this->option07 = $option07;
    }

    // Option08
    public function getOption08()
    {
        return $this->option08;
    }

    public function setOption08($option08)
    {
        $this->option08 = $option08;
    }

    // Option09
    public function getOption09()
    {
        return $this->option09;
    }

    public function setOption09($option09)
    {
        $this->option09 = $option09;
    }

    // Option10
    public function getOption10()
    {
        return $this->option10;
    }

    public function setOption10($option10)
    {
        $this->option10 = $option10;
    }

    // Cosplay
    public function getCosplay()
    {
        return $this->cosplay;
    }

    public function setCosplay($cosplay)
    {
        $this->cosplay = $cosplay;
    }

    // Comment
    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }



    // 指定された時間を加算して新しい startTime を計算するメソッド
    public function addTimeToStartTime($additionalMinutes)
    {
        // 現在の startTime を Unix タイムスタンプに変換
        $startTimeTimestamp = strtotime($this->reservePlaytime);

        // $additionalMinutes 分を加算
        $newTimeTimestamp = $startTimeTimestamp + ($additionalMinutes * 60);

        // 新しい時間を取得
        $newStartTime = date("H:i", $newTimeTimestamp);

        return $newStartTime;
    }





// すべての値をけす
public function resetPropertyValues() {

        $this->approval = null;
        $this->reserveNo = null;
        $this->reserveType = null;
        $this->reserveCustomerType = null;
        $this->reserveCustomerNum = null;
        $this->reserveGirlNum = null;
        $this->reservePlayDay = null;
        $this->reservePlaytime = null;
        $this->reservePlayCourse = null;
        $this->reservePlaySpace = null;
        $this->reservePlayArea = null;
        $this->reservePlayAdress = null;
        $this->option01 = null;
        $this->option02 = null;
        $this->option03 = null;
        $this->option04 = null;
        $this->option05 = null;
        $this->option06 = null;
        $this->option07 = null;
        $this->option08 = null;
        $this->option09 = null;
        $this->option10 = null;
        $this->cosplay = null;
        $this->comment = null;
    }




//特定のをnull
    public function resetPropertyNull($propertyName) {
        if(property_exists($this, $propertyName)) {
            $this->{$propertyName} = null;
        }
    }

//特定のを完全に消す
public function resetPropertyValue($propertyName) {
    if(property_exists($this, $propertyName)) {
        unset($this->{$propertyName});
    }
}


//特定のを完全に消す
public function resetPropertyValue2($propertyName) {
    if(property_exists($this, $propertyName)) {
        unset($this->$propertyName);
    }
}



// 関数で引数に値が入っているときだけセッターを呼び出す

public function setIfValue($propertyName, $value) {
    // セッターメソッド名を生成
    $setterMethod = 'set' . ucfirst($propertyName);
    
    // セッターメソッドが存在し、値がnullでない場合にのみセットする
    if (method_exists($this, $setterMethod) && $value !== null) {
        // セッターメソッドを呼び出して第２引数をセットする
        $this->{$setterMethod}($value);
    }
}


  // プロパティがあるか？確認あればtrue
    public function isPropertyNotEmpty($propertyName) {
        return !empty($this->$propertyName); // Return true if the property is not empty
    }







}


?>