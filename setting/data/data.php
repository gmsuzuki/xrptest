<!-- データ持ってきてる -->

<!-- カウントforeach とかにつかう -->
<?php $counter = 0?>

<!-- 日付 -->
<?php
  date_default_timezone_set ('Asia/Tokyo');
  // 今日
  $today = new DateTime('now');
  $week_name = array("日", "月", "火", "水", "木", "金", "土");
  // 営業時間
  $shop_start = clone $today;
  $shop_start ->setTime(10,00,00);
?>

<!-- postでもらってきた日時データかどうか判断 -->
<?php
// 2021/10/08とこんな感じの日時にpostで受けっとった日時はなってるか？
function validateDateFormat($date) {
    $format = 'Y/m/d';
    $dateTime = DateTime::createFromFormat($format, $date);
    return $dateTime && $dateTime->format($format) === $date;
};
//10:00とこんな感じの時間にpostで受け取った時間はなっているか？判断 
function isValidTimeFormat($time) {
    $pattern = '/^(0[0-9]|1[0-9]|2[0-3]):00$/';
    return preg_match($pattern, $time) === 1;
}

?>




<?php
    $scheduleArray = [
    [
        "社員番号" => 0,
        "出勤日" => "2024-06-19",
        "出勤時間" => "10:00:00",
        "退勤時間" => "18:00:00",
        "出勤no" => 10,
        "承認" => 0
    ],
    [
        "社員番号" => 1,
        "出勤日" => "2024-04-22",
        "出勤時間" => "09:30:00",
        "退勤時間" => "17:30:00",
        "出勤no" => 11,
        "承認" => 0
      ],
    [
        "社員番号" => 2,
        "出勤日" => "2024-04-23",
        "出勤時間" => "08:45:00",
        "退勤時間" => "17:15:00",
        "出勤no" => 12,
        "承認" => 0
      ],
    [
        "社員番号" => 3,
        "出勤日" => "2024-04-23",
        "出勤時間" => "09:45:00",
        "退勤時間" => "17:15:00",
        "出勤no" => 13,
        "承認" => 0
      ],

    [
       "社員番号" => 4,
        "出勤日" => "2024-04-24",
        "出勤時間" => "09:15:00",
        "退勤時間" => "18:15:00",
        "出勤no" => 14,
        "承認" => 0],
     [
       "社員番号" => 5,
        "出勤日" => "2024-04-14",
        "出勤時間" => "09:15:00",
        "退勤時間" => "18:15:00",
        "出勤no" => 15,
        "承認" => 0],
     [
       "社員番号" => 6,
        "出勤日" => "2024-04-14",
        "出勤時間" => "09:15:00",
        "退勤時間" => "18:15:00",
        "出勤no" => 16,
        "承認" => 0],
     [
       "社員番号" => 7,
        "出勤日" => "2024-04-17",
        "出勤時間" => "09:15:00",
        "退勤時間" => "18:15:00",
        "出勤no" => 17,
        "承認" => 0],
    
        [
        "社員番号" => 8,
        "出勤日" => "2024-04-01",
        "出勤時間" => "09:00:00",
        "退勤時間" => "17:00:00",
        "出勤no" => 18,
        "承認" => 0
        ]
    ];
?>

<!-- picbunner -->
<?php
$picbunners = [
  ['img/pic_bunner00.png','#'],
  ['img/pic_bunner01.png','#'],
  ['img/pic_bunner02.png','#'],
  ['img/pic_bunner03.png','#'],
  ['img/pic_bunner04.png','#'],
  ['img/pic_bunner05.png','#'],
]
?>
<!-- サンプルスタッフ -->
<!-- 名前だけ -->
<?php
$sample_names = [
[0,'三浦　恵美','みうら　えみ','img/newface01.jpeg',20,165,88,'F',92],
[1,'大島　美紀','おおしま　みき','img/newface02.jpeg',21,145,81,'C',91],
[2,'林田　美子','はやしだ　みこ','img/newface03.jpeg',22,155,85,'D',86],
[3,'岡崎　純子','おかざき　じゅんこ','img/newface04.jpeg',20,150,83,'E',88],
[4,'早川　文子','はやかわ　ふみこ','img/newface05.jpeg',21,165,95,'B',89],
[5,'大島　弘子','おおしま　ひろこ','img/newface06.jpeg',22,153,91,'C',92],
[6,'古賀　彩乃','こが　あやの','img/newface07.jpeg',24,157,88,'D',91],
[7,'平野　智美','ひらの　ともみ','img/newface08.jpeg',29,159,80,'B',90],
[8,'前田　洋子','まえだ　ようこ','img/newface09.jpeg',30,150,78,'A',95],
[9,'石川　彩乃','いしかわ　あやの','img/newface10.jpeg',20,152,90,'G',91]
];


