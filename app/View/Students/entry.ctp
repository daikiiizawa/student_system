<!-- ユーザー定義定数の読み出し -->
<?php
$region_name = Configure::read("region_name");
$programming_lv = Configure::read("programming_lv");
?>

<div style="margin-bottom:50px;", class="container">
    <h2>さあ、次はあなたの番です。</h2>
    <div style="margin-top:30px;">あなたのために整えられた最高の学習環境で学び、そしてあなたの人生を変えるチャンスが今あります。</div>
    <h2 style="margin-top:30px;">【期間限定】個別無料相談を実施中。</h2>
    <div style="margin-top:30px;">無料相談期間は定員に達し次第まもなく終了しますので、エントリーはお早めに！</div>

    <div style="margin-top:30px;", class="form-horizontal">

        <!--  バリデーションエラーの表示　-->
        <?php foreach($this->validationErrors['Student'] as $key => $error):?>
            <p class="error-message"><?= $error[0]; ?></p>
        <?php endforeach; ?>
        <!--  バリデーションエラーの表示　-->

        <?= $this->Form->create('Student'); ?>
        <div class="form-group">
            <div class="form-inline">
                <?= $this->Form->input('family_name', [
                    'label' => false,
                    'type'  => 'name',
                    'class' => 'form-control col-xs-3',
                    'style' => 'width: 49%;',
                    'placeholder' => '姓',
                ]); ?>
                <?= $this->Form->input('given_name', [
                    'label' => false,
                    'type'  => 'name',
                    'class' => 'form-control',
                    'style' => 'width: 50%; margin-left: 1%',
                    'placeholder' => '名',
                ]); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="form-inline">
                <?= $this->Form->input('family_name_kana', [
                    'label' => false,
                    'class' => 'form-control col-xs-3',
                    'style' => 'width: 49%;',
                    'placeholder' => 'フリガナ(姓)　(全角カタカナで入力して下さい)',
                    'error' => false,
                ]); ?>
                <?= $this->Form->input('given_name_kana', [
                    'label' => false,
                    'class' => 'form-control',
                    'style' => 'width: 50%; margin-left: 1%',
                    'placeholder' => 'フリガナ(名)　(全角カタカナで入力して下さい)',
                    'error' => false,
                ]); ?>
            </div>
        </div>
        <div class="form-group">
            <?= $this->Form->input('email', [
                'label' => false,
                'type' => 'email',
                'class' => 'form-control',
                'placeholder' => 'メールアドレス',
                'error' => false,
            ]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('phone_number', [
                'label' => false,
                'class' => 'form-control',
                'placeholder' => '電話番号(ハイフン無しで入力)',
                'error' => false,
            ]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('region_id', [
                'label' => false,
                'class' => 'form-control',
                'type' => 'select',
                'options' => $region_name,
                'default' => '13'
            ]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('programming_lv_code', [
                'label' => false,
                'class' => 'form-control',
                'type' => 'select',
                'options' => $programming_lv
            ]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('comment', [
                'label' => false,
                'type' => 'textarea',
                'class' => 'form-control',
                'placeholder' => 'フリー入力(任意)',
                'rows'=> 5
            ]); ?>
        </div>
        <?= $this->Form->hidden('students_status_code', ['value' => 0]); ?>
        <?= $this->Form->submit('無料相談にエントリーする', ['class' => 'center-block btn btn-info btn-lg']); ?>
    </form>
</div>
