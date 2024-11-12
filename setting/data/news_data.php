<!-- おしらせ -->
<?php

$news_list = [
    [
        'news_id' => 1,
        'news_time' => '2022.08.23',
        'news_type' => 1,
        'news_img' => 'img/bunner.jpeg',
        'news_title' => '1タイトルあいうえお',
        'news_content' => '内容ああああああああああああああ'
    ],
    [
        'news_id' => 2,
        'news_time' => '2022.08.23',
        'news_type' => 3,
        'news_img' => 'img/bunner.jpeg',
        'news_title' => '2タイトルあいうえおかきくけこ',
        'news_content' => '内容ああああああああああああああ'
    ],
    [
        'news_id' => 3,
        'news_time' => '2022.08.23',
        'news_type' => 3,
        'news_img' => 'img/bunner.jpeg',
        'news_title' => '3タイトルあいうえおかきくけこさしすせ',
        'news_content' => '内容ああああああああああああああ'
    ],
    [
        'news_id' => 4,
        'news_time' => '2022.08.23',
        'news_type' => 2,
        'news_img' => 'img/bunner.jpeg',
        'news_title' => '4タイトルあいうえおかきくけこさしすせそ',
        'news_content' => '内容ああああああああああああああ'
    ],
    [
        'news_id' => 5,
        'news_time' => '2022.08.24',
        'news_type' => 1,
        'news_img' => 'img/bunner.jpeg',
        'news_title' => '5タイトルあいうえおかきくけこさしすせそ',
        'news_content' => '内容ああああああああああああああ'
    ],
    [
        'news_id' => 6,
        'news_time' => '2022.08.25',
        'news_type' => 1,
        'news_img' => 'img/bunner.jpeg',
        'news_title' => '6タイトルあいうえおかきくけこさしすせそ',
        'news_content' => '内容ああああああああああああああ'
    ],
    [
        'news_id' => 7,
        'news_time' => '2022.08.25',
        'news_type' => 2,
        'news_img' => 'img/bunner.jpeg',
        'news_title' => '7タイトルあいうえおかきくけこさしすせそ',
        'news_content' => '内容ああああああああああああああ'
    ],
    [
        'news_id' => 8,
        'news_time' => '2022.08.26',
        'news_type' => 2,
        'news_img' => 'img/bunner.jpeg',
        'news_title' => '8タイトルあいうえおかきくけこさしすせそ',
        'news_content' => '内容ああああああああああああああ'
    ],
    [
        'news_id' => 9,
        'news_time' => '2022.08.27',
        'news_type' => 3,
        'news_img' => 'img/bunner.jpeg',
        'news_title' => '9タイトルあいうえおかきくけこさしすせそ',
        'news_content' => '内容ああああああああああああああ'
    ],
    [
        'news_id' => 10,
        'news_time' => '2022.08.28',
        'news_type' => 1,
        'news_img' => 'img/bunner.jpeg',
        'news_title' => '10タイトルあいうえおかきくけこさしすせそ',
        'news_content' => '内容ああああああああああああああ'
    ],
    [
        'news_id' => 11,
        'news_time' => '2022.08.29',
        'news_type' => 4,
        'news_img' => 'img/bunner.jpeg',
        'news_title' => '11タイトルあいうえおかきくけこさしすせそ',
        'news_content' => '内容ああああああああああああああ'
    ],
    [
        'news_id' => 12,
        'news_time' => '2022.08.29',
        'news_type' => 1,
        'news_img' => 'img/bunner.jpeg',
        'news_title' => '12タイトルあいうえおかきくけこさしすせそ',
        'news_content' => '内容ああああああああああああああ'
    ],
    [
        'news_id' => 13,
        'news_time' => '2022.08.29',
        'news_type' => 2,
        'news_img' => 'img/bunner.jpeg',
        'news_title' => '13タイトルあいうえおかきくけこさしすせそ',
        'news_content' => '内容ああああああああああああああ'
    ],
    [
        'news_id' => 14,
        'news_time' => '2022.08.23',
        'news_type' => 1,
        'news_img' => 'img/bunner.jpeg',
        'news_title' => '14タイトルあいうえおかきくけこさしすせそ',
        'news_content' => '内容ああああああああああああああ'
    ],
    [
        'news_id' => 15,
        'news_time' => '2022.08.23',
        'news_type' => 2,
        'news_img' => 'img/bunner.jpeg',
        'news_title' => '15タイトルあいうえおかきくけこさしすせそ',
        'news_content' => '内容ああああああああああああああ'
    ]
];


// この中にイベントオブジェクトが入る
$news_objects = array();
foreach( $news_list as $news_data){
$news_objects[] = new NewsManager($news_data);
}
?>