$sample_pics = [
[0,'img/newface01.jpeg','img/newface03.jpeg','img/newface05.jpeg','img/newface02.jpeg','img/newface07.jpeg',],
[1,'img/newface04.jpeg','img/newface03.jpeg','img/newface10.jpeg','img/newface10.jpeg','img/newface04.jpeg'],
[2,'img/newface05.jpeg','img/newface04.jpeg','img/newface06.jpeg','img/newface07.jpeg','img/newface05.jpeg',],
[3,'img/newface07.jpeg','img/newface06.jpeg','img/newface04.jpeg','img/newface08.jpeg','img/newface06.jpeg',],
[4,'img/newface08.jpeg','img/newface07.jpeg','img/newface02.jpeg','img/newface06.jpeg','img/newface07.jpeg',],
[5,'img/newface09.jpeg','img/newface09.jpeg','img/newface01.jpeg','img/newface02.jpeg','img/newface07.jpeg',],
[6,'img/newface10.jpeg','img/newface09.jpeg','img/newface10.jpeg','img/newface03.jpeg','img/newface08.jpeg',],
[7,'img/newface02.jpeg','img/newface08.jpeg','img/newface07.jpeg','img/newface02.jpeg','img/newface09.jpeg',],
[8,'img/newface03.jpeg','img/newface10.jpeg','img/newface05.jpeg','img/newface03.jpeg','img/newface10.jpeg',],
[9,'img/newface07.jpeg','img/newface06.jpeg','img/newface04.jpeg','img/newface03.jpeg','img/newface01.jpeg',]
];


$new_names;
for($i=1; $i<6; $i++){
$new_names[] =$sample_names[$i];
};

$today_names;
for($i=7; $i>3; $i=$i-1){
$today_names[] =$sample_names[$i];
}

?>

<!-- 客 -->
<?php 
$people_basics = [
    [
        "no" => 0,
        "name" => "田中太郎",
        "phone" => "09012345678",
        "email" => "tanaka.taro@example.com",
        "icon" =>"img/user_face.png"
    ],
    [
        "no" => 1,
        "name" => "田中大輔",
        "phone" => "08012345678",
        "email" => "daisuke.tanaka@example.com",
        "icon" => "img/staff.jpeg"
    ],
    [
        "no" => 2,
        "name" => "佐藤健太",
        "phone" => "07034567890",
        "email" => "sato.kenta@example.com",
        "icon" => "img/customer01.png"
    ],
    [
        "no" => 3,
        "name" => "鈴木美キオ",
        "phone" => "08045678901",
        "email" => "suzuki.miki@example.com",
        "icon" => "img/customer03.png"
    ],
    [
        "no" => 4,
        "name" => "高橋悠二",
        "phone" => "09056789012",
        "email" => "takahashi.yuko@example.com",
        "icon" => "img/customer01.png"
    ],
    [
        "no" => 5,
        "name" => "伊藤隆之",
        "phone" => "07067890123",
        "email" => "ito.takayuki@example.com",
        "icon" => "img/customer02.png"
    ],
    [
        "no" => 6,
        "name" => "寺田学",
        "phone" => "09023456778",
        "email" => "wawawa@gmail.com",
        "icon" => "img/customer01.png"
    ],
    [
        "no" => 7,
        "name" => "中村雅彦",
        "phone" => "09089012345",
        "email" => "nakamura.masahiko@example.com",
        "icon" => "img/customer02.png"
    ],
    [
        "no" => 8,
        "name" => "加藤さとる",
        "phone" => "07090123456",
        "email" => "kato.rie@example.com",
        "icon" => "img/customer03.png"
    ],
    [
        "no" => 9,
        "name" => "吉田隆一",
        "phone" => "08001234567",
        "email" => "yoshida.ryuichi@example.com",
        "icon" => "img/customer04.png"
    ]
];



?>

<!-- グラビア -->
<?php
$sample_girl_gravures = [
  'コスプレ1' =>'img/gravure00.jpeg',
  'コスプレ2' =>'img/gravure01.jpeg',
  'コスプレ3' =>'img/gravure02.jpeg',
  'コスプレ4' =>'img/gravure03.jpeg',
  'コスプレ5' =>'img/gravure04.jpeg'
]
?>

