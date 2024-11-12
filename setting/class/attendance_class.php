<!-- 予約関連 -->

<?php

// 出勤入力
class InputAttendanceReserve {
    // id
    private $attendanceNo;
    // スタッフ1、女の子2、客3誰が入れたのか？
    private $reserveType;
    // 誰の出勤
    private $attendanceGirlNum;
    // いつ？
    private $attendanceWorkDay;
    // 何時から
    private $workStartTime;
    // 何時まで
    private $workEndTime;
    // 承認
    private $approval;

    // コンストラクタ
      public function __construct($data = [])
    {
        $this->attendanceNo = isset($data['attendanceNo']) ? $data['attendanceNo'] : null;
        $this->reserveType = isset($data['reserveType']) ? $data['reserveType'] : null;
        $this->attendanceGirlNum = isset($data['attendanceGirlNum']) ? $data['attendanceGirlNum'] : null;
        $this->attendanceWorkDay = isset($data['attendanceWorkDay']) ? $data['attendanceWorkDay'] : null;
        $this->workStartTime = isset($data['workStartTime']) ? $data['workStartTime'] : null;
        $this->workEndTime = isset($data['workEndTime']) ? $data['workEndTime'] : null;
        $this->approval = isset($data['approval']) ? $data['approval'] : null;
    }
 
    // attendanceNoこれはゲットセットいるのか？
    public function getAttendanceNo() {
        return $this->attendanceNo;
    }

    public function setAttendanceNo($attendanceNo) {
        $this->attendanceNo = $attendanceNo;
    }

    // reserveTypeのゲッターとセッター
    public function getReserveType() {
        return $this->reserveType;
    }

    public function setReserveType($reserveType) {
        $this->reserveType = $reserveType;
    }

    // attendanceGirlNumのゲッターとセッター
    public function getAttendanceGirlNum() {
        return $this->attendanceGirlNum;
    }

    public function setAttendanceGirlNum($attendanceGirlNum) {
        $this->attendanceGirlNum = $attendanceGirlNum;
    }

    // attendanceWorkDayのゲッターとセッター
    public function getAttendanceWorkDay() {
        return $this->attendanceWorkDay;
    }

    public function setAttendanceWorkDay($attendanceWorkDay) {
        $this->attendanceWorkDay = $attendanceWorkDay;
    }

    // workStartTimeのゲッターとセッター
    public function getWorkStartTime() {
        return $this->workStartTime;
    }

    public function setWorkStartTime($workStartTime) {
        $this->workStartTime = $workStartTime;
    }

    // workEndTimeのゲッターとセッター
    public function getWorkEndTime() {
        return $this->workEndTime;
    }

    public function setWorkEndTime($workEndTime) {
        $this->workEndTime = $workEndTime;
    }

    // approvalOkのゲッターとセッター
    public function getApproval() {
        return $this->approval;
    }

    public function setApprovalOk($approval) {
        $this->approval = $approval;
    }



   // 全てのプロパティをリセットする関数
    public function resetAllProperties() {
        $this->attendanceNo = null;
        $this->reserveType = null;
        $this->attendanceGirlNum = null;
        $this->attendanceWorkDay = null;
        $this->workStartTime = null;
        $this->workEndTime = null;
        $this->approval = null;
    }



  // 特定のプロパティを削除する関数
    public function deleteProperty($propertyName) {
        if (property_exists($this, $propertyName)) {
            unset($this->$propertyName);
        } else {
            throw new Exception("Property $propertyName does not exist.");
        }
    }

   // 日付と曜日を取得するメソッド
    public function getFormattedWorkDay() {
        $date = new DateTime($this->attendanceWorkDay);
        $weekday = ['日', '月', '火', '水', '木', '金', '土'];
        $dayOfWeek = $weekday[$date->format('w')];
        return $date->format('m/d') . ' (' . $dayOfWeek . ')';
    }

      // 日付と曜日のクラスを取得するメソッド
    public function getFormattedWorkDayClass() {
        $date = new DateTime($this->attendanceWorkDay);
        $week = $date->format('w'); // 0: 日曜日, 6: 土曜日

        if ($week == 0) {
            return "sun";
        } elseif ($week == 6) {
            return "sat";
        } else {
            return "weekday";
        }
    }



}



?>