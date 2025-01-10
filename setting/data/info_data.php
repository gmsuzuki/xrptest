<!-- info 一覧 -->


<!-- infotype
イベント:1
お知らせ:2
新人:3
おすすめ:4
卒業:5
その他:6 
-->

<?php 

$info_list = [
    [
        'info_id' => 1,
        'info_type' => 1,
        'title' => 'イベント開催のお知らせ',
        'img' => "img/event00.png",
        'content' => '詳細な内容についてはお問い合わせください。',
        'time' => '2024-11-14 14:23:45',
        'is_visible' => true
    ],
    [
        'info_id' => 2,
        'info_type' => 1,
        'title' => '新商品発売イベント',
        'img' => "img/event01.png",
        'content' => '新商品が登場しました！ぜひご覧ください。',
        'time' => '2024-11-21 14:30:00',
        'is_visible' => true
    ],
    [
        'info_id' => 3,
        'info_type' => 1,
        'title' => 'セール開始のお知らせ',
        'img' => "img/event02.png",
        'content' => '期間限定セールが始まりました。お見逃しなく！',
        'time' => '2024-11-14 14:45:12',
        'is_visible' => true
    ],
    [
        'info_id' => 4,
        'info_type' => 1,
        'title' => 'メンバー特典イベント',
        'img' => "img/event03.png",
        'content' => '会員の皆様に特別な特典をご用意しました。',
        'time' => '2024-11-14 15:00:30',
        'is_visible' => true
    ],
    [
        'info_id' => 5,
        'info_type' => 1,
        'title' => 'イベント終了のお知らせ',
        'img' => "img/event04.png",
        'content' => '大盛況のうちにイベントは終了しました。ご参加ありがとうございました。',
        'time' => '2024-11-14 15:15:55',
        'is_visible' => false
    ],
    // おしらせ
    [
        'info_id' => 6,
        'info_type' => 2,
        'title' => '会社概要更新のお知らせ',
        'img' => "img/bunner.jpeg",
        'content' => '会社概要を更新しました。最新情報をご確認ください。',
        'time' => '2024-11-14 15:30:00',
        'is_visible' => true
    ],
    [
        'info_id' => 7,
        'info_type' => 2,
        'title' => '新しいオフィスの開設',
        'img' => "img/bunner.jpeg",
        'content' => '新しいオフィスが開設されました。新しい場所での業務を開始しました。',
        'time' => '2024-11-14 15:45:15',
        'is_visible' => true
    ],
    [
        'info_id' => 8,
        'info_type' => 2,
        'title' => '会社の新方針について',
        'img' => "img/bunner.jpeg",
        'content' => '会社の新しい方針についてのお知らせです。今後の方針をご確認ください。',
        'time' => '2024-11-14 16:00:20',
        'is_visible' => true
    ],
    [
        'info_id' => 9,
        'info_type' => 2,
        'title' => '年末年始の休業日について',
        'img' => "img/bunner.jpeg",
        'content' => '年末年始の休業日についてお知らせします。ご確認ください。',
        'time' => '2024-11-14 16:15:35',
        'is_visible' => false
    ],
    [
        'info_id' => 10,
        'info_type' => 2,
        'title' => '新規事業の立ち上げ',
        'img' => "img/bunner.jpeg",
        'content' => '新規事業を立ち上げました。詳細についてはウェブサイトをご確認ください。',
        'time' => '2024-11-14 16:30:50',
        'is_visible' => true
    ],

    // 新人
    [
        'info_id' => 11,
        'info_type' => 3,
        'title' => '新人スタッフ紹介1',
        'img' => "img/newface03.jpeg",  // ランダム選択
        'content' => '新しく加わったスタッフ1をご紹介します。今後ともよろしくお願いします。',
        'time' => '2024-11-14 17:00:00',
        'is_visible' => true
    ],
    [
        'info_id' => 12,
        'info_type' => 3,
        'title' => '新人スタッフ紹介2',
        'img' => "img/newface01.jpeg",  // ランダム選択
        'content' => '新しく加わったスタッフ2をご紹介します。チームの一員として活躍します。',
        'time' => '2024-11-14 17:15:00',
        'is_visible' => true
    ],
    [
        'info_id' => 13,
        'info_type' => 3,
        'title' => '新人スタッフ紹介3',
        'img' => "img/newface05.jpeg",  // ランダム選択
        'content' => '新しく加わったスタッフ3をご紹介します。お客様に喜ばれるサービスを提供します。',
        'time' => '2024-11-14 17:30:00',
        'is_visible' => true
    ],
    //おすすめ
    [
        'info_id' => 14,
        'info_type' => 4,
        'title' => 'おすすめスタッフ1',
        'img' => "img/newface03.jpeg",  // ランダム選択
        'content' => 'おすすめのスタッフ1をご紹介します。お客様から高評価をいただいています。',
        'time' => '2024-11-14 18:00:00',
        'is_visible' => true
    ],
    [
        'info_id' => 15,
        'info_type' => 4,
        'title' => 'おすすめスタッフ2',
        'img' => "img/newface06.jpeg",  // ランダム選択
        'content' => 'おすすめのスタッフ2をご紹介します。明るく、元気な対応で人気です。',
        'time' => '2024-11-14 18:15:00',
        'is_visible' => false
    ],
    [
        'info_id' => 16,
        'info_type' => 4,
        'title' => 'おすすめスタッフ3',
        'img' => "img/newface08.jpeg",  // ランダム選択
        'content' => 'おすすめのスタッフ3をご紹介します。お客様に信頼される実力派スタッフです。',
        'time' => '2024-11-14 18:30:00',
        'is_visible' => true
    ],
    // 卒業
    [
        'info_id' => 17,
        'info_type' => 5,
        'title' => '卒業生1のお知らせ',
        'img' => "img/newface02.jpeg",  // ランダム選択
        'content' => '卒業生1が無事に卒業しました。今後の活躍を応援しています。',
        'time' => '2024-11-14 19:00:00',
        'is_visible' => true
    ],
    [
        'info_id' => 18,
        'info_type' => 5,
        'title' => '卒業生2のお知らせ',
        'img' => "img/newface09.jpeg",  // ランダム選択
        'content' => '卒業生2が卒業しました。次のステップに進む彼の活躍を期待しています。',
        'time' => '2024-11-14 19:15:00',
        'is_visible' => true
    ],
    [
        'info_id' => 19,
        'info_type' => 5,
        'title' => '卒業生3のお知らせ',
        'img' => "img/newface07.jpeg",  // ランダム選択
        'content' => '卒業生3がこの度無事に卒業しました。これからの活躍を応援しています。',
        'time' => '2024-11-14 19:30:00',
        'is_visible' => false
    ],
    
    // その他
    [
        'info_id' => 20,
        'info_type' => 6,
        'title' => 'その他のお知らせ1',
        'img' => "img/other01.jpeg",  // ランダム選択
        'content' => 'その他のお知らせ1です。',
        'time' => '2024-11-14 20:00:00',
        'is_visible' => true
    ],
    [
        'info_id' => 21,
        'info_type' => 6,
        'title' => 'その他のお知らせ2',
        'img' => null,  // ランダム選択
        'content' => 'その他のお知らせ2です。',
        'time' => '2024-11-14 20:15:00',
        'is_visible' => true
    ]
];


    

?>