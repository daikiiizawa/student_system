<div class='container'>
<div class="col-md-8 col-md-offset-2">

<table class="table">
<h2>詳細画面</h2>
    <tbody>
        <tr>
            <td class="active text-right" style="width:40%;">氏名</td>
            <td><?= h($student['Student']['family_name']) . ' '. h($student['Student']['given_name']) ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">フリガナ</td>
            <td><?= h($student['Student']['family_name_kana']) . ' '. h($student['Student']['given_name_kana']) ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">電話番号</td>
            <td><?= $student['Student']['phone_number'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">メールアドレス</td>
            <td><?= $student['Student']['email'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">性別</td>
            <td><?= $sex[$student['Student']['sex_code']] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">生年月日</td>
            <td><?= h($this->Time->format($student['Student']['birthdate'],'%Y/%m/%d')) ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">郵便番号</td>
            <td><?= $student['Student']['postalcode'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">都道府県</td>
            <td><?= $student['Student']['region_code'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">住所</td>
            <td><?= $student['Student']['address'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">受講の目的(項目から指定)</td>
            <td>
                <?php if($student['Student']['large_purpose_code'] != null) :?>
                    <?= $purpose[$student['Student']['large_purpose_code']] ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">受講の目的(フリー入力)</td>
            <td><?= $student['Student']['detail_purpose'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">学習時間帯</td>
            <td><?= $student['Student']['studying_time'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">オフィスに来られる曜日や時間帯</td>
            <td><?= $student['Student']['come_to_office_time'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">使用PC</td>
            <td>
                <?php if($student['Student']['using_pc_code'] != null) :?>
                    <?= $pc[$student['Student']['using_pc_code']] ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td style="width:40%; padding-top:20px;" class="text-right"><strong>▼週次面談希望曜日・時間</strong></td>
            <td></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第一希望</td>
            <td><?= $student['Student']['first_preffered_date'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第二希望</td>
            <td><?= $student['Student']['second_preffered_date'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第三希望</td>
            <td><?= $student['Student']['third_preffered_date'] ;?></td>
        </tr>

        <tr>
            <td style="width:40%; padding-top:20px;" class="text-right"><strong>▼面談希望日</strong></td>
            <td></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第一希望</td>
            <td>
                <?php if($student['Student']['first_meet_datetime']) :?>
                    <?= h($this->Time->format($student['Student']['first_meet_datetime'],'%m/%d'). '(' .
                    $week[$this->Time->format($student['Student']['first_meet_datetime'],'%w')].') / '.
                    $this->Time->format($student['Student']['first_meet_datetime'],'%H:00')) ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第二希望</td>
            <td>
                <?php if($student['Student']['second_meet_datetime']) :?>
                    <?= h($this->Time->format($student['Student']['second_meet_datetime'],'%m/%d'). '(' .
                    $week[$this->Time->format($student['Student']['second_meet_datetime'],'%w')].') / '.
                    $this->Time->format($student['Student']['second_meet_datetime'],'%H:00')) ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">第三希望</td>
            <td>
                <?php if($student['Student']['third_meet_datetime']) :?>
                    <?= h($this->Time->format($student['Student']['third_meet_datetime'],'%m/%d'). '(' .
                    $week[$this->Time->format($student['Student']['third_meet_datetime'],'%w')].') / '.
                    $this->Time->format($student['Student']['third_meet_datetime'],'%H:00')) ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr><td></td><td></td></tr>

        <tr>
            <td class="active text-right" style="width:40%;">生徒ステータス</td>
            <td><?= $status[$student['Student']['students_status_code']] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">入学希望月</td>
            <td><?= $student['Student']['admission_month'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">最終連絡日</td>
            <td>
                <?php if($student['Student']['last_contact_datetime']) :?>
                    <?= h($this->Time->format($student['Student']['last_contact_datetime'],'%m/%d'). '(' .
                    $week[$this->Time->format($student['Student']['last_contact_datetime'],'%w')].') / '.
                    $this->Time->format($student['Student']['last_contact_datetime'],'%H:00')) ;?>
                <?php endif ;?>
            </td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">ヨミ</td>
            <td>
                <?php if($student['Student']['yomi_code'] != null) :?>
                    <?= $yomi[$student['Student']['yomi_code']] ;?></td>
                <?php endif ;?>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">ID</td>
            <td><?= $student['Student']['affiliate_id'] ;?></td>
        </tr>

        <tr>
            <td class="active text-right" style="width:40%;">備考</td>
            <td><?= $student['Student']['comment'] ;?></td>
        </tr>
    </tbody>
</table>

<div class="col-xs-5"></div>
<?= $this->Html->link(
    '編集', ['action' => 'edit', $student['Student']['id']], [
    'class' => 'btn btn-primary',
    'style' => 'margin: 10px 0px 30px 0px;'
    ]) ;?>&nbsp;

<?= $this->Html->link(
    '戻る', ['action' => 'index', 'students_status_code' => '0'], [
    'class' => 'btn btn-default',
    'style' => 'margin: 10px 0px 30px 0px;'
    ]) ;?>

</div>
</div>