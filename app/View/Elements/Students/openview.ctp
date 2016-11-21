<!-- ユーザー定義定数の読み出し -->
<?php
$week = Configure::read("week");
$sex = Configure::read("sex");
$purpose = Configure::read("purpose");
$pc = Configure::read("pc");
?>

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
    <td><?= h($student['Student']['phone_number']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">メールアドレス</td>
    <td><?= h($student['Student']['email']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">性別</td>
    <?php if($student['Student']['sex_code'] != null) :?>
        <td><?= $sex[h($student['Student']['sex_code'])] ;?></td>
    <?php endif;?>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">生年月日</td>
    <td><?= $this->Time->format(h($student['Student']['birthdate']),'%Y/%m/%d') ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">郵便番号</td>
    <td><?= h($student['Student']['postalcode']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">都道府県</td>
    <td><?= h($student['Region']['region_name']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">住所</td>
    <td><?= h($student['Student']['address']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">受講の目的(項目から指定)</td>
    <td>
        <?php if($student['Student']['large_purpose_code'] != null) :?>
            <?= $purpose[h($student['Student']['large_purpose_code'])] ;?>
        <?php endif ;?>
    </td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">受講の目的(フリー入力)</td>
    <td style="white-space:pre-wrap"><?= h($student['Student']['detail_purpose']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">学習時間帯</td>
    <td><?= h($student['Student']['studying_time']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">オフィスに来られる曜日や時間帯</td>
    <td><?= h($student['Student']['come_to_office_time']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">使用PC</td>
    <td>
        <?php if($student['Student']['using_pc_code'] != null) :?>
            <?= $pc[h($student['Student']['using_pc_code'])] ;?>
        <?php endif ;?>
    </td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">入学希望月</td>
    <td><?= h($student['Student']['admission_month']) ;?></td>
</tr>


<tr>
    <td style="width:40%; padding-top:20px;" class="text-right"><strong>▼週次面談希望曜日・時間</strong></td>
    <td></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">第一希望</td>
    <td><?= h($student['Student']['first_preffered_date']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">第二希望</td>
    <td><?= h($student['Student']['second_preffered_date']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">第三希望</td>
    <td><?= h($student['Student']['third_preffered_date']) ;?></td>
</tr>

<tr>
    <td style="width:40%; padding-top:20px;" class="text-right"><strong>▼面談希望日</strong></td>
    <td></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">第一希望</td>
    <td>
        <?php if($student['Student']['first_meet_datetime']) :?>
            <?= $this->Time->format(h($student['Student']['first_meet_datetime']),'%m/%d'. '(' .
            $week[$this->Time->format(h($student['Student']['first_meet_datetime']),'%w')].') / '.
            $this->Time->format(h($student['Student']['first_meet_datetime']),'%H:00')) ;?>
        <?php endif ;?>
    </td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">第二希望</td>
    <td>
        <?php if($student['Student']['second_meet_datetime']) :?>
            <?= $this->Time->format(h($student['Student']['second_meet_datetime']),'%m/%d'. '(' .
            $week[$this->Time->format(h($student['Student']['second_meet_datetime']),'%w')].') / '.
            $this->Time->format(h($student['Student']['second_meet_datetime']),'%H:00')) ;?>
        <?php endif ;?>
    </td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">第三希望</td>
    <td>
        <?php if($student['Student']['third_meet_datetime']) :?>
            <?= $this->Time->format(h($student['Student']['third_meet_datetime']),'%m/%d'. '(' .
            $week[$this->Time->format(h($student['Student']['third_meet_datetime']),'%w')].') / '.
            $this->Time->format(h($student['Student']['third_meet_datetime']),'%H:00')) ;?>
        <?php endif ;?>
    </td>
</tr>
