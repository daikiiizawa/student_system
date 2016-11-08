<h2>パスワードリセット</h2>
<div class="container">
  <?= $this->Form->create('User');?>
  <form class="form-horizontal">
    <div class="form-group">
      <?= $this->Form->input('email', ['label' => '登録されているメールアドレスを入力', 'class' => 'form-control']); ?>
    </div>
      <?= $this->Form->submit('送信する', ['class' => 'btn btn-primary']); ?>
  </form>
  <div style="margin-top:10px;">
    <?= $this->Html->Link('ログイン', ['action' => 'login']); ?><br>
    <?= $this->Html->Link('ユーザ登録', ['action' => 'signup']); ?>
  </div>
</div>
