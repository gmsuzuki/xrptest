<?php
class InfoManager
{
    private $info_id;
    private $info_type;
    private $title;
    private $img;
    private $content;
    private $time;
    private $is_visible; // 新しく追加

    public function __construct($data = [])
    {
        // マッピング処理
        $this->info_id = isset($data['info_id']) ? $data['info_id'] : null;
        $this->info_type = isset($data['info_type']) ? $data['info_type'] : null;
        $this->title = isset($data['title']) ? $data['title'] : null;
        $this->img = isset($data['img']) ? $data['img'] : null;
        $this->content = isset($data['content']) ? $data['content'] : null;
        $this->time = isset($data['time']) ? $data['time'] : null;
        $this->is_visible = isset($data['is_visible']) ? $data['is_visible'] : null;
    }

    // Getterメソッド
    public function getInfoId()
    {
        return $this->info_id;
    }

    public function getInfoTime()
    {
        return $this->time;
    }

    public function getInfoType()
    {
        return $this->info_type;
    }

    public function getInfoImg()
    {
        return $this->img;
    }

    public function getInfoTitle()
    {
        return $this->title;
    }

    public function getInfoContent()
    {
        return $this->content;
    }

    public function getIsVisible()
    {
        return $this->is_visible;
    }

    public function getInfoColor()
    {
        if ($this->info_type == 1) {
            return 'pink'; // ピンク
        } elseif ($this->info_type == 2) {
            return 'rgb(114 151 197)'; // 青
        } elseif ($this->info_type == 3) {
            return 'rgb(118 227 77)'; // 緑
        } elseif ($this->info_type == 4) {
            return 'rgb(237, 192, 255)'; // 紫
        } elseif ($this->info_type == 5) {
            return 'rgb(255, 165, 0)'; // オレンジ
        } elseif ($this->info_type == 6) {
            return 'rgb(160, 82, 45)'; // 茶
        } else {
            return 'black'; // デフォルトは黒色
        }
    }

    public function getInfoTitleBody()
    {
        if ($this->info_type == 1) {
            return 'イベント';
        } elseif ($this->info_type == 2) {
            return 'お知らせ';
        } elseif ($this->info_type == 3) {
            return '新人紹介';
        } elseif ($this->info_type == 4) {
            return 'おすすめ';
        } elseif ($this->info_type == 5) {
            return '卒　業';
        } elseif ($this->info_type == 6) {
            return 'その他';
        } else {
            return 'エラー';
        }
    }

    //日付だけを取り出す 
    public function getInfoDate()
    {
    if ($this->time) {
    // 日付部分を取り出して "-" を "." に変換
        return str_replace('-', '.', explode(' ', $this->time)[0]);
    }
    return null; // info_timeがnullの場合
    }


    // Setterメソッド
    public function setInfoId($info_id)
    {
        $this->info_id = $info_id;
    }

    public function setInfoTime($time)
    {
        $this->time = $time;
    }

    public function setInfoType($info_type)
    {
        $this->info_type = $info_type;
    }

    public function setInfoImg($img)
    {
        $this->img = $img;
    }

    public function setInfoTitle($title)
    {
        $this->title = $title;
    }

    public function setInfoContent($content)
    {
        $this->content = $content;
    }

    public function setIsVisible($is_visible)
    {
        $this->is_visible = $is_visible;
    }
}