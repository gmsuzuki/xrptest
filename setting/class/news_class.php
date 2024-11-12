<!-- ニュース -->
<?php
class NewsManager{
    private $news_id;
    private $news_time;
    private $news_type;
    private $news_img;
    private $news_title;
    private $news_content;
  

public function __construct($data = [])
{
    $this->news_id = isset($data['news_id']) ? $data['news_id'] : null;
    $this->news_time = isset($data['news_time']) ? $data['news_time'] : null;
    $this->news_type = isset($data['news_type']) ? $data['news_type'] : null;
    $this->news_img = isset($data['news_img']) ? $data['news_img'] : null;
    $this->news_title = isset($data['news_title']) ? $data['news_title'] : null;
    $this->news_content = isset($data['news_content']) ? $data['news_content'] : null;
}



    public function getNewsId()
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