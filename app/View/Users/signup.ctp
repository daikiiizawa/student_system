<h2>新規ユーザ登録</h2>

<div class="container">
  <?= $this->Form->create('User'); ?>
  <form class="form-horizontal">
    <div class="form-group">
      <?= $this->Form->input('email', ['label' => 'メールアドレス', 'type' => 'email', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('password', ['label' => 'パスワード(半角英数字8文字以上)', 'type' => 'password', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('password_confirm', ['label' => 'パスワード(確認)', 'type' => 'password', 'class' => 'form-control']); ?>
    </div>
    <?= $this->Form->submit('登録する',['class' => 'btn btn-primary']); ?>
  </form>
  <hr>
  <div style="margin-top:10px;">
    <?= $this->Html->Link('ログイン', ['action' => 'login']); ?><br>
  </div>
</div>
