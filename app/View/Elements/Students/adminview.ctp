<!-- ユーザー定義定数の読み出し -->
<?php
$week = Configure::read("week");
$yomi = Configure::read("yomi");
$status = Configure::read("status");
?>

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
            $this->Time->format(h($student['Student']['first_meet_datetime']),'%H:%M')) ;?>
        <?php endif ;?>
    </td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">第二希望</td>
    <td>
        <?php if($student['Student']['second_meet_datetime']) :?>
            <?= $this->Time->format(h($student['Student']['second_meet_datetime']),'%m/%d'. '(' .
            $week[$this->Time->format(h($student['Student']['second_meet_datetime']),'%w')].') / '.
            $this->Time->format(h($student['Student']['second_meet_datetime']),'%H:%M')) ;?>
        <?php endif ;?>
    </td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">第三希望</td>
    <td>
        <?php if($student['Student']['third_meet_datetime']) :?>
            <?= $this->Time->format(h($student['Student']['third_meet_datetime']),'%m/%d'. '(' .
            $week[$this->Time->format(h($student['Student']['third_meet_datetime']),'%w')].') / '.
            $this->Time->format(h($student['Student']['third_meet_datetime']),'%H:%M')) ;?>
        <?php endif ;?>
    </td>
</tr>

<tr>
    <td style="width:40%; padding-top:20px;" class="text-right"><strong>▼管理情報</strong></td>
    <td></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">生徒ステータス</td>
    <td>
        <?php if($student['Student']['students_status_code'] != null) :?>
            <?= h($status[$student['Student']['students_status_code']]) ;?>
        <?php endif ;?>
    </td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">最終連絡日</td>
    <td>
        <?php if($student['Student']['last_contact_datetime']) :?>
            <?= $this->Time->format(h($student['Student']['last_contact_datetime']),'%m/%d'. '(' .
            $week[$this->Time->format(h($student['Student']['last_contact_datetime']),'%w')].') / '.
            $this->Time->format(h($student['Student']['last_contact_datetime']),'%H:%M')) ;?>
        <?php endif ;?>
    </td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">ヨミ</td>
    <td>
        <?php if($student['Student']['yomi_code'] != null) :?>
            <?= h($yomi[$student['Student']['yomi_code']]) ;?></td>
        <?php endif ;?>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">備考</td>
    <td style="white-space:pre-wrap"><?= h($student['Student']['comment']) ;?></td>
</tr>