<!-- プロフィール的な -->

<?php 

$girls_style = ['スリム','普通','巨乳','ぽっちゃり','ぽちゃぽちゃ','長身','ミニマム'];

$girls_appearance = ['童顔','色白','お姉さん','小悪魔','地雷系','素朴','アイドル'];

$girls_play = ['濃厚','いちゃいちゃ','テクニシャン','ご奉仕','友達','アブノーマル','SM','スカトロ'];

$girls_characteristic = ['パチンコ','競馬','ゲーム','アニメ','漫画','音楽','映画','読書','料理'];

$girls_plus = ['パイパン','自前衣装','写真可','動画可'];

$girls_secret = ['タトゥー大','タトゥー小','自傷大','自傷小'];

?>



<?php
$sample_question =[
  '好きな食べものは？','趣味は？','出身は','休みの日は？','兄弟は？','車にのる？','お酒は？','泳げる？','筋トレ？','やるき？'
];
$sample_answer =[
  '回答１','回答２','回答3','回答4','回答5','回答6','回答7','回答8','回答9','回答10'
];

$sample_qandas = array_combine($sample_question, $sample_answer);

?>

<!-- オプション -->
<?php 
$options = [
  [1,'おにぎり'],
  [2,'のりまき'],
  [3,'おいなりさん'],
  [4,'かっぱまき'],
  [5,'まぐろ'],
  [6,'いくら'],
  ]
?>

<!-- 口コミ -->
<?php
$reviews_question=[
  ['ルックス','女の子の見た目はどうでしたか？'],
  ['スタイルル','女の子のスタイルはどうでしたか？'],
  ['プレイ','女の子のテクニックはどうでしたか？'],
  ['接客姿勢','おもてなしはどうでしたか？'] ,
  ['会話','楽しい会話はできましたか？']
];
// ホスピタリティーと清潔感にわけるかも
  
// ナンバー,ユーザー名前,mail,入った女の子,利用日,利用コース,評価１,評価2,評価3,評価4,評価5,タイトル,内容,承認


$reviews =[
  [0,'田中','1234@gmail.com','2','2022-12-10',90,5,4,3,2,1,'そうでもなかったと思ったけれどもやってみよう','入ってみたけどそうでもなかったような。それでもなんというか入ってみたけどそうでもなかったような。それでもなんというか入ってみたけどそうでもなかったような。それでもなんというか入ってみたけどそうでもなかったような。それでもなんというか入ってみたけどそうでもなかったような。それでもなんというか',1],
  [1,'金森','1234@gmail.com','1','2022-11-12',90,5,5,3,2,5,'楽しく過ごせた','もう一度必ず入りますよ、よろしくおねがいします',1],
  [2,'小杉','1234@gmail.com','4','2022-10-30',60,5,4,3,4,4,'また会いたい','とても楽しい時間を過ごせました、ぜひまたお相手ください',1],
  [3,'蓬田','1234@gmail.com','5','2022-10-10',60,5,4,3,5,3,'よきかな','よきかなとてもよきかな？そう思いながら帰りました',1,],
  [4,'印西','1234@gmail.com','3','2022-10-01',90,5,5,5,5,5,'完璧でした','惚れてしまいました、すぐ明日にでも予約したいです',1],
  [5,'水際','1234@gmail.com','3','2022-09-10',75,5,4,4,4,3,'なんでもあり','まじで何でもありじゃん、そんなのかり？',1],
  [6,'吉田','1234@gmail.com','2','2022-09-02',90,5,4,3,5,4,'きっとアイドル','きゃっきゃしながら歌って踊って完璧でしたわ',1],
  [7,'小松','1234@gmail.com','4','2022-08-12',90,5,3,2,5,5,'もう絶対いける','てれてれてえこのままじゃいけてしまう',1],
  [8,'斎藤','1234@gmail.com','1','2022-08-10',60,5,2,5,4,5,'ほれてまうやろー','すごい、とにかくすごいすごすぎる',1],
  [9,'島田','1234@gmail.com','2','2022-08-01',90,5,1,4,5,4,'一つ気になります','文句を言ってしまうのが僕の悪い癖',1]  
];

for( $i=0; $i<6; $i++){
$new_reviews[] = $reviews[$i];
};

?>

