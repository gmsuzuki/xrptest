<!-- データ持ってきてる -->
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
['三浦　恵美','img/newface01.jpeg',20,165,88,'F',92],
['大島　美紀','img/newface02.jpeg',21,145,81,'C',91],
['林田　美子','img/newface03.jpeg',22,155,85,'D',86],
['岡崎　純子','img/newface04.jpeg',20,150,83,'E',88],
['早川　文子','img/newface05.jpeg',21,165,95,'B',89],
['大島　弘子','img/newface03.jpeg',22,153,91,'C',92],
['古賀　彩乃','img/newface02.jpeg',24,157,88,'D',91],
['平野　美智','img/newface04.jpeg',29,159,80,'B',90],
['前田　洋子','img/newface05.jpeg',30,150,78,'A',95],
['石川　彩乃','img/newface01.jpeg',20,152,90,'G',91]
]
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
$reviews =[
  ['客名前①','担当スタッフ名','利用は2022/08/31','2022/09/30',5,
  'タイトル',
  'あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよわんを',
  'pickup','return'],
  ['客名前②','担当スタッフ名','利用は2022/08/31','2022/09/30',2,'タイトル',
  'あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよわんを',
  'pickup','return'],
  ['客名前③','担当スタッフ名','利用は2022/08/31','2022/09/30',3,'タイトル',
  'あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよわんを',
  'pickup','return'],
  ['客名前④','担当スタッフ名','利用は2022/08/31','2022/09/30',4,'タイトル',
  'あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよわんを',
  'pickup','return'],
  ['客名前⑤','担当スタッフ名','利用は2022/08/31','2022/09/30',1,'タイトル',
  'あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよわんを',
  'pickup','return'],
  ['客名前⑥','担当スタッフ名','利用は2022/08/31','2022/09/30',2,'タイトル',
  'あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよわんを',
  'pickup','return']
  ]
?>

<?php
          class Reviewers
          {
              private $name;
              private $review_comment;
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
?>