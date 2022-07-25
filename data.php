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

<!-- サンプルスタッフ -->
<!-- 名前だけ -->
<?php
$sample_names = [
'三浦　恵',
'大島　美 紀',
'林　美智子',
'岡崎　純子',
'早川　文子',
'大島　弘子',
'古賀　彩乃',
'平野　美智',
'前田　洋子',
'石川　彩乃'
]
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