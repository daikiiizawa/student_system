<!-- ユーザー定義定数の読み出し -->
<?php
$week = Configure::read("week");
$sex = Configure::read("sex");
$purpose = Configure::read("purpose");
$pc = Configure::read("pc");
$month = Configure::read("month");
$region_name = Configure::read("region_name");
?>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('family_name', [
    'label' => ['text' => '氏名', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'name',
    'placeholder' => '姓',
    'class' => 'form-control col-xs-3',
    'style' => 'width:25%; background-color:'.$alert_color['family_name'],
    'error' => false
    ]); ?>

<?= $this->Form->input('given_name', [
    'label' => false,
    'type'  => 'name',
    'placeholder' => '名',
    'class' => 'form-control col-xs-3',
    'style' => 'width:25%; background-color:'.$alert_color['given_name'],
    'error' => false
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('family_name_kana', [
    'label' => ['text' => 'フリガナ', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'name',
    'placeholder' => 'セイ',
    'class' => 'form-control col-xs-3',
    'style' => 'width:25%; background-color:'.$alert_color['family_name_kana'],
    'error' => false
    ]); ?>

<?= $this->Form->input('given_name_kana', [
    'label' => false,
    'type'  => 'name',
    'placeholder' => 'メイ',
    'class' => 'form-control col-xs-3',
    'style' => 'width:25%; background-color:'.$alert_color['given_name_kana'],
    'error' => false
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('phone_number', [
    'label' => ['text' => '電話番号', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'text',
    'placeholder' => '08012345678',
    'class' => 'form-control col-xs-7',
    'style' => 'width:50%; background-color:'.$alert_color['phone_number'],
    'error' => false
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('email', [
    'label' => ['text' => 'メールアドレス', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'text',
    'placeholder' => 'sample@mail.com',
    'class' => 'form-control col-xs-7',
    'style' => 'width:50%; background-color:'.$alert_color['email'],
    'error' => false
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('sex_code', [
    'label' => ['text' => '性別', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'select',
    'class' => 'form-control col-xs-3',
    'options' => $sex,
    'empty' => '選択して下さい'
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('birthdate', [
    'label' => ['text' => '生年月日', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'date',
    'dateFormat' => 'YMD',
    'monthNames' => false,
    'separator' => array('年', '月', '日'),
    'empty' => '-',
    'maxYear' => date('Y') - 15,
    'minYear' => date('Y') - 40,
    'class' => 'form-control',
    'style' => 'background-color:'.$alert_color['birthdate'],
    'error' => false
    ]); ?>
</div>
</div>

<!-- 郵便番号入力後、ajaxzipでaddressに住所を自動表示 -->
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('postalcode', [
    'label' => ['text' => '郵便番号', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'text',
    'placeholder' => '1234567',
    'onKeyUp' => "AjaxZip3.zip2addr(this,'','pref01','address');",
    'class' => 'form-control col-xs-7'
    ]); ?>
</div>
</div>

<!-- エントリーフォームが完成したらプルダウンに変更 -->
<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('region_id', [
    'label' => ['text' => '都道府県', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'select',
    'options' => $region_name,
    'empty' => '選択して下さい',
    'class' => 'form-control col-xs-3'
    ]); ?>
</div>
</div>

<!-- ajaxzip3の動作のため都道府県情報をhiddennで送信 -->
<input type="hidden" name="pref01" size="20">

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('address', [
    'label' => ['text' => '住所', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'text',
    'name' => 'address',
    'placeholder' => '千代田区1-2-3',
    'class' => 'form-control col-xs-7',
    'style' => 'width:50%'
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('large_purpose_code', [
    'label' => ['text' => '受講の目的(選択)', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'select',
    'options' => $purpose,
    'empty' => '選択して下さい',
    'class' => 'form-control col-xs-3'
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('detail_purpose', [
    'label' => ['text' => '受講の目的(詳細)', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'text',
    'rows' => '2',
    'placeholder' => 'フリー入力(任意)',
    'class' => 'form-control col-xs-7',
    'style' => 'width:50%; max-width:400px; max-height:60px'
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('studying_time', [
    'label' => ['text' => '学習時間帯', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'text',
    'placeholder' => '平日夜休日夜',
    'class' => 'form-control col-xs-7',
    'style' => 'width:50%'
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('come_to_office_time', [
    'label' => ['text' => 'オフィスに来られる曜日や時間帯', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'text',
    'placeholder' => '平日夜',
    'class' => 'form-control col-xs-7',
    'style' => 'width:50%'
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('using_pc_code', [
    'label' => ['text' => '使用PC', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'select',
    'empty' => '選択して下さい',
    'options' => $pc,
    'class' => 'form-control col-xs-3'
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('admission_month', [
    'label' => ['text' => '入学希望月', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'select',
    'options' => $month,
    'empty' => '選択して下さい',
    'class' => 'form-control col-xs-3'
    ]); ?>
</div>
</div>


<div class="form-group col-xs-12">
<div class="form-inline">&nbsp;</div>
</div>

<div class="col-xs-3"></div>
<div class="form-group text-left col-xs-8">
    <b>▼週次面談希望 ／ 曜日時間</b>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('first_preffered_date', [
    'label' => ['text' => '第一希望 (毎週)', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'text',
    'placeholder' => '―曜20時',
    'class' => 'form-control col-xs-7',
    'style' => 'width:50%'
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('second_preffered_date', [
    'label' => ['text' => '第二希望 (毎週)', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'text',
    'placeholder' => '―曜20時',
    'class' => 'form-control col-xs-7',
    'style' => 'width:50%'
    ]); ?>
</div>
</div>

<div class="form-group col-xs-12">
<div class="form-inline">
<?= $this->Form->input('third_preffered_date', [
    'label' => ['text' => '第三希望 (毎週)', 'class' => 'col-xs-3 h5 text-right'],
    'type'  => 'text',
    'placeholder' => '―曜20時',
    'class' => 'form-control col-xs-7',
    'style' => 'width:50%'
    ]); ?>
</div>
</div>

<?= $this->Form->hidden('id'); ?>