<!-- レビュー単体 -->


<!-- 対キャストに対して -->
<?php
          class Reviewers
          {
              private $name;
              private $review_comment;
              private $comment_count;
              public function __construct(
                $name,
                $review_comment,
                $comment_count
                )
              {
                  $this->name = $name;
                  $this->review_comment = $review_comment;
                  $this->comment_count = $comment_count;
              }
              public function getName()
              {
                  return $this->name;
              }
              public function getComment()
              {
                  return $this->review_comment;
              }
              public function getComment_count()
              {
                  return $this->comment_count;
              }
            }
          // とりあえず３人ほど作っておく

          $tanaka = new Reviewers("田中","とても良かった",3);
          $yoshida = new Reviewers("佐竹","良かったかもしれない",4);
          $yamada = new Reviewers("森本","すげーまずかった",10);

          $reviews_class =[$tanaka,$yoshida,$yamada];
          
          ?>

<!-- 利用ホテル -->

<?php 
$hotels = array(
'hotel1' =>['松戸','https://www.google.com/maps/d/embed?mid=1JWZXXQd4QNSoqlmTiDk_0B8oqrbvF8NQ'],
'hotel2' =>['新松戸','https://www.google.com/maps/d/embed?mid=1EoKGNrr6DPs0qepj8L0-p57LjEJO-GcH'],
'hotel3' =>['馬橋','https://www.google.com/maps/d/embed?mid=1UgWbBDAP4gfRZumiAaZz8Z-T4h3MiniX'],
'hotel4' =>['北松戸','https://www.google.com/maps/d/embed?mid=1HhoEih1_YYKIpp-Eqzxat8KNB3yW2i8q'],
'hotel5' =>['柏','https://www.google.com/maps/d/embed?mid=1Zl9G9387hF3XN-DcsEBJchMTqfhulZDf'],
'hotel6' =>['南柏','https://www.google.com/maps/d/embed?mid=1212JJviYmk1qlclqAP_Airc7Nu_rspsW'],
'hotel7' =>['北柏','https://www.google.com/maps/d/embed?mid=1AApytABKq4lxDXeYlmH8KZqDn1E1domg'],
'hotel8' =>['八柱','https://www.google.com/maps/d/embed?mid=1wviEBagFedVZpJf3ItfRr_xnIKIucTmr'],
'hotel9' =>['三郷','https://www.google.com/maps/d/embed?mid=1KmcatTOsv9e1WKWLfvnMp0MCFFbFaNhs']
)

?>


<!-- ニュース -->
<?php
class News
{
    private $news_id;
    private $news_time;
    private $news_type;
    private $news_img;
    private $news_title;
    private $news_content;
    public function __construct(
      $news_id,
      $news_time,
      $news_type,
      $news_img,
      $news_title,
      $news_content
      )
      {
        $this->news_id = $news_id;
        $this->news_time = $news_time;
        $this->news_type = $news_type;
        $this->news_img = $news_img;
        $this->news_title = $news_title;
        $this->news_content = $news_content;
    }
    public function getNewstId()
    {
        return $this->news_id;
    }
    public function getNewsTime()
    {
        return $this->news_time;
    }
    public function getNewsType()
    {
        return $this->news_type;
    }
    public function getNewsImg()
    {
        return $this->news_img;
    }
        public function getNewsTitle()
    {
        return $this->news_title;
    }
    public function getNewsContent()
    {
        return $this->news_content;
    }
    public function getNewsColor()
    {
        if ($this->news_type == 1) {
            return 'pink'; // ピンク
        } elseif ($this->news_type == 2) {
            return 'rgb(114 151 197)'; // 青
        } elseif ($this->news_type == 3) {
            return 'rgb(118 227 77)'; // 緑
        }elseif ($this->news_type == 4) {
            return 'rgb(237, 192, 255)'; // 紫
        }  else {
            return 'black'; // デフォルトは黒色
        }
    }
    public function getNewsTitleBody()
    {
        if ($this->news_type == 1) {
            return 'イベント';
        } elseif ($this->news_type == 2) {
            return 'お知らせ'; // 青
        } elseif ($this->news_type == 3) {
            return '新人紹介'; // 緑
        }elseif ($this->news_type == 4) {
            return 'その他'; // 紫
        }  else {
            return 'エラー'; // デフォルトは黒色
        }
    }

  }

?>

