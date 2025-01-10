<!-- レビューデータ -->
<?php
// ランダムな日付を生成する関数
function getRandomreviewDay() {
    $today = new DateTime();
    $randomDays = rand(1, 40); // 1～5日のランダムな日数
    return $today->modify("-{$randomDays} days")->format('Y-m-d');
}


$approvalPendings = [

    [
        "reviewNumber" => 1,
        "userNumber" => 1,
        "employeeNumber" => 2,
        "playDate" => getRandomreviewDay(),
        "playTime" => 60,
        "rate01" => 4,
        "rate02" => 5,
        "rate03" => 4,
        "rate04" => 3,
        "rate05" => 5,
        "reviewTitle" => '素晴らしい体験',
        "reviewBody" => 'とても満足しました。ぜひまた利用したいです。',
        "approval" => true
    ],
    [
        "reviewNumber" => 2,
        "userNumber" => 2,
        "employeeNumber" => 1,
        "playDate" => '2024-12-23',
        "playTime" => 45,
        "rate01" => 3,
        "rate02" => 3,
        "rate03" => 4,
        "rate04" => 3,
        "rate05" => 4,
        "reviewTitle" => '普通でした',
        "reviewBody" => '特に問題はありませんでしたが、特別な印象もありませんでした。',
        "approval" => true
    ],
    [
        "reviewNumber" => 3,
        "userNumber" => 3,
        "employeeNumber" => 4,
        "playDate" => '2025-01-01',
        "playTime" => 75,
        "rate01" => 5,
        "rate02" => 5,
        "rate03" => 5,
        "rate04" => 4,
        "rate05" => 5,
        "reviewTitle" => '最高のサービス',
        "reviewBody" => '期待以上のサービスで、とても満足しています。',
        "approval" => true
    ],
    [
        "reviewNumber" => 4,
        "userNumber" => 4,
        "employeeNumber" => 3,
        "playDate" => getRandomreviewDay(),
        "playTime" => 90,
        "rate01" => 2,
        "rate02" => 3,
        "rate03" => 2,
        "rate04" => 3,
        "rate05" => 2,
        "reviewTitle" => '期待はずれ',
        "reviewBody" => '期待していたほどのサービスではありませんでした。',
        "approval" => true
    ],
    [
        "reviewNumber" => 5,
        "userNumber" => 5,
        "employeeNumber" => 5,
        "playDate" => getRandomreviewDay(),
        "playTime" => 30,
        "rate01" => 4,
        "rate02" => 4,
        "rate03" => 4,
        "rate04" => 4,
        "rate05" => 4,
        "reviewTitle" => '満足です',
        "reviewBody" => '全体的に満足できるサービスでした。',
        "approval" => true
    ],
    [
        "reviewNumber" => 6,
        "userNumber" => 6,
        "employeeNumber" => 2,
        "playDate" => getRandomreviewDay(),
        "playTime" => 60,
        "rate01" => 3,
        "rate02" => 3,
        "rate03" => 4,
        "rate04" => 3,
        "rate05" => 3,
        "reviewTitle" => 'まあまあ',
        "reviewBody" => 'サービスは悪くありませんが、特に目立つところもありませんでした。',
        "approval" => true
    ],
    [
        "reviewNumber" => 7,
        "userNumber" => 7,
        "employeeNumber" => 1,
        "playDate" => getRandomreviewDay(),
        "playTime" => 120,
        "rate01" => 5,
        "rate02" => 5,
        "rate03" => 5,
        "rate04" => 5,
        "rate05" => 5,
        "reviewTitle" => '素晴らしい！',
        "reviewBody" => '本当に素晴らしい体験でした。全てが完璧でした。',
        "approval" => true
    ],
    [
        "reviewNumber" => 8,
        "userNumber" => 8,
        "employeeNumber" => 3,
        "playDate" => getRandomreviewDay(),
        "playTime" => 45,
        "rate01" => 4,
        "rate02" => 4,
        "rate03" => 3,
        "rate04" => 4,
        "rate05" => 4,
        "reviewTitle" => '良かったです',
        "reviewBody" => 'サービスに満足しました。細部に配慮が行き届いていました。',
        "approval" => true
    ],
    [
        "reviewNumber" => 9,
        "userNumber" => 9,
        "employeeNumber" => 4,
        "playDate" => getRandomreviewDay(),
        "playTime" => 90,
        "rate01" => 2,
        "rate02" => 3,
        "rate03" => 2,
        "rate04" => 2,
        "rate05" => 3,
        "reviewTitle" => '期待外れ',
        "reviewBody" => '期待していたほどではありませんでした。',
        "approval" => true
    ],
    [
        "reviewNumber" => 10,
        "userNumber" => 10,
        "employeeNumber" => 5,
        "playDate" => getRandomreviewDay(),
        "playTime" => 60,
        "rate01" => 5,
        "rate02" => 4,
        "rate03" => 5,
        "rate04" => 5,
        "rate05" => 4,
        "reviewTitle" => '満足です',
        "reviewBody" => 'とても良い体験ができました。スタッフの対応が素晴らしかったです。',
        "approval" => true
    ],
    [
        "reviewNumber" => 11,
        "userNumber" => 1,
        "employeeNumber" => 3,
        "playDate" => getRandomreviewDay(),
        "playTime" => 90,
        "rate01" => 1,
        "rate02" => 1,
        "rate03" => 1,
        "rate04" => 1,
        "rate05" => 1,
        "reviewTitle" => 'このやろう',
        "reviewBody" => '死ねよきゃっきゃしながら歌って踊って完璧でしたわ',
        "approval" => false
    ],
    [
        "reviewNumber" => 12,
        "userNumber" => 3,
        "employeeNumber" => 4,
        "playDate" => getRandomreviewDay(),
        "playTime" => 120,
        "rate01" => 5,
        "rate02" => 3,
        "rate03" => 2,
        "rate04" => 5,
        "rate05" => 5,
        "reviewTitle" => '金返せ',
        "reviewBody" => '死ねてれてれてabc@gmail.comえこのままじゃいけてしまう',
        "approval" => false
    ],
    [
        "reviewNumber" => 13,
        "userNumber" => 5,
        "employeeNumber" => 1,
        "playDate" => getRandomreviewDay(),
        "playTime" => 60,
        "rate01" => 5,
        "rate02" => 2,
        "rate03" => 5,
        "rate04" => 4,
        "rate05" => 5,
        "reviewTitle" => 'ほれてまう',
        "reviewBody" => '好きです大好きすごい、とにかくすごいすごすぎる',
        "approval" => false
    ],
    [
        "reviewNumber" => 14,
        "userNumber" => 3,
        "employeeNumber" => 5,
        "playDate" => getRandomreviewDay(),
        "playTime" => 90,
        "rate01" => 5,
        "rate02" => 1,
        "rate03" => 4,
        "rate04" => 5,
        "rate05" => 4,
        "reviewTitle" => 'きになるき',
        "reviewBody" => 'きみかわうぃーね文句を言ってしまうのが僕の悪い癖ね文句を言ってしまうのが僕の悪い癖',
        "approval" => false
    ],
    [
        "reviewNumber" => 15,
        "userNumber" => 2,
        "employeeNumber" => 1,
        "playDate" => getRandomreviewDay(),
        "playTime" => 60,
        "rate01" => 1,
        "rate02" => 1,
        "rate03" => 1,
        "rate04" => 1,
        "rate05" => 1,
        "reviewTitle" => '合わなかった',
        "reviewBody" => '自分には合わなかったです。',
        "approval" => false
    ]
];


?>


<!-- 新規レビュー -->

<?php

/*
// 承認が1の項目だけをフィルタリング
$approved_reviews = array_filter($reviews, function($review) {
return $review['approval'] === true;
});

// 利用日で降順にソート
usort($approved_reviews, function($a, $b) {
return strtotime($b['playDate']) - strtotime($a['playDate']);
});

// 最新の5件を取り出す
$new_reviews = array_slice($approved_reviews, 0, 5);

*/
?>