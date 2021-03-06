<!-- ユーザー定義定数の読み出し -->
<?php
$week = Configure::read("week");
$sex = Configure::read("sex");
$purpose = Configure::read("purpose");
$pc = Configure::read("pc");
?>

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
    <?= h($confirm['Student']['phone_number']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">メールアドレス</td>
    <?php if ($confirm['Student']['email'] != $student['Student']['email']) :?>
        <td class="bg-danger">
    <?php else :?>
        <td>
    <?php endif;?>
    <?= h($confirm['Student']['email']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">性別</td>
    <?php if ($confirm['Student']['sex_code'] != $student['Student']['sex_code']) :?>
        <td class="bg-danger">
    <?php else:?>
        <td>
    <?php endif ;?>
    <?php if($confirm['Student']['sex_code'] != null):?>
        <?= $sex[h($confirm['Student']['sex_code'])] ;?>
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
    <?= $this->Time->format(h($birthdate),'%Y/%m/%d') ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">郵便番号</td>
    <?php if ($confirm['Student']['postalcode'] != $student['Student']['postalcode']):?>
        <td class="bg-danger">
    <?php else:?>
        <td>
    <?php endif ;?>
    <?= h($confirm['Student']['postalcode']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">都道府県</td>
    <?php if ($confirm['Student']['region_id'] != $student['Student']['region_id']):?>
        <td class="bg-danger">
    <?php else:?>
        <td>
    <?php endif ;?>
    <?= $regions[h($confirm['Student']['region_id'])] ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">住所</td>
    <?php if ($confirm['Student']['address'] != $student['Student']['address']):?>
        <td class="bg-danger">
    <?php else :?>
        <td>
    <?php endif ;?>
    <?= h($confirm['Student']['address']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">受講の目的(項目から指定)</td>
    <?php if ($confirm['Student']['large_purpose_code'] != $student['Student']['large_purpose_code']):?>
        <td class="bg-danger">
    <?php else :?>
        <td>
    <?php endif ;?>
    <?php if($confirm['Student']['large_purpose_code'] != null) :?>
        <?= $purpose[h($confirm['Student']['large_purpose_code'])] ;?>
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
    <span style="white-space:pre-wrap"><?= h($confirm['Student']['detail_purpose']) ;?></span></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">学習時間帯</td>
    <?php if ($confirm['Student']['studying_time'] != $student['Student']['studying_time']):?>
        <td class="bg-danger">
    <?php else :?>
        <td>
    <?php endif;?>
    <?= h($confirm['Student']['studying_time']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">オフィスに来られる曜日や時間帯</td>
    <?php if ($confirm['Student']['come_to_office_time'] != $student['Student']['come_to_office_time']):?>
        <td class="bg-danger">
    <?php else:?>
        <td>
    <?php endif;?>
    <?= h($confirm['Student']['come_to_office_time']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">使用PC</td>
    <?php if ($confirm['Student']['using_pc_code'] != $student['Student']['using_pc_code']):?>
        <td class="bg-danger">
    <?php else:?>
        <td>
    <?php endif;?>
    <?php if($confirm['Student']['using_pc_code'] != null) :?>
        <?= $pc[h($confirm['Student']['using_pc_code'])] ;?>
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
    <?= h($confirm['Student']['admission_month']) ;?></td>
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
    <?= h($confirm['Student']['first_preffered_date']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">第二希望</td>
    <?php if ($confirm['Student']['second_preffered_date'] != $student['Student']['second_preffered_date']):?>
        <td class="bg-danger">
    <?php else:?>
        <td>
    <?php endif;?>
    <?= h($confirm['Student']['second_preffered_date']) ;?></td>
</tr>

<tr>
    <td class="active text-right" style="width:40%;">第三希望</td>
    <?php if ($confirm['Student']['third_preffered_date'] != $student['Student']['third_preffered_date']):?>
        <td class="bg-danger">
    <?php else:?>
        <td>
    <?php endif;?>
    <?= h($confirm['Student']['third_preffered_date']) ;?></td>
</tr>