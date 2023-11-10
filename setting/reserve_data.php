<?php
class Reservation
{
    private $registrant;
    private $userNumber;
    private $reserverName;
    private $phoneNumber;
    private $email;
    private $employeeNumber;
    private $reservationDate;
    private $startTime;
    private $playTime;
    private $locationType;
    private $location;
    private $option1;
    private $option2;
    private $option3;
    private $option4;
    private $option5;
    private $option6;
    private $cosplay;
    private $comment;
    private $reservationNumber;
    private $approval;
    private $err_inclass;

    public function __construct($data)
    {
        $this->userNumber = $data["ユーザー番号"];
        $this->reserverName = $data["予約者名"];
        $this->phoneNumber = $data["電話番号"];
        $this->email = $data["メールアドレス"];
        $this->employeeNumber = $data["指名社員番号"];
        $this->reservationDate = $data["予約希望日"];
        $this->startTime = $data["開始時間"];
        $this->playTime = $data["プレイタイム"];
        $this->locationType = $data["場所種類"];
        $this->location = $data["場所位置"];
        $this->option1 = $data["オプション1"];
        $this->option2 = $data["オプション2"];
        $this->option3 = $data["オプション3"];
        $this->option4 = $data["オプション4"];
        $this->option5 = $data["オプション5"];
        $this->option6 = $data["オプション6"];
        $this->cosplay = $data["コスプレ"];
        $this->comment = $data["コメント"];
        $this->reservationNumber = $data["予約no"];
        $this->approval = $data["承認"];
    }


    public function getUserNumber()
    {
        return $this->userNumber;
    }

    public function setUserNumber($userNumber)
    {
        $this->userNumber = $userNumber;
    }

    public function getReserverName()
    {
        return $this->reserverName;
    }

