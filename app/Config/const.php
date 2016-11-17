<?php
//ユーザ定義定数
//呼び出し方:    echo FOOBAR;
define("FOOBAR","テスト");

//配列
//呼び出し方:    $fuga = Configure::read("fuga");
$config['fuga'] = array("a","b","c");

//連想配列
//呼び出し方:    $hoge = Configure::read("hoge");
$config['hoge'] = array(
    "A"=>"あ",
    "B"=>"い",
    "C"=>"う",
);

$config['week'] = ['日', '月', '火', '水', '木', '金', '土'];
$config['sex'] = ['男性', '女性', '不明'];
$config['purpose'] = ['起業', '転職', 'フリーランス', 'スキルアップ', '副業', '趣味', 'その他'];
$config['pc'] = ['Mac', 'Windows7', 'Windows8', 'Windows10', 'その他'];
$config['status'] = ['入会前', '学習中', '卒業済', '削除予定'];
$config['yomi'] = ['A', 'B', 'C'];
$config['month'] = [
    '01月' => '01月',
    '02月' => '02月',
    '03月' => '03月',
    '04月' => '04月',
    '05月' => '05月',
    '06月' => '06月',
    '07月' => '07月',
    '08月' => '08月',
    '09月' => '09月',
    '10月' => '10月',
    '11月' => '11月',
    '12月' => '12月'
    ];