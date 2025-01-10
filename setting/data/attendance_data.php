<?php


// ランダムな日付を生成する関数
function getRandomWorkDay() {
    $today = new DateTime();
    $randomDays = rand(0, 5); // 1～5日のランダムな日数
    return $today->modify("+{$randomDays} days")->format('Y-m-d');
}

// 今日の日付を生成する関数
function getTodayDate() {
    $today = new DateTime(); // 現在の日付と時刻を取得
    return $today->format('Y-m-d'); // 'Y-m-d' の形式でフォーマット
}

$scheduleArray = [
    [
        "attendanceNo" => 10,
        "reserveType" => 1,
        "attendanceGirlNum" => 1,
        "attendanceWorkDay" => getTodayDate(), // 関数を直接呼び出す
        "workStartTime" => "11:00:00",
        "workEndTime" => "21:00:00",
        "approval" => true
    ],
    [
        "attendanceNo" => 11,
        "reserveType" => 2,
        "attendanceGirlNum" => 9,
        "attendanceWorkDay" => getTodayDate(),
        "workStartTime" => "10:30:00",
        "workEndTime" => "17:30:00",
        "approval" => true
    ],
    [
        "attendanceNo" => 12,
        "reserveType" => 3,
        "attendanceGirlNum" => 2,
        "attendanceWorkDay" => getRandomWorkDay(),
        "workStartTime" => "12:00:00",
        "workEndTime" => "17:15:00",
        "approval" => true
    ],
    [
        "attendanceNo" => 13,
        "reserveType" => 1,
        "attendanceGirlNum" => 3,
        "attendanceWorkDay" => getRandomWorkDay(),
        "workStartTime" => "09:45:00",
        "workEndTime" => "17:15:00",
        "approval" => true
    ],
    [
        "attendanceNo" => 14,
        "reserveType" => 2,
        "attendanceGirlNum" => 4,
        "attendanceWorkDay" => "2024-12-11",
        "workStartTime" => "09:15:00",
        "workEndTime" => "18:15:00",
        "approval" => true
    ],
    [
        "attendanceNo" => 15,
        "reserveType" => 3,
        "attendanceGirlNum" => 5,
        "attendanceWorkDay" => getRandomWorkDay(),
        "workStartTime" => "09:15:00",
        "workEndTime" => "18:15:00",
        "approval" => true
    ],
    [
        "attendanceNo" => 16,
        "reserveType" => 1,
        "attendanceGirlNum" => 6,
        "attendanceWorkDay" => getRandomWorkDay(),
        "workStartTime" => "09:15:00",
        "workEndTime" => "18:15:00",
        "approval" => true
    ],
    [
        "attendanceNo" => 17,
        "reserveType" => 2,
        "attendanceGirlNum" => 7,
        "attendanceWorkDay" => getRandomWorkDay(),
        "workStartTime" => "09:15:00",
        "workEndTime" => "18:15:00",
        "approval" => true
    ],
    [
        "attendanceNo" => 18,
        "reserveType" => 3,
        "attendanceGirlNum" => 8,
        "attendanceWorkDay" => getRandomWorkDay(),
        "workStartTime" => "09:00:00",
        "workEndTime" => "17:00:00",
        "approval" => true
    ]
];



$unapprovedscheduleArray = [
    [
        "attendanceNo" => 31,
        "reserveType" => 0,
        "attendanceGirlNum" => 5,
        "attendanceWorkDay" => getRandomWorkDay(),
        "workStartTime" => "10:00:00",
        "workEndTime" => "18:00:00",
        "approval" => false
    ],
    [
        "attendanceNo" => 32,
        "reserveType" => 1,
        "attendanceGirlNum" => 7,
        "attendanceWorkDay" => getRandomWorkDay(),
        "workStartTime" => "11:00:00",
        "workEndTime" => "19:00:00",
        "approval" => false
    ],
    [
        "attendanceNo" => 33,
        "reserveType" => 2,
        "attendanceGirlNum" => 8,
        "attendanceWorkDay" => getRandomWorkDay(),
        "workStartTime" => "12:00:00",
        "workEndTime" => "20:00:00",
        "approval" => false
    ],
    [
        "attendanceNo" => 34,
        "reserveType" => 1,
        "attendanceGirlNum" => 10,
        "attendanceWorkDay" => getRandomWorkDay(),
        "workStartTime" => "13:00:00",
        "workEndTime" => "21:00:00",
        "approval" => false
    ],
    [
        "attendanceNo" => 35,
        "reserveType" => 0,
        "attendanceGirlNum" => 6,
        "attendanceWorkDay" => getRandomWorkDay(),
        "workStartTime" => "14:00:00",
        "workEndTime" => "19:00:00",
        "approval" => false
    ],
    [
        "attendanceNo" => 36,
        "reserveType" => 1,
        "attendanceGirlNum" => 2,
        "attendanceWorkDay" => getRandomWorkDay(),
        "workStartTime" => "11:00:00",
        "workEndTime" => "19:00:00",
        "approval" => false
    ],
    [
        "attendanceNo" => 37,
        "reserveType" => 1,
        "attendanceGirlNum" => 3,
        "attendanceWorkDay" => getRandomWorkDay(),
        "workStartTime" => "11:00:00",
        "workEndTime" => "19:00:00",
        "approval" => false
    ],
    [
        "attendanceNo" => 38,
        "reserveType" => 1,
        "attendanceGirlNum" => 4,
        "attendanceWorkDay" => getRandomWorkDay(),
        "workStartTime" => "11:00:00",
        "workEndTime" => "19:00:00",
        "approval" => false
    ],
    [
        "attendanceNo" => 39,
        "reserveType" => 1,
        "attendanceGirlNum" => 5,
        "attendanceWorkDay" => getRandomWorkDay(),
        "workStartTime" => "11:00:00",
        "workEndTime" => "19:00:00",
        "approval" => false
    ],
];