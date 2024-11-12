<?php
class EventManager
{
    private $event_id;
    private $event_name;
    private $event_img;
    private $event_content;
    private $event_time;

    public function __construct($data = [])
    {
        $this->event_id = isset($data['event_id']) ? $data['event_id'] : null;
        $this->event_name = isset($data['event_name']) ? $data['event_name'] : null;
        $this->event_img = isset($data['event_img']) ? $data['event_img'] : null;
        $this->event_content = isset($data['event_content']) ? $data['event_content'] : null;
        $this->event_time = isset($data['event_time']) ? $data['event_time'] : null;
    }

    // Getter and Setter for event_id
    public function getEventId()
    {
        return $this->event_id;
    }

    public function setEventId($event_id)
    {
        $this->event_id = $event_id;
    }

    // Getter and Setter for event_name
    public function getEventName()
    {
        return $this->event_name;
    }

    public function setEventName($event_name)
    {
        $this->event_name = $event_name;
    }

    // Getter and Setter for event_img
    public function getEventImg()
    {
        return $this->event_img;
    }

    public function setEventImg($event_img)
    {
        $this->event_img = $event_img;
    }

    // Getter and Setter for event_content
    public function getEventContent()
    {
        return $this->event_content;
    }

    public function setEventContent($event_content)
    {
        $this->event_content = $event_content;
    }

    // Getter and Setter for event_time
    public function getEventTime()
    {
        return $this->event_time;
    }

    public function setEventTime($event_time)
    {
        $this->event_time = $event_time;
    }
}
?>