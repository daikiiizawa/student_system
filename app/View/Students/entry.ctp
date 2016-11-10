<div style="margin-bottom:50px;", class="container">
    <h2>さあ、次はあなたの番です。</h2>
    <div style="margin-top:30px;">あなたのために整えられた最高の学習環境で学び、そしてあなたの人生を変えるチャンスが今あります。</div>
    <h2 style="margin-top:30px;">【期間限定】個別無料相談を実施中。</h2>
    <div style="margin-top:30px;">無料相談期間は定員に達し次第まもなく終了しますので、エントリーはお早めに！</div>
    <div style="margin-top:30px;", class="form-horizontal">
        <?= $this->Form->create('Student'); ?>
        <div class="form-group">
            <?= $this->Form->input('family_name', [
                'label' => false,
                'type'  => 'name',
                'class' => 'form-control',
                'placeholder' => '姓',
            ]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('given_name', [
                'label' => false,
                'type'  => 'name',
                'class' => 'form-control',
                'placeholder' => '名',
            ]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('family_name_kana', [
                'label' => false,
                'class' => 'form-control',
                'placeholder' => 'ふりがな(姓)',
            ]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('given_name_kana', [
                'label' => false,
                'class' => 'form-control',
                'placeholder' => 'ふりがな(名)',
            ]); ?>
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
            <?= $this->Form->input('region_code', [
                'label' => false,
                'class' => 'form-control',
                'type' => 'select',
            ]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('programming_lv', [
                'label' => false,
                'class' => 'form-control',
                'type' => 'select',
            ]); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('hoge', [
                'label' => false,
                'type' => 'textarea',
                'class' => 'form-control',
                'placeholder' => 'フリー入力(任意)',
                'rows'=> 5
            ]); ?>
        </div>
        <?= $this->Form->end([
          'label' => '無料相談にエントリーする',
          'class' => 'center-block btn btn-info btn-lg'
        ]); ?>
    </form>
</div>