    public function setReserverName($reserverName)
    {
        $this->reserverName = $reserverName;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmployeeNumber()
    {
        return $this->employeeNumber;
    }

    public function setEmployeeNumber($employeeNumber)
    {
        $this->employeeNumber = $employeeNumber;
    }

    public function getReservationDate()
    {
        return $this->reservationDate;
    }

    public function setReservationDate($reservationDate)
    {
        $this->reservationDate = $reservationDate;
    }

    public function getStartTime()
    {
        return $this->startTime;
    }

    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    public function getPlayTime()
    {
        return $this->playTime;
    }

    public function setPlayTime($playTime)
    {
        $this->playTime = $playTime;
    }

    public function getLocationType()
    {
        return $this->locationType;
    }

    public function setLocationType($locationType)
    {
        $this->locationType = $locationType;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getOption1()
    {
        return $this->option1;
    }

    public function setOption1($option1)
    {
        $this->option1 = $option1;
    }

    public function getOption2()
    {
        return $this->option2;
    }

    public function setOption2($option2)
    {
        $this->option2 = $option2;
    }

    public function getOption3()
    {
        return $this->option3;
    }

    public function setOption3($option3)
    {
        $this->option3 = $option3;
    }

    public function getOption4()
    {
        return $this->option4;
    }

    public function setOption4($option4)
    {
        $this->option4 = $option4;
    }

    public function getOption5()
    {
        return $this->option5;
    }

    public function setOption5($option5)
    {
        $this->option5 = $option5;
    }

    public function getOption6()
    {
        return $this->option6;
    }

    public function setOption6($option6)
    {
        $this->option6 = $option6;
    }

    public function getCosplay()
    {
        return $this->cosplay;
    }

    public function setCosplay($cosplay)
    {
        $this->cosplay = $cosplay;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getReservationNumber()
    {
        return $this->reservationNumber;
    }

    public function setReservationNumber($reservationNumber)
    {
        $this->reservationNumber = $reservationNumber;
    }

    public function getApproval()
    {
        return $this->approval;
    }

    public function setApproval($approval)
    {
        $this->approval = $approval;
    }

    public function get_err_inclass()
    {
        return $this->err_inclass;
    }

    // 指定された時間を加算して新しい startTime を計算するメソッド
    public function addTimeToStartTime($additionalMinutes)
    {
        // 現在の startTime を Unix タイムスタンプに変換
        $startTimeTimestamp = strtotime($this->startTime);

        // $additionalMinutes 分を加算
        $newTimeTimestamp = $startTimeTimestamp + ($additionalMinutes * 60);

        // 新しい時間を取得
        $newStartTime = date("H:i", $newTimeTimestamp);

        return $newStartTime;
    }
}


?>


<!-- 予約リクエスト -->

<?php
   $reserve_requests = [
      [
        "ユーザー番号" => 1,
        "予約者名" => "田中大介",
        "電話番号" => "08012345678",
        "メールアドレス" => "gmclips124@gmail.com",
        "指名社員番号" => 3,
        "予約希望日" => "2023-10-15",
        "開始時間" => "10:00:00",
        "プレイタイム" => 60,
        "場所種類" => 0,
        "場所位置" => "松戸",
        "オプション1" => true,
        "オプション2" => false,
        "オプション3" => true,
        "オプション4" => false,
        "オプション5" => false,
        "オプション6" => false,
        "コスプレ" => 1,
        "コメント" => "いつでも大丈夫ですわー",
        "予約no" => 10,
        "承認" => 0
    ],
    [
        "ユーザー番号" => 6,
        "予約者名" => "寺田学",
        "電話番号" => "09023456778",
        "メールアドレス" => "wawawa@gmail.com",
        "指名社員番号" => 4,
        "予約希望日" => "2023-10-10",
        "開始時間" => "11:00:00",
        "プレイタイム" => 90,
        "場所種類" => 1,
        "場所位置" => "新松戸５−１−４",
        "オプション1" => false,
        "オプション2" => false,
        "オプション3" => true,
        "オプション4" => false,
        "オプション5" => false,
        "オプション6" => false,
        "コスプレ" => 5,
        "コメント" => "",
        "予約no" => 16,
        "承認" => 0
      ],
    [
        "ユーザー番号" => false,
        "予約者名" => "森暢平",
        "電話番号" => "09041234567",
        "メールアドレス" => "tekeke@gmail.com",
        "指名社員番号" => 5,
        "予約希望日" => "2023-10-10",
        "開始時間" => "11:00:00",
        "プレイタイム" => 90,
        "場所種類" => 1,
        "場所位置" => "新松戸５−１−４",
        "オプション1" => false,
        "オプション2" => false,
        "オプション3" => true,
        "オプション4" => false,
        "オプション5" => false,
        "オプション6" => false,
        "コスプレ" => 5,
        "コメント" => "",
        "予約no" => 17,
        "承認" => 0
      ]
    ];
    ?>



<!-- 予約済み -->


<?php $reserved_cards =[
        [
        "ユーザー番号" => 13,
        "予約者名" => "予約済み１",
        "電話番号" => "08012345678",
        "メールアドレス" => "daisuke.tanaka@example.com",
        "指名社員番号" => 3,
        "予約希望日" => "2023-10-15",
        "開始時間" => "11:00:00",
        "プレイタイム" => 120,
        "場所種類" => 0,
        "場所位置" => "松戸",
        "オプション1" => true,
        "オプション2" => false,
        "オプション3" => true,
        "オプション4" => false,
        "オプション5" => false,
        "オプション6" => false,
        "コスプレ" => 1,
        "コメント" => "いつでも大丈夫ですわー",
        "予約no" => 20,
        "承認" => 0
    ],
    [
        "予約者名" => "予約済み２",
        "電話番号" => "09023456778",
        "メールアドレス" => "wawawa@gmail.com",
        "指名社員番号" => 3,
        "予約希望日" => "2023-10-15",
        "開始時間" => "14:00:00",
        "プレイタイム" => 90,
        "場所種類" => 1,
        "場所位置" => "新松戸５−１−４",
        "オプション1" => false,
        "オプション2" => false,
        "オプション3" => true,
        "オプション4" => false,
        "オプション5" => false,
        "オプション6" => false,
        "コスプレ" => 5,
        "コメント" => "",
        "予約no" => 21,
        "承認" => 0
      ],
    [

        "ユーザー番号" => false,
        "予約者名" => "予約済み３",
        "電話番号" => "09041234567",
        "メールアドレス" => "tekeke@gmail.com",
        "指名社員番号" => 3,
        "予約希望日" => "2023-10-15",
        "開始時間" => "16:00:00",
        "プレイタイム" => 180,
        "場所種類" => 1,
        "場所位置" => "新松戸５−１−４",
        "オプション1" => false,
        "オプション2" => false,
        "オプション3" => true,
        "オプション4" => false,
        "オプション5" => false,
        "オプション6" => false,
        "コスプレ" => 5,
        "コメント" => "",
        "予約no" => 22,
        "承認" => 0
      ]
]
?>