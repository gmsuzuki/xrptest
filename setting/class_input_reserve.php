<!-- 予約関連 -->

<?php
class InputPlayReserve {
// スタッフ1、女の子2、客3
private $reserveType;
//会員１新規会員２名前電話メール
private $reserveCustomerType;
private $reserveCustomerNum;
private $reserveCustomerName;
private $reserveCustomerPhone;
private $reserveCustomerMail;
// 指名
private $reserveGirlNum;
private $reservePlayDay;
private $reservePlaytime;
private $reservePlayCourse;
private $reservePlaySpace;
private $reservePlayArea;
private $reservePlayadress;
private $reservePlayOption;
// その他
private $reserveOk;




// コンストラクタ
public function __construct() {
// インスタンス生成時に $reserveCustomerType に 0 を設定
$this->reserveCustomerType = 0;
}





// ゲッターとセッターメソッド

// 予約のタイプ誰が予約を作ってるか？
public function getReserveType() {
return $this->reserveType;
}

public function setReserveType($reserveType) {
$this->reserveType =  $reserveType;
}

// 新規か？
public function getReserveCustomerType() {
return $this->reserveCustomerType;
}

public function setReserveCustomerType($reserveCustomerType) {
$this->reserveCustomerType = (int)$reserveCustomerType;
}

// 顧客番号
public function getReserveCustomerNum() {
return $this->reserveCustomerNum;
}

public function setReserveCustomerNum($reserveCustomerNum) {
$this->reserveCustomerNum = $reserveCustomerNum;
}

// 顧客名前
public function getReserveCustomerName() {
return $this->reserveCustomerName;
}

public function setReserveCustomerName($reserveCustomerName) {
$this->reserveCustomerName = $reserveCustomerName;
}

// 顧客電話
public function getReserveCustomerPhone() {
return $this->reserveCustomerPhone;
}

public function setReserveCustomerPhone($reserveCustomerPhone) {
$this->reserveCustomerPhone = $reserveCustomerPhone;
}

// 顧客メール
public function getReserveCustomerMail() {
return $this->reserveCustomerMail;
}

public function setReserveCustomerMail($reserveCustomerMail) {
$this->reserveCustomerMail = $reserveCustomerMail;
}

// 指名スタッフ
public function getReserveGirlNum() {
return $this->reserveGirlNum;
}

public function setReserveGirlNum($reserveGirlNum) {
$this->reserveGirlNum = $reserveGirlNum;
}

// 予約日
public function getReservePlayDay() {
return $this->reservePlayDay;
}

public function setReservePlayDay($reservePlayDay) {
$this->reservePlayDay = $reservePlayDay;
}

// プレイ開始時間
public function getReservePlaytime() {
return $this->reservePlaytime;
}

public function setReservePlaytime($reservePlaytime) {
$this->reservePlaytime = $reservePlaytime;
}

// プレイコース
public function getReservePlayCourse() {
return $this->reservePlayCourse;
}

public function setReservePlayCourse($reservePlayCourse) {
$this->reservePlayCourse = $reservePlayCourse;
}

// プレイ場所
public function getReservePlaySpace() {
return $this->reservePlaySpace;
}

public function setReservePlaySpace($reservePlaySpace) {
$this->reservePlaySpace = $reservePlaySpace;
}

// ホテルエリア
public function getReservePlayArea() {
return $this->reservePlayArea;
}

public function setReservePlayArea($reservePlayArea) {
$this->reservePlayArea = $reservePlayArea;
}

// 自宅住所
public function getReservePlayadress() {
return $this->reservePlayadress;
}

public function setReservePlayadress($reservePlayadress) {
$this->reservePlayadress = $reservePlayadress;
}


// オプション配列
public function getReservePlayOption() {
return $this->reservePlayOption;
}

public function setReservePlayOption($reservePlayOption) {
$this->reservePlayOption = $reservePlayOption;
}


// 承認
public function getReserveOk() {
return $this->reserveOk;
}

public function setReserveOk($reserveOk) {
$this->reserveOk = $reserveOk;
}


// すべての値をけす
public function resetPropertyValues() {
        $this->reserveType = null;
        $this->reserveCustomerType = null;
        $this->reserveCustomerNum = null;
        $this->reserveCustomerName = null;
        $this->reserveCustomerPhone = null;
        $this->reserveCustomerMail = null;
        $this->reserveGirlNum = null;
        $this->reservePlayDay = null;
        $this->reservePlaytime = null;
        $this->reservePlayCourse = null;
        $this->reservePlaySpace = null;
        $this->reservePlayArea = null;
        $this->reservePlayadress = null;
        $this->reservePlayOption = null;
        $this->reserveOk = null;
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

    // 開始時間とコースを足して終了時間を出す関数別のヤツと同じ名前
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




}



?>