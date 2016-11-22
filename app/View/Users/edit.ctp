<h2>パスワード変更</h2>

<div class="container">
  <?= $this->Form->create('User'); ?>
  <form class="form-horizontal">
    <div class="form-group">
      <?= $this->Form->input('password', ['label' => '新しいパスワード(半角英数字8文字以上)', 'type' => 'password', 'value' => '', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('password_confirm', ['label' => 'パスワード（確認）', 'type' => 'password', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
      <?= $this->Form->input('password_current', ['label' => '現在のパスワード', 'type' => 'password',  'class' => 'form-control']); ?>
    </div>
      <?= $this->Form->hidden('id'); ?>
      <?= $this->Form->submit('保存する', ['class' => 'btn btn-primary']); ?>
  </form>
  <div style="margin-top:10px;">
    <?= $this->Html->link('戻る', ['controller' => 'students', 'action' => 'index'], ['class' => 'btn btn-default']); ?>
  </div>
</div>
