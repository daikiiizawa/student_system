<div class='container'>
<div class="col-md-10 col-md-offset-1">

<table class="table">
<h2>入力画面</h2>

<div class="well form-inline">
<div class="form-group">

<?= $this->Form->create('Student', [
    'url' => ['action' => 'add'],
    'type'  => 'post',
    'novalidate' => true,
    'class' => 'form-horizontal'
    ]); ?>

<div class="form-group col-xs-12">
<?= $this->Form->input('family_name', [
    'label' => ['text' => '氏名', 'class' => 'col-xs-5 text-right text-right'],
    'type'  => 'name',
    'placeholder' => '姓',
    'class' => 'col-xs-3'
    ]); ?>

<?= $this->Form->input('given_name', [
    'label' => false,
    'type'  => 'name',
    'placeholder' => '名',
    'class' => 'col-xs-3'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('family_name_kana', [
    'label' => ['text' => 'フリガナ', 'class' => 'col-xs-5 text-right'],
    'type'  => 'name',
    'placeholder' => 'セイ',
    'class' => 'col-xs-3'
    ]); ?>

<?= $this->Form->input('given_name_kana', [
    'label' => false,
    'type'  => 'name',
    'class' => 'col-xs-3',
    'placeholder' => 'メイ',
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('phone_number', [
    'label' => ['text' => '電話番号', 'class' => 'col-xs-5 text-right'],
    'type'  => 'text',
    'placeholder' => '08012345678',
    'class' => 'col-xs-7'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('email', [
    'label' => ['text' => 'メールアドレス', 'class' => 'col-xs-5 text-right'],
    'type'  => 'text',
    'placeholder' => 'sample@mail.com',
    'class' => 'col-xs-7'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('sex_code', [
    'label' => ['text' => '性別', 'class' => 'col-xs-5 text-right'],
    'type'  => 'select',
    'class' => 'col-xs-3',
    'options' => $sex,
    'empty' => '選択して下さい'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('birthdate', [
    'label' => ['text' => '生年月日', 'class' => 'col-xs-5 text-right'],
    'type'  => 'date',
    'dateFormat' => 'YMD',
    'monthNames' => false,
    'separator' => array('年', '月', '日'),
    'empty' => '-',
    'maxYear' => date('Y') - 15,
    'minYear' => date('Y') - 40
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('postalcode', [
    'label' => ['text' => '郵便番号', 'class' => 'col-xs-5 text-right'],
    'type'  => 'text',
    'placeholder' => '1234567',
    'class' => 'col-xs-7'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('region_code', [
    'label' => ['text' => '都道府県', 'class' => 'col-xs-5 text-right'],
    'type'  => 'text',
    'placeholder' => '東京都',
    'class' => 'col-xs-7'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('address', [
    'label' => ['text' => '住所', 'class' => 'col-xs-5 text-right'],
    'type'  => 'text',
    'placeholder' => '千代田区1-2-3',
    'class' => 'col-xs-7'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('large_purpose_code', [
    'label' => ['text' => '受講の目的(選択)', 'class' => 'col-xs-5 text-right'],
    'type'  => 'select',
    'options' => $purpose,
    'empty' => '選択して下さい',
    'class' => 'col-xs-3'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('detail_purpose', [
    'label' => ['text' => '受講の目的(フリー入力)', 'class' => 'col-xs-5 text-right'],
    'type'  => 'text',
    'rows' => '2',
    'placeholder' => '自由記述',
    'class' => 'col-xs-7'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('studying_time', [
    'label' => ['text' => '学習時間帯', 'class' => 'col-xs-5 text-right'],
    'type'  => 'text',
    'placeholder' => '例) 平日夜・休日夜',
    'class' => 'col-xs-7'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('come_to_office_time', [
    'label' => ['text' => 'オフィスに来られる曜日や時間帯', 'class' => 'col-xs-5 text-right'],
    'type'  => 'text',
    'placeholder' => '例) 平日夜',
    'class' => 'col-xs-7'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('using_pc_code', [
    'label' => ['text' => '使用PC', 'class' => 'col-xs-5 text-right'],
    'type'  => 'select',
    'empty' => '選択して下さい',
    'options' => $pc,
    'class' => 'col-xs-3'
    ]); ?>
</div>

<div class="form-group col-xs-12">&nbsp;</div>

<div class="form-group col-xs-5 text-right">
    <b>▼週次面談希望曜日・時間</b>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('first_preffered_date', [
    'label' => ['text' => '第一希望', 'class' => 'col-xs-5 text-right'],
    'type'  => 'text',
    'placeholder' => '例) 毎週木曜20時',
    'class' => 'col-xs-7'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('second_preffered_date', [
    'label' => ['text' => '第二希望', 'class' => 'col-xs-5 text-right'],
    'type'  => 'text',
    'placeholder' => '例) 毎週木曜20時',
    'class' => 'col-xs-7'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('third_preffered_date', [
    'label' => ['text' => '第三希望', 'class' => 'col-xs-5 text-right'],
    'type'  => 'text',
    'placeholder' => '例) 毎週木曜20時',
    'class' => 'col-xs-7'
    ]); ?>
</div>

<div class="form-group col-xs-12">&nbsp;</div>

<div class="form-group col-xs-5 text-right">
    <b>▼面談希望日</b>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('first_meet_datetime', [
    'label' => ['text' => '第一希望', 'class' => 'col-xs-5 text-right'],
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
<?= $this->Form->input('second_meet_datetime', [
    'label' => ['text' => '第二希望', 'class' => 'col-xs-5 text-right'],
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
<?= $this->Form->input('third_meet_datetime', [
    'label' => ['text' => '第三希望', 'class' => 'col-xs-5 text-right'],
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

<div class="form-group col-xs-12">&nbsp;</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('students_status_code', [
    'label' => ['text' => '生徒ステータス', 'class' => 'col-xs-5 text-right'],
    'type'  => 'select',
    'options' => $status,
    'empty' => '選択して下さい',
    'class' => 'col-xs-3'
    ]); ?>
</div>

<div class="form-group col-xs-12">
<?= $this->Form->input('admission_month', [
    'label' => ['text' => '入学希望月', 'class' => 'col-xs-5 text-right'],
    'type'  => 'select',
    'options' => $month,
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
<?= $this->Form->input('affiliate_id', [
    'label' => ['text' => 'ID', 'class' => 'col-xs-5 text-right'],
    'type'  => 'text',
    'class' => 'col-xs-7'
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

</div>
</div>

<div class="btn-toolbar">
<div class="col-xs-5"></div>
<?= $this->Form->end([
    'label' => '登録',
    'class' => 'btn-group btn btn-primary',
    'style' => 'margin: 0px 10px 20px 0px;'
    ]); ?>&#010;


<?= $this->Html->link(
    '戻る', ['action' => 'index'], [
    'class' => 'btn-group btn btn-default',
    'style' => 'margin: 0px 0px 20px 0px;'
    ]) ;?>
</div>
</div>

</table>

</div>
</div>
