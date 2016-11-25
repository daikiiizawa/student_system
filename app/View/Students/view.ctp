<div class='container'>
<div class="col-md-8 col-md-offset-2">

<table class="table">
<h2>詳細画面</h2>
    <tbody>
        <?= $this->element('Students/openview'); ?>
        <?= $this->element('Students/adminview'); ?>
    </tbody>
</table>

<div class="col-xs-5"></div>
<?= $this->Html->link(
    '編集', ['action' => 'edit', $student['Student']['id']], [
    'class' => 'btn btn-primary',
    'style' => 'margin: 10px 0px 0px 0px;'
    ]) ;?>&nbsp;

<?= $this->Html->link(
    '戻る', ['action' => 'index', 'students_status_code' => '0'], [
    'class' => 'btn btn-default',
    'style' => 'margin: 10px 0px 0px 0px;'
    ]) ;?>

<br>
<div class="col-xs-5"></div>
<?= $this->Html->link(
    '生徒入力画面', ['action' => 'subedit', $student['Student']['id']], [
    'class' => 'btn btn-danger',
    'style' => 'margin: 10px 0px 30px 0px;'
    ]) ;?>


</div>
</div>