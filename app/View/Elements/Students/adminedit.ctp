<!-- ユーザー定義定数の読み出し -->
<?php
$week = Configure::read("week");
$yomi = Configure::read("yomi");
$status_edit = Configure::read("status_edit");
?>

<div class="form-group col-xs-12">&nbsp;</div>

<div class="col-xs-3"></div>
<div class="form-group text-left col-xs-8">
    <b>▼面談希望日</b>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('first_meet_datetime', [
    'label' => ['text' => '第一希望', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'datetime',
    'dateFormat' => 'YMD',
    'timeFormat' => '24',
    'monthNames' => false,
    'separator' => array('年', '月', '日／'),
    'empty' => '-',
    'maxYear' => date('Y') + 1,
    'minYear' => date('Y'),
    'maxHour' => time('22'),
    'minHour' => time('8'),
    'interval' => 15,
    'class' => 'form-control'
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('second_meet_datetime', [
    'label' => ['text' => '第二希望', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'datetime',
    'dateFormat' => 'YMD',
    'timeFormat' => '24',
    'monthNames' => false,
    'separator' => array('年', '月', '日／'),
    'empty' => '-',
    'maxYear' => date('Y') + 1,
    'minYear' => date('Y'),
    'interval' => 15,
    'class' => 'form-control'
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('third_meet_datetime', [
    'label' => ['text' => '第三希望', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'datetime',
    'dateFormat' => 'YMD',
    'timeFormat' => '24',
    'monthNames' => false,
    'separator' => array('年', '月', '日／'),
    'empty' => '-',
    'maxYear' => date('Y') + 1,
    'minYear' => date('Y'),
    'interval' => 15,
    'class' => 'form-control'
    ]); ?>
</div>
</div>


<div class="form-group col-xs-12">
<div class="form-inline">&nbsp;</div>
</div>

<div class="col-xs-3"></div>
<div class="form-group text-left col-xs-8">
    <b>▼管理情報</b>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('students_status_code', [
    'label' => ['text' => '生徒ステータス', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'select',
    'options' => $status_edit,
    'empty' => '選択して下さい',
    'class' => 'col-xs-3',
    'class' => 'form-control'
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('last_contact_datetime', [
    'label' => ['text' => '最終連絡日', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'datetime',
    'dateFormat' => 'YMD',
    'timeFormat' => '24',
    'monthNames' => false,
    'separator' => array('年', '月', '日／'),
    'empty' => '-',
    'maxYear' => date('Y'),
    'minYear' => date('Y') - 2,
    'interval' => 15,
    'class' => 'form-control'
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('yomi_code', [
    'label' => ['text' => 'ヨミ', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'select',
    'class' => 'form-control col-xs-3',
    'options' => $yomi,
    'empty' => '選択して下さい'
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('comment', [
    'label' => ['text' => '備考', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'text',
    'rows' => 3,
    'class' => 'form-control col-xs-7',
    'style' => 'width:50%; max-width:400px; max-height:60px'
    ]); ?>
</div>
</div>