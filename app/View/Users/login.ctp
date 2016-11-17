<h2>ログイン</h2>

<div class="container">
  <?= $this->Flash->render('Auth');?>
  <?= $this->Form->create('User');?>
  <form class="form-horizontal">
    <div class="form-group">
      <?= $this->Form->input('email', ['label' => 'メールアドレス', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('password', ['label' => 'パスワード', 'type' => 'password', 'class' => 'form-control']); ?>
    </div>
    <?= $this->Form->submit('ログイン', ['class' => 'btn btn-primary']); ?>
  </form>

  <hr>

  <p>
    <?= $this->Html->link('生徒検索へ', ['controller' => 'students', 'action' => 'find']); ?>
  </p>
  <p>
    <?= $this->Html->link('パスワードを忘れた方はこちら', ['controller' => 'users', 'action' => 'password_reset']); ?>
  </p>

</div>