<!-- 最新情報 -->
<?php
$news_list = [
  [1,'2022.08.23',1,'img/bunner.jpeg','1タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ'],
  [2,'2022.08.23',3,'img/bunner.jpeg','2タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ'],
  [3,'2022.08.23',3,'img/bunner.jpeg','3タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ'],
  [4,'2022.08.23',2,'img/bunner.jpeg','4タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ'],
  [5,'2022.08.24',1,'img/bunner.jpeg','5タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ'],
  [6,'2022.08.25',1,'img/bunner.jpeg','6タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ'],
  [7,'2022.08.25',2,'img/bunner.jpeg','7タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ'],
  [8,'2022.08.26',2,'img/bunner.jpeg','8タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ'],
  [9,'2022.08.27',3,'img/bunner.jpeg','9タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ'],
  [10,'2022.08.28',1,'img/bunner.jpeg','10タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ'],
  [11,'2022.08.29',4,'img/bunner.jpeg','11タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ'],
  [12,'2022.08.29',1,'img/bunner.jpeg','12タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ'],
  [13,'2022.08.29',2,'img/bunner.jpeg','13タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ'],
  [14,'2022.08.23',1,'img/bunner.jpeg','14タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ'],
  [15,'2022.08.23',2,'img/bunner.jpeg','15タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ'],
];

// この中にイベントオブジェクトが入る
$news_objects = array();

foreach( $news_list as $news_data){
    $news_id = $news_data[0];
    $news_time = $news_data[1];
    $news_type = $news_data[2];
    $news_img = $news_data[3];
    $news_title = $news_data[4];
    $news_content = $news_data[5];
    $news_objects[] = new News(
      $news_id,
      $news_time,
      $news_type,
      $news_img,
      $news_title,
      $news_content

);
}
?>



<!-- イベントページ -->
<?php
class Events
{
    private $event_id;
    private $event_name;
    private $event_img;
    private $event_content;
    public function __construct(
      $event_id,
      $event_name,
      $event_img,
      $event_content
      )
      {
        $this->event_id = $event_id;
        $this->event_name = $event_name;
        $this->event_img = $event_img;
        $this->event_content = $event_content;
    }
    public function getEventId()
    {
        return $this->event_id;
    }
    public function getEventName()
    {
        return $this->event_name;
    }
    public function getEventImg()
    {
        return $this->event_img;
    }
    public function getEventContent()
    {
        return $this->event_content;
    }
  }
// とりあえず5人ほど作っておく



$events_list = [
[1,"ご新規様割引","img/event00.png","あいうえおかきくけこさしすせそたちつてと"],
[2,"コミコミ割引","img/event01.png","あいうえおかきくけこさしすせそたちつてと"],
[3,"スタンプ倍増キャンペーン","img/event02.png","あいうえおかきくけこさしすせそたちつてと"],
[4,"ロングお得キャンペーン","img/event03.png","あいうえおかきくけこさしすせそたちつてと"],
[5,"口コミ割引","img/event04.png","あいうえおかきくけこさしすせそたちつてと"]
];



// この中にイベントオブジェクトが入る
$event_objects = array();

foreach( $events_list as $events_data){
    $event_id = $events_data[0];
    $event_name = $events_data[1];
    $event_img = $events_data[2];
    $event_content = $events_data[3];
    $event_objects[] = new Events(
    $event_id,
    $event_name,
    $event_img,
    $event_content
);
}



// スワイパーに乗るもの

$sw_event0 = new Events(
  0,
  "sw_ご新規様割引",
  "img/sw01.jpeg",
  "あいうえおかきくけこさしすせそたちつてと"
);
$sw_event1 = new Events(
  1,
  "sw_コミコミ割引",
  "img/sw02.jpeg",
  "あいうえおかきくけこさしすせそたちつてと"
);
$sw_event2 = new Events(
  2,
  "sw_スタンプ倍増キャンペーン",
  "img/sw03.jpeg",
  "あいうえおかきくけこさしすせそたちつてと"
);
$sw_event3 = new Events(
  3,
  "sw_ロングお得キャンペーン",
  "img/sw04.jpeg",
  "あいうえおかきくけこさしすせそたちつてと"
);
$sw_event4 = new Events(
  4,
  "sw_口コミ割引",
  "img/sw05.jpeg",
  "あいうえおかきくけこさしすせそたちつてと"
);

$sw_events = [
  $sw_event0,
  $sw_event1,
  $sw_event2,
  $sw_event3,
  $sw_event4                        
]

?>