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
  $shop_start = $today->setTime(10,00,00);
?>



<!-- 最新情報 -->
<?php
$news_list = [
  ['2022.08.23','イベント','1タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ','添付'],
  ['2022.08.23','イベント','2タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ','添付'],
  ['2022.08.23','イベント','3タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ','添付'],
  ['2022.08.23','イベント','4タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ','添付'],
  ['2022.08.24','イベント','5タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ','添付'],
  ['2022.08.25','イベント','6タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ','添付'],
  ['2022.08.25','イベント','7タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ','添付'],
  ['2022.08.26','イベント','8タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ','添付'],
  ['2022.08.27','イベント','9タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ','添付'],
  ['2022.08.28','イベント','10タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ','添付'],
  ['2022.08.29','イベント','11タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ','添付'],
  ['2022.08.29','イベント','12タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ','添付'],
  ['2022.08.29','イベント','13タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ','添付'],
  ['2022.08.23','イベント','14タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ','添付'],
  ['2022.08.23','イベント','15タイトルあいうえおかきくけこさしすせそ','内容ああああああああああああああ','添付'],
  ]

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
[0,'三浦　恵美','img/newface01.jpeg',20,165,88,'F',92],
[1,'大島　美紀','img/newface02.jpeg',21,145,81,'C',91],
[2,'林田　美子','img/newface03.jpeg',22,155,85,'D',86],
[3,'岡崎　純子','img/newface04.jpeg',20,150,83,'E',88],
[4,'早川　文子','img/newface05.jpeg',21,165,95,'B',89],
[5,'大島　弘子','img/newface06.jpeg',22,153,91,'C',92],
[6,'古賀　彩乃','img/newface07.jpeg',24,157,88,'D',91],
[7,'平野　美智','img/newface08.jpeg',29,159,80,'B',90],
[8,'前田　洋子','img/newface09.jpeg',30,150,78,'A',95],
[9,'石川　彩乃','img/newface10.jpeg',20,152,90,'G',91]
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
  'おにぎり',
  'のりまき',
  'おいなりさん'
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
  
// ナンバー,ユーザー名前,mail,入った女の子,利用日,利用コース,評価１,評価2,評価3,評価4,評価5,タイトル,内容,


$reviews =[
  [0,'田中','1234@gmail.com','2','2022-12-10',90,5,4,3,2,1,'そうでもなかったと思ったけれどもやってみよう','入ってみたけどそうでもなかったような。それでもなんというか入ってみたけどそうでもなかったような。それでもなんというか入ってみたけどそうでもなかったような。それでもなんというか入ってみたけどそうでもなかったような。それでもなんというか入ってみたけどそうでもなかったような。それでもなんというか'],
  [1,'金森','1234@gmail.com','1','2022-11-12',90,5,5,3,2,5,'楽しく過ごせた','もう一度必ず入りますよ、よろしくおねがいします'],
  [2,'小杉','1234@gmail.com','4','2022-10-30',60,5,4,3,4,4,'また会いたい','とても楽しい時間を過ごせました、ぜひまたお相手ください'],
  [3,'蓬田','1234@gmail.com','5','2022-10-10',60,5,4,3,5,3,'よきかな','よきかなとてもよきかな？そう思いながら帰りました'],
  [4,'印西','1234@gmail.com','3','2022-10-01',90,5,5,5,5,5,'完璧でした','惚れてしまいました、すぐ明日にでも予約したいです'],
  [5,'水際','1234@gmail.com','3','2022-09-10',75,5,4,4,4,3,'なんでもあり','まじで何でもありじゃん、そんなのかり？'],
  [6,'吉田','1234@gmail.com','2','2022-09-02',90,5,4,3,5,4,'きっとアイドル','きゃっきゃしながら歌って踊って完璧でしたわ'],
  [7,'小松','1234@gmail.com','4','2022-08-12',90,5,3,2,5,5,'もう絶対いける','てれてれてえこのままじゃいけてしまう'],
  [8,'斎藤','1234@gmail.com','1','2022-08-10',60,5,2,5,4,5,'ほれてまうやろー','すごい、とにかくすごいすごすぎる'],
  [9,'島田','1234@gmail.com','2','2022-08-01',90,5,1,4,5,4,'一つ気になります','文句を言ってしまうのが僕の悪い癖']  
];

for( $i=0; $i<6; $i++){
$new_reviews[] = $reviews[$i];
};
 
?>

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

$event1 = new Events(
  1,
  "ご新規様割引",
  "img/event00.png",
  "あいうえおかきくけこさしすせそたちつてと"
);
$event2 = new Events(
  2,
  "コミコミ割引",
  "img/event01.png",
  "あいうえおかきくけこさしすせそたちつてと"
);
$event3 = new Events(
  3,
  "スタンプ倍増キャンペーン",
  "img/event02.png",
  "あいうえおかきくけこさしすせそたちつてと"
);
$event4 = new Events(
  4,
  "ロングお得キャンペーン",
  "img/event03.png",
  "あいうえおかきくけこさしすせそたちつてと"
);
$event5 = new Events(
  5,
  "口コミ割引",
  "img/event04.png",
  "あいうえおかきくけこさしすせそたちつてと"
);

$events =[
  $event1,
  $event2,
  $event3,
  $event4,
  $event5                        
];

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