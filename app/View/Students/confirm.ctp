<div class='container'>
<div class="col-md-8 col-md-offset-2">

<table class="table">
<h2>確認画面</h2>
<p class="text-danger">※赤枠の箇所が更新されます</p>
    <b>↑↑↑今は氏名のみ対応済→この書き方がダサい気がする</b>

    <tbody>
        <tr>
            <?php if ($confirm['Student']['family_name'].$confirm['Student']['given_name'] != $student['Student']['family_name'].$student['Student']['given_name']) :?>
                <td class="active text-right" style="width:40%;">氏名</td>
                <td class="bg-danger"><?= h($confirm['Student']['family_name']) . ' '. h($confirm['Student']['given_name']) ;?></td>
            <?php else :?>
                <td class="active text-right" style="width:40%;">氏名</td>
                <td><?= h($confirm['Student']['family_name']).' '.h($confirm['Student']['given_name']) ;?></td>
            <?php endif ;?>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">フリガナ</td>
            <td><?= h($confirm['Student']['family_name_kana']) . ' '. h($confirm['Student']['given_name_kana']) ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">電話番号</td>
            <td><?= $confirm['Student']['phone_number'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">メールアドレス</td>
            <td><?= $confirm['Student']['email'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">性別</td>
            <td>
                <?php if($confirm['Student']['sex_code'] != null):?>
                    <?= $sex[$confirm['Student']['sex_code']] ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">生年月日</td>
            <td><?= h($this->Time->format($birthdate,'%Y/%m/%d')) ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">郵便番号</td>
            <td><?= $confirm['Student']['postalcode'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">都道府県</td>
            <td><?= $confirm['Student']['region_code'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">住所</td>
            <td><?= $confirm['Student']['address'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">受講の目的(項目から指定)</td>
            <td>
                <?php if($confirm['Student']['large_purpose_code'] != null) :?>
                    <?= $purpose[$confirm['Student']['large_purpose_code']] ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">受講の目的(フリー入力)</td>
            <td><?= $confirm['Student']['detail_purpose'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">学習時間帯</td>
            <td><?= $confirm['Student']['studying_time'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">オフィスに来られる曜日や時間帯</td>
            <td><?= $confirm['Student']['come_to_office_time'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">使用PC</td>
            <td>
                <?php if($confirm['Student']['using_pc_code'] != null) :?>
                    <?= $pc[$confirm['Student']['using_pc_code']] ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td style="width:40%; padding-top:20px;" class="text-right"><strong>▼週次面談希望曜日・時間</strong></td>
            <td></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第一希望</td>
            <td><?= $confirm['Student']['first_preffered_date'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第二希望</td>
            <td><?= $confirm['Student']['second_preffered_date'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第三希望</td>
            <td><?= $confirm['Student']['third_preffered_date'] ;?></td>
        </tr>

        <tr>
            <td style="width:40%; padding-top:20px;" class="text-right"><strong>▼面談希望日</strong></td>
            <td></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第一希望</td>
            <td>
                <?php if($confirm['Student']['first_meet_datetime']) :?>
                    <?= h($this->Time->format($firstdate,'%m/%d'). '(' .
                    $week[$this->Time->format($firstdate,'%w')].') / '.
                    $this->Time->format($firstdate,'%H:00')) ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第二希望</td>
            <td>
                <?php if($confirm['Student']['second_meet_datetime']) :?>
                    <?= h($this->Time->format($seconddate,'%m/%d'). '(' .
                    $week[$this->Time->format($seconddate,'%w')].') / '.
                    $this->Time->format($seconddate,'%H:00')) ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第三希望</td>
            <td>
                <?php if($confirm['Student']['third_meet_datetime']) :?>
                    <?= h($this->Time->format($thirddate,'%m/%d'). '(' .
                    $week[$this->Time->format($thirddate,'%w')].') / '.
                    $this->Time->format($thirddate,'%H:00')) ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr><td></td><td></td></tr>

        <tr>
            <td class="active text-right" style="width:40%;">生徒ステータス</td>
            <td>
                <?php if($confirm['Student']['students_status_code'] != null) :?>
                    <?= $status[$confirm['Student']['students_status_code']] ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">入学希望月</td>
            <td><?= $confirm['Student']['admission_month'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">最終連絡日</td>
            <td>
                <?php if($confirm['Student']['last_contact_datetime']) :?>
                    <?= h($this->Time->format($contactdate,'%m/%d'). '(' .
                    $week[$this->Time->format($contactdate,'%w')].') / '.
                    $this->Time->format($contactdate,'%H:00')) ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">ヨミ</td>
            <td>
                <?php if($confirm['Student']['yomi_code'] != null) :?>
                    <?= $yomi[$confirm['Student']['yomi_code']] ;?></td>
                <?php endif ;?>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">ID</td>
            <td><?= $confirm['Student']['affiliate_id'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">備考</td>
            <td><?= $confirm['Student']['comment'] ;?></td>
        </tr>
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
<?= $this->Form->hidden('region_code'); ?>
<?= $this->Form->hidden('address'); ?>
<?= $this->Form->hidden('large_purpose_code'); ?>
<?= $this->Form->hidden('detail_purpose'); ?>
<?= $this->Form->hidden('studying_time'); ?>
<?= $this->Form->hidden('come_to_office_time'); ?>
<?= $this->Form->hidden('using_pc_code'); ?>
<?= $this->Form->hidden('first_preffered_date'); ?>
<?= $this->Form->hidden('second_preffered_date'); ?>
<?= $this->Form->hidden('third_preffered_date'); ?>
<?= $this->Form->hidden('first_meet_datetime',['value' => $firstdate]); ?>
<?= $this->Form->hidden('second_meet_datetime',['value' => $seconddate]); ?>
<?= $this->Form->hidden('third_meet_datetime',['value' => $thirddate]); ?>
<?= $this->Form->hidden('students_status_code'); ?>
<?= $this->Form->hidden('admission_month'); ?>
<?= $this->Form->hidden('last_contact_datetime',['value' => $contactdate]); ?>
<?= $this->Form->hidden('yomi_code'); ?>
<?= $this->Form->hidden('affiliate_id'); ?>
<?= $this->Form->hidden('comment'); ?>

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
<?= $this->Form->hidden('region_code'); ?>
<?= $this->Form->hidden('address'); ?>
<?= $this->Form->hidden('large_purpose_code'); ?>
<?= $this->Form->hidden('detail_purpose'); ?>
<?= $this->Form->hidden('studying_time'); ?>
<?= $this->Form->hidden('come_to_office_time'); ?>
<?= $this->Form->hidden('using_pc_code'); ?>
<?= $this->Form->hidden('first_preffered_date'); ?>
<?= $this->Form->hidden('second_preffered_date'); ?>
<?= $this->Form->hidden('third_preffered_date'); ?>
<?= $this->Form->hidden('first_meet_datetime',['value' => $firstdate]); ?>
<?= $this->Form->hidden('second_meet_datetime',['value' => $seconddate]); ?>
<?= $this->Form->hidden('third_meet_datetime',['value' => $thirddate]); ?>
<?= $this->Form->hidden('students_status_code'); ?>
<?= $this->Form->hidden('admission_month'); ?>
<?= $this->Form->hidden('last_contact_datetime',['value' => $contactdate]); ?>
<?= $this->Form->hidden('yomi_code'); ?>
<?= $this->Form->hidden('affiliate_id'); ?>
<?= $this->Form->hidden('comment'); ?>

<?= $this->Form->end([
    'label' => '戻る',
    'class' => 'btn-group btn btn-default',
    'style' => 'margin: 0px 10px 20px 0px;'
    ]); ?>&#010;

</div>
</div>