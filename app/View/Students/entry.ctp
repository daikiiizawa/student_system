<div style="margin-bottom:50px;", class="container">
    <h2>さあ、次はあなたの番です。</h2>
    <div style="margin-top:30px;">あなたのために整えられた最高の学習環境で学び、そしてあなたの人生を変えるチャンスが今あります。</div>
    <h2 style="margin-top:30px;">【期間限定】個別無料相談を実施中。</h2>
    <div style="margin-top:30px;">無料相談期間は定員に達し次第まもなく終了しますので、エントリーはお早めに！</div>
    <div style="margin-top:30px;", class="form-horizontal">
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
                ]); ?>
                <?= $this->Form->input('given_name_kana', [
                    'label' => false,
                    'class' => 'form-control',
                    'style' => 'width: 50%; margin-left: 1%',
                    'placeholder' => 'フリガナ(名)　(全角カタカナで入力して下さい)',
                ]); ?>
            </div>
        </div>
        <div class="form-group">
            <?= $this->Form->input('email', [
                'label' => false,
                'type' => 'email',
                'class' => 'form-control',
                'placeholder' => 'メールアドレス',
            ]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('phone_number', [
                'label' => false,
                'class' => 'form-control',
                'placeholder' => '電話番号(ハイフン無しで入力)',
            ]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('region_id', [
                'label' => false,
                'class' => 'form-control',
                'type' => 'select',
                'options' => $region
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



<!-- <form action="" class="form-horizontal">
  <div class="form-group">
    <label for="name" class="control-label col-md-3">氏名</label>
    <div class="col-sm-8">
      <input type="text" placeholder="氏名" id="name" class="form-control">
    </div>
  </div>

  <div class="form-group">
    <label for="kana" class="control-label col-md-3">フリガナ</label>
    <div class="col-sm-8">
      <input type="text" placeholder="フリガナ" id="kana" class="form-control">
    </div>
  </div>

  <div class="form-group">
    <label for="birth" class="control-label col-md-3">生年月日</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" placeholder="年" style="width: 70px;display: inline-block;"><span style="margin: 0 5px;">年</span>
      <input type="text" class="form-control" placeholder="月" style="width: 50px;display: inline-block;"><span style="margin: 0 5px;">月</span>
      <input type="text" class="form-control" placeholder="日" style="width: 50px;display: inline-block;"><span style="margin: 0 5px;">日</span>
    </div>
  </div>

  <div class="form-group">
    <label for="adr" class="control-label col-md-3">住所</label>
    <div class="col-sm-8">
      <input type="text" placeholder="住所" id="adr" class="form-control">
    </div>
  </div>
</form> -->
