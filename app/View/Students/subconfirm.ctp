<div class='container'>
<div class="col-md-8 col-md-offset-2">

<table class="table">
<h2>確認画面</h2>
<p class="text-danger">※赤枠の箇所が更新されます</p>
    <tbody>
        <?= $this->element('Students/openconfirm'); ?>
    </tbody>
</table>


<div class="btn-toolbar">
<div class="col-xs-5"></div>
<?= $this->Form->create('Student', [
    'url' => ["action" => "subsave"],
    "type" => "post"
    ]);?>

<?= $this->Form->hidden('id'); ?>
<?= $this->Form->hidden('family_name'); ?>
<?= $this->Form->hidden('given_name'); ?>
<?= $this->Form->hidden('family_name_kana'); ?>
<?= $this->Form->hidden('given_name_kana'); ?>
<?= $this->Form->hidden('phone_number'); ?>
<?= $this->Form->hidden('email'); ?>
<?= $this->Form->hidden('sex_code'); ?>
<?= $this->Form->hidden('birthdate',['value' => $birthdate]); ?>
<?= $this->Form->hidden('postalcode'); ?>
<?= $this->Form->hidden('region_id'); ?>
<?= $this->Form->hidden('address', ['value' => $confirm['address']]); ?>
<?= $this->Form->hidden('large_purpose_code'); ?>
<?= $this->Form->hidden('detail_purpose'); ?>
<?= $this->Form->hidden('studying_time'); ?>
<?= $this->Form->hidden('come_to_office_time'); ?>
<?= $this->Form->hidden('using_pc_code'); ?>
<?= $this->Form->hidden('admission_month'); ?>
<?= $this->Form->hidden('first_preffered_date'); ?>
<?= $this->Form->hidden('second_preffered_date'); ?>
<?= $this->Form->hidden('third_preffered_date'); ?>
<?= $this->Form->hidden('first_meet_datetime',['value' => $firstdate]); ?>
<?= $this->Form->hidden('second_meet_datetime',['value' => $seconddate]); ?>
<?= $this->Form->hidden('third_meet_datetime',['value' => $thirddate]); ?>

<?= $this->Form->end([
    'label' => '更新',
    'class' => 'btn-group btn btn-primary',
    'style' => 'margin: 0px 10px 20px 0px;'
    ]); ?>&#010;


<?= $this->Form->create('Student', [
    'url' => ["action" => "subedit"],
    "type" => "post"
    ]);?>

<?= $this->Form->hidden('id'); ?>
<?= $this->Form->hidden('family_name'); ?>
<?= $this->Form->hidden('given_name'); ?>
<?= $this->Form->hidden('family_name_kana'); ?>
<?= $this->Form->hidden('given_name_kana'); ?>
<?= $this->Form->hidden('phone_number'); ?>
<?= $this->Form->hidden('email'); ?>
<?= $this->Form->hidden('sex_code'); ?>
<?= $this->Form->hidden('birthdate',['value' => $birthdate]); ?>
<?= $this->Form->hidden('postalcode'); ?>
<?= $this->Form->hidden('region_id'); ?>
<?= $this->Form->hidden('address', ['value' => $confirm['address']]); ?>
<?= $this->Form->hidden('large_purpose_code'); ?>
<?= $this->Form->hidden('detail_purpose'); ?>
<?= $this->Form->hidden('studying_time'); ?>
<?= $this->Form->hidden('come_to_office_time'); ?>
<?= $this->Form->hidden('using_pc_code'); ?>
<?= $this->Form->hidden('admission_month'); ?>
<?= $this->Form->hidden('first_preffered_date'); ?>
<?= $this->Form->hidden('second_preffered_date'); ?>
<?= $this->Form->hidden('third_preffered_date'); ?>
<?= $this->Form->hidden('first_meet_datetime',['value' => $firstdate]); ?>
<?= $this->Form->hidden('second_meet_datetime',['value' => $seconddate]); ?>
<?= $this->Form->hidden('third_meet_datetime',['value' => $thirddate]); ?>


<?= $this->Form->end([
    'label' => '戻る',
    'class' => 'btn-group btn btn-default',
    'style' => 'margin: 0px 10px 20px 0px;'
    ]); ?>&#010;

</div>
</div>