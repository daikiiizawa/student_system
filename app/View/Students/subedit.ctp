<div class='container'>
<div class="col-md-10 col-md-offset-1">

<table class="table">
<h2>編集画面</h2>

<div class="well form-inline">
<div class="form-group">

<?= $this->Form->create('Student', [
    'url' => ['action' => 'subconfirm'],
    'type'  => 'post',
    'novalidate' => true,
    'class' => 'form-horizontal'
    ]); ?>

<?= $this->element('Students/openedit'); ?>

</div>
</div>

<div class="btn-toolbar">
<div class="col-xs-5"></div>
<?= $this->Form->end([
    'label' => '確認画面',
    'class' => 'btn-group btn btn-primary',
    'style' => 'margin: 0px 10px 20px 0px;'
    ]); ?>&#010;


<?= $this->Html->link(
    '戻る', ['action' => 'subview', $id], [
    'class' => 'btn-group btn btn-default',
    'style' => 'margin: 0px 0px 20px 0px;'
    ]) ;?>
</div>
</div>

</table>

</div>
</div>