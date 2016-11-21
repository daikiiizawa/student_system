<!-- ユーザー定義定数の読み出し -->
<?php
$week = Configure::read("week");
$yomi = Configure::read("yomi");
$status = Configure::read("status");
$sex = Configure::read("sex");
$purpose = Configure::read("purpose");
$pc = Configure::read("pc");
?>


<tr>
    <td style="width:40%; padding-top:20px;" class="text-right"><strong>▼管理情報</strong></td>
    <td></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">生徒ステータス</td>
    <td>
        <?php if($student['Student']['students_status_code'] != null) :?>
            <?= $status[$student['Student']['students_status_code']] ;?>
        <?php endif ;?>
    </td>
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
    <td class="active text-right" style="width:40%;">備考</td>
    <td style="white-space:pre-wrap"><?= $student['Student']['comment'] ;?></td>
</tr>
