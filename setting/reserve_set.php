<?php

class Reservation {
  
private $reserveGirlNum;
private $staffNum;
private $memberType;
private $memberNum;
private $memberPhone;
private $memberEmail;
private $startTime;
private $playTime;
private $playDate;
private $playLocation;
private $playArea;
private $option;
private $reserveMemo;


// セッター
public function setReserveGirlNum($reserveGirlNum) {
$this->reserveGirlNum = $reserveGirlNum;
}

public function setStaffNum($staffNum) {
$this->staffNum = $staffNum;
}

public function setMemberType($memberType) {
$this->memberType = $memberType;
}

public function setMemberNum($memberNum) {
$this->memberNum = $memberNum;
}

public function setMemberPhone($memberPhone) {
$this->memberPhone = $memberPhone;
}

public function setMemberEmail($memberEmail) {
$this->memberEmail = $memberEmail;
}

public function setStartTime($startTime) {
$this->startTime = $startTime;
}

public function setPlayTime($playTime) {
$this->playTime = $playTime;
}

public function setPlayDate($playDate) {
$this->playDate = $playDate;
}

public function setPlayLocation($playLocation) {
$this->playLocation = $playLocation;
}

public function setPlayArea($playArea) {
$this->playArea = $playArea;
}

public function setOption($option) {
$this->option = $option;
}

public function setReserveMemo($reserveMemo) {
$this->reserveMemo = $reserveMemo;
}


// ゲッター
public function getReserveGirlNum() {
return $this->reserveGirlNum;
}

public function getStaffNum() {
return $this->staffNum;
}

public function getMemberType() {
return $this->memberType;
}

public function getMemberNum() {
return $this->memberNum;
}

public function getMemberPhone() {
return $this->memberPhone;
}

public function getMemberEmail() {
return $this->memberEmail;
}

public function getStartTime() {
return $this->startTime;
}

public function getPlayTime() {
return $this->playTime;
}

public function getPlayDate() {
return $this->playDate;
}

public function getPlayLocation() {
return $this->playLocation;
}

public function getPlayArea() {
return $this->playArea;
}

public function getOption() {
return $this->option;
}

public function getReserveMemo() {
return $this->reserveMemo;
}

public function getData() {
return [
'reserveGirlNum' => $this->getReserveGirlNum(),
'staffNum' => $this->getStaffNum(),
'memberType' => $this->getMemberType(),
'memberNum' => $this->getMemberNum(),
'memberPhone' => $this->getMemberPhone(),
'memberEmail' => $this->getMemberEmail(),
'startTime' => $this->getStartTime(),
'playTime' => $this->getPlayTime(),
'playDate' => $this->getPlayDate(),
'playLocation' => $this->getPlayLocation(),
'playArea' => $this->getPlayArea(),
'option' => $this->getOption(),
'reserveMemo' => $this->getReserveMemo(),
];
}
}
?>