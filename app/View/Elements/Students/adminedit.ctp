<!-- ユーザー定義定数の読み出し -->
<?php
$week = Configure::read("week");
$yomi = Configure::read("yomi");
$status_edit = Configure::read("status_edit");
?>

<div class="form-group col-xs-12">&nbsp;</div>

<div class="form-group col-xs-5 text-right">
    <b>▼管理情報</b>
</div>
<div class="form-group col-xs-12">
<?= $this->Form->input('students_status_code', [
    'label' => ['text' => '生徒ステータス', 'class' => 'col-xs-5 text-right'],
    'type'  => 'select',
    'options' => $status_edit,
    'empty' => '選択して下さい',
    'class' => 'col-xs-3'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('last_contact_datetime', [
    'label' => ['text' => '最終連絡日', 'class' => 'col-xs-5 text-right'],
    'type'  => 'datetime',
    'dateFormat' => 'YMD',
    'timeFormat' => '24',
    'monthNames' => false,
    'separator' => array('年', '月', '日／'),
    'empty' => '-',
    'maxYear' => date('Y') + 1,
    'minYear' => date('Y') - 3,
    'interval' => 15
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('yomi_code', [
    'label' => ['text' => 'ヨミ', 'class' => 'col-xs-5 text-right'],
    'type'  => 'select',
    'class' => 'col-xs-3',
    'options' => $yomi,
    'empty' => '選択して下さい'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('comment', [
    'label' => ['text' => '備考', 'class' => 'col-xs-5 text-right'],
    'type'  => 'text',
    'rows' => 3,
    'class' => 'col-xs-7'
    ]); ?>
</div>