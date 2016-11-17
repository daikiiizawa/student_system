<!-- ユーザー定義定数の読み出し -->
<?php
$week = Configure::read("week");
$yomi = Configure::read("yomi");
$status = Configure::read("status");
$sex = Configure::read("sex");
$purpose = Configure::read("purpose");
$pc = Configure::read("pc");
?>


<div class='container'>
<div class="col-md-8 col-md-offset-2">

<table class="table">
<h2>確認画面</h2>
<p class="text-danger">※赤枠の箇所が更新されます</p>
    <tbody>
        <tr>
            <td class="active text-right" style="width:40%;">氏名</td>
            <?php if ($confirm['Student']['family_name'].$confirm['Student']['given_name'] != $student['Student']['family_name'].$student['Student']['given_name']) :?>
                <td class="bg-danger">
            <?php else :?>
                <td>
            <?php endif ;?>
            <?= h($confirm['Student']['family_name']) . ' '. h($confirm['Student']['given_name']) ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">フリガナ</td>
            <?php if ($confirm['Student']['family_name_kana'].$confirm['Student']['given_name_kana'] != $student['Student']['family_name_kana'].$student['Student']['given_name_kana']) :?>
                <td class="bg-danger">
            <?php else :?>
                <td>
            <?php endif ;?>
            <?= h($confirm['Student']['family_name_kana']) . ' '. h($confirm['Student']['given_name_kana']) ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">電話番号</td>
            <?php if ($confirm['Student']['phone_number'] != $student['Student']['phone_number']) :?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif;?>
            <?= $confirm['Student']['phone_number'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">メールアドレス</td>
            <?php if ($confirm['Student']['email'] != $student['Student']['email']) :?>
                <td class="bg-danger">
            <?php else :?>
                <td>
            <?php endif;?>
            <?= $confirm['Student']['email'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">性別</td>
            <?php if ($confirm['Student']['sex_code'] != $student['Student']['sex_code']) :?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif ;?>
            <?php if($confirm['Student']['sex_code'] != null):?>
                <?= $sex[$confirm['Student']['sex_code']] ;?>
            <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">生年月日</td>
            <?php if ($confirm['Student']['birthdate'] != $student['Student']['birthdate']):?>
                <td class="bg-danger">
            <?php else :?>
                <td>
            <?php endif ;?>
            <?= h($this->Time->format($birthdate,'%Y/%m/%d')) ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">郵便番号</td>
            <?php if ($confirm['Student']['postalcode'] != $student['Student']['postalcode']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif ;?>
            <?= $confirm['Student']['postalcode'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">都道府県</td>
            <?php if ($confirm['Student']['region_id'] != $student['Student']['region_id']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif ;?>
            <?= $regions[$confirm['Student']['region_id']] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">住所</td>
            <?php if ($confirm['Student']['address'] != $student['Student']['address']):?>
                <td class="bg-danger">
            <?php else :?>
                <td>
            <?php endif ;?>
            <?= $confirm['Student']['address'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">受講の目的(項目から指定)</td>
            <?php if ($confirm['Student']['large_purpose_code'] != $student['Student']['large_purpose_code']):?>
                <td class="bg-danger">
            <?php else :?>
                <td>
            <?php endif ;?>
            <?php if($confirm['Student']['large_purpose_code'] != null) :?>
                <?= $purpose[$confirm['Student']['large_purpose_code']] ;?>
            <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">受講の目的(フリー入力)</td>
            <?php if ($confirm['Student']['detail_purpose'] != $student['Student']['detail_purpose']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif ?>
            <?= $confirm['Student']['detail_purpose'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">学習時間帯</td>
            <?php if ($confirm['Student']['studying_time'] != $student['Student']['studying_time']):?>
                <td class="bg-danger">
            <?php else :?>
                <td>
            <?php endif;?>
            <?= $confirm['Student']['studying_time'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">オフィスに来られる曜日や時間帯</td>
            <?php if ($confirm['Student']['come_to_office_time'] != $student['Student']['come_to_office_time']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif;?>
            <?= $confirm['Student']['come_to_office_time'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">使用PC</td>
            <?php if ($confirm['Student']['using_pc_code'] != $student['Student']['using_pc_code']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif;?>
            <?php if($confirm['Student']['using_pc_code'] != null) :?>
                <?= $pc[$confirm['Student']['using_pc_code']] ;?>
            <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">入学希望月</td>
            <?php if ($confirm['Student']['admission_month'] != $student['Student']['admission_month']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif;?>
            <?= $confirm['Student']['admission_month'] ;?></td>
        </tr>

        <tr>
            <td style="width:40%; padding-top:20px;" class="text-right"><strong>▼週次面談希望曜日・時間</strong></td>
            <td></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第一希望</td>
            <?php if ($confirm['Student']['first_preffered_date'] != $student['Student']['first_preffered_date']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif;?>
            <?= $confirm['Student']['first_preffered_date'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第二希望</td>
            <?php if ($confirm['Student']['second_preffered_date'] != $student['Student']['second_preffered_date']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif;?>
            <?= $confirm['Student']['second_preffered_date'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第三希望</td>
            <?php if ($confirm['Student']['third_preffered_date'] != $student['Student']['third_preffered_date']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif;?>
            <?= $confirm['Student']['third_preffered_date'] ;?></td>
        </tr>

        <tr>
            <td style="width:40%; padding-top:20px;" class="text-right"><strong>▼面談希望日</strong></td>
            <td></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第一希望</td>
            <?php if ($confirm['Student']['first_meet_datetime'] != $student['Student']['first_meet_datetime']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif;?>
                <?php if($confirm['Student']['first_meet_datetime']) :?>
                    <?= h($this->Time->format($firstdate,'%m/%d'). '(' .
                    $week[$this->Time->format($firstdate,'%w')].') / '.
                    $this->Time->format($firstdate,'%H:00')) ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第二希望</td>
            <?php if ($confirm['Student']['second_meet_datetime'] != $student['Student']['second_meet_datetime']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif;?>
                <?php if($confirm['Student']['second_meet_datetime']) :?>
                    <?= h($this->Time->format($seconddate,'%m/%d'). '(' .
                    $week[$this->Time->format($seconddate,'%w')].') / '.
                    $this->Time->format($seconddate,'%H:00')) ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第三希望</td>
            <?php if ($confirm['Student']['third_meet_datetime'] != $student['Student']['third_meet_datetime']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif;?>
                <?php if($confirm['Student']['third_meet_datetime']) :?>
                    <?= h($this->Time->format($thirddate,'%m/%d'). '(' .
                    $week[$this->Time->format($thirddate,'%w')].') / '.
                    $this->Time->format($thirddate,'%H:00')) ;?>
                <?php endif ;?>
            </td>
        </tr>

    <?php if(!empty($currentUser)) :?>
        <tr>
            <td style="width:40%; padding-top:20px;" class="text-right"><strong>▼管理情報</strong></td>
            <td></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">生徒ステータス</td>
            <?php if ($confirm['Student']['students_status_code'] != $student['Student']['students_status_code']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif;?>
                <?php if($confirm['Student']['students_status_code'] != null) :?>
                    <?= $status[$confirm['Student']['students_status_code']] ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">最終連絡日</td>
            <?php if ($confirm['Student']['last_contact_datetime'] != $student['Student']['last_contact_datetime']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif;?>
                <?php if($confirm['Student']['last_contact_datetime']) :?>
                    <?= h($this->Time->format($contactdate,'%m/%d'). '(' .
                    $week[$this->Time->format($contactdate,'%w')].') / '.
                    $this->Time->format($contactdate,'%H:00')) ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">ヨミ</td>
            <?php if ($confirm['Student']['yomi_code'] != $student['Student']['yomi_code']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif;?>
                <?php if($confirm['Student']['yomi_code'] != null) :?>
                    <?= $yomi[$confirm['Student']['yomi_code']] ;?></td>
                <?php endif ;?>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">ID</td>
            <?php if ($confirm['Student']['affiliate_id'] != $student['Student']['affiliate_id']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif;?>
            <?= $confirm['Student']['affiliate_id'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">備考</td>
            <?php if ($confirm['Student']['comment'] != $student['Student']['comment']):?>
                <td class="bg-danger">
            <?php else:?>
                <td>
            <?php endif;?>
            <?= $confirm['Student']['comment'] ;?></td>
        </tr>
    <?php endif ?>
    </tbody>
</table>


<div class="btn-toolbar">
<div class="col-xs-5"></div>
<?= $this->Form->create('Student', [
    'url' => ["action" => "save"],
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
<?php if($currentUser) :?>
<?= $this->Form->hidden('students_status_code'); ?>
<?= $this->Form->hidden('last_contact_datetime',['value' => $contactdate]); ?>
<?= $this->Form->hidden('yomi_code'); ?>
<?= $this->Form->hidden('affiliate_id'); ?>
<?= $this->Form->hidden('comment'); ?>
<?php endif;?>

<?= $this->Form->end([
    'label' => '更新',
    'class' => 'btn-group btn btn-primary',
    'style' => 'margin: 0px 10px 20px 0px;'
    ]); ?>&#010;


<?= $this->Form->create('Student', [
    'url' => ["action" => "edit"],
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
<?php if($currentUser) :?>
<?= $this->Form->hidden('students_status_code'); ?>
<?= $this->Form->hidden('last_contact_datetime',['value' => $contactdate]); ?>
<?= $this->Form->hidden('yomi_code'); ?>
<?= $this->Form->hidden('affiliate_id'); ?>
<?= $this->Form->hidden('comment'); ?>
<?php endif;?>

<?= $this->Form->end([
    'label' => '戻る',
    'class' => 'btn-group btn btn-default',
    'style' => 'margin: 0px 10px 20px 0px;'
    ]); ?>&#010;

</div>
</div>