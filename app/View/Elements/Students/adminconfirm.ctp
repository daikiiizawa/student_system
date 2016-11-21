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
    <td class="active text-right" style="width:40%;">備考</td>
    <?php if ($confirm['Student']['comment'] != $student['Student']['comment']):?>
        <td class="bg-danger">
    <?php else:?>
        <td>
    <?php endif;?>
    <span style="white-space:pre-wrap"><?= $confirm['Student']['comment'] ;?></span></td>
</tr>
