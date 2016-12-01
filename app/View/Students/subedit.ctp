<div class='container'>
<div class="col-xs-10 col-md-offset-1">

    <table class="table">
        <h2 class="text-center" style="margin-bottom:30px";>
            <u>お客様情報入力フォーム</u>
        </h2>

        <!-- バリデーションメッセージ -->
        <?php foreach($errors as $key => $error):?>
            <div class="text-center" style="color:#ff0000"><?= $error[0];?></div>
        <?php endforeach ;?></br>

            <?= $this->Form->create('Student', [
                'url' => ['action' => 'subconfirm'],
                'type'  => 'post',
                'novalidate' => true,
                ]); ?>
        <div class="form-group">
            <?= $this->element('Students/openedit'); ?>
        </div>

        <div class="col-xs-5"></div>
        <div class="btn-toolbar">
            <?= $this->Form->end([
                'label' => '完了',
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