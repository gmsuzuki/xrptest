<!-- 客 -->

<?php

class MemberHandler {
    private $memberNumber;
    private $name;
    private $age;
    private $phoneNumber;
    private $email;
    private $iconImage;
    private $approval;

    public function __construct($data) {
        $this->memberNumber = $data["会員番号"];
        $this->name = $data["名前"];
        $this->age = $data["年齢"];
        $this->phoneNumber = $data["電話番号"];
        $this->email = $data["メールアドレス"];
        $this->iconImage = $data["アイコン画像"];
        $this->approval = $data["承認"];
    }

    public function getMemberNumber() {
        return $this->memberNumber;
    }

    public function setMemberNumber($memberNumber) {
        $this->memberNumber = $memberNumber;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getIconImage() {
        return $this->iconImage;
    }

    public function setIconImage($iconImage) {
        $this->iconImage = $iconImage;
    }

    public function getApproval() {
        return $this->approval;
    }

    public function setApproval($approval) {
        $this->approval = $approval;
    }
}


$people_basics = [
    [
        "会員番号" => 0,
        "名前" => '田中太郎',
        "年齢" => 30,
        "電話番号" => '09012345678',
        "メールアドレス" => 'john@example.com',
        "アイコン画像" => 'img/user_face.png',
        "承認" => true
    ],
    [
        "会員番号" => 1,
        "名前" => '山田大介',
        "年齢" => 40,
        "電話番号" => '08012345678',
        "メールアドレス" => "daisuke.tanaka@example.com",
        "アイコン画像" => 'img/staff.jpeg',
        "承認" => true

    ],
    [
        "会員番号" => 2,
        "名前" => '田中太郎',
        "年齢" => 28,
        "電話番号" => '09012345678', // ハイフンを削除
        "メールアドレス" => 'tanaka.taro@example.com',
        "アイコン画像" => 'img/customer01.png',
        "承認" => true,
    ],
    [
        "会員番号" => 3,
        "名前" => '佐藤健吾',
        "年齢" => 35,
        "電話番号" => '08098765432', // ハイフンを削除
        "メールアドレス" => 'sato.kenji@example.com',
        "アイコン画像" => 'img/customer03.png',
        "承認" => true,
    ],
    [
        "会員番号" => 4,
        "名前" => '山田次郎',
        "年齢" => 42,
        "電話番号" => '07055551234', // ハイフンを削除
        "メールアドレス" => 'yamada.jiro@example.com',
        "アイコン画像" => 'img/customer01.png',
        "承認" => true,
    ],
    [
        "会員番号" => 5,
        "名前" => '鈴木哲男',
        "年齢" => 31,
        "電話番号" => '08011112222', // ハイフンを削除
        "メールアドレス" => 'suzuki.tetsuo@example.com',
        "アイコン画像" => 'img/customer02.png',
        "承認" => true,
    ],
    [
        "会員番号" => 6,
        "名前" => '伊藤健太',
        "年齢" => 29,
        "電話番号" => '09099998888', // ハイフンを削除
        "メールアドレス" => 'ito.kenta@example.com',
        "アイコン画像" => 'img/customer01.png',
        "承認" => true,
    ],
    [
        "会員番号" => 7,
        "名前" => '渡辺悟',
        "年齢" => 37,
        "電話番号" => '08044443333', // ハイフンを削除
        "メールアドレス" => 'watanabe.satoru@example.com',
        "アイコン画像" => 'img/customer02.png',
        "承認" => true,
    ],
    [
        "会員番号" => 8,
        "名前" => '加藤一郎',
        "年齢" => 40,
        "電話番号" => '09077776666', // ハイフンを削除
        "メールアドレス" => 'kato.ichiro@example.com',
        "アイコン画像" => 'img/customer03.png',
        "承認" => true,
    ],
     [
        "会員番号" => 9,
        "名前" => '吉田隆一',
        "年齢" => 40,
        "電話番号" => '08001234567', // ハイフンを削除
        "メールアドレス" => 'yoshida.ryuichi@example.com',
        "アイコン画像" => 'img/customer04.png"',
        "承認" => true,
     ]
]


?>