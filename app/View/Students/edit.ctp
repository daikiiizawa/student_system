<div class='container'>
<div class="col-xs-10 col-md-offset-1">

    <table class="table">
        <h2>編集画面</h2>

            <?= $this->Form->create('Student', [
                'url' => ['action' => 'confirm'],
                'type'  => 'post',
                'novalidate' => true,
                ]); ?>
        <div class="well form-inline">
            <div class="form-group">
                <?= $this->element('Students/openedit'); ?>
                <?= $this->element('Students/adminedit'); ?>
            </div>
        </div>
        <div class="col-xs-4"></div>
        <div class="btn-toolbar">
            <?= $this->Form->end([
                'label' => '確認画面',
                'class' => 'btn-group btn btn-primary',
                'style' => 'margin: 40px 0px 70px 0px;'
                ]); ?>&#010;
            <?= $this->Html->link(
                '戻る', ['action' => 'view', $id], [
                'class' => 'btn-group btn btn-default',
                'style' => 'margin: 40px 0px 70px 10px;'
                ]) ;?>
        </div>
    </table>
</div>
</div>