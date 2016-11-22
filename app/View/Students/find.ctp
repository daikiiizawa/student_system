<!-- ユーザー定義定数の読み出し -->
<?php
$week = Configure::read("week");
?>


<div class='container'>
<div class="col-md-10 col-md-offset-1">

<table class="table">
    <h2>検索画面</h2>
    <p>氏名と電話番号を入力して下さい</p>
    <?= $this->Form->create(NULL, [
        'novalidate' => true,
        'url' => ['action' => 'find'],
        ]); ?>

    <div class="form-group col-xs-12">
    <?= $this->Form->input('search_sei', [
        'label' => false,
        'placeholder' => '姓',
        'class' => 'col-xs-3'
        ]); ?>
    <?= $this->Form->input('search_mei', [
        'label' => false,
        'placeholder' => '名',
        'class' => 'col-xs-3'
        ]); ?>
    </div>

    <div class="form-group col-xs-12">
    <?= $this->Form->input('search_phone', [
        'label' => false,
        'type'  => 'text',
        'placeholder' => '08012345678',
        'class' => 'col-xs-6'
        ]); ?>
    </div>

    <div class="form-group col-xs-12">
    <div class="btn-group">
    <?= $this->Form->end([
        'label' => '検索',
        'class' => 'btn btn-primary'
        ]); ?>
    </div>
    <div class="btn-group">
        <?= $this->Html->link('リセット',
            ['action' => 'find'], [
            'class' => 'btn btn-default'
            ]); ?>
    </div>
    </div>
</table>

<p>
    検索結果
    <?php if ($count_students) :?>
        <?= '( ' . $count_students . '件 )';?>
    <?php endif ;?>
</p>

<table class="table table-striped" style="width:50%">
    <!-- ヘッダー -->
    <thead class="text-info">
        <th>登録日</th>
        <th>氏名</th>
        <th></th>
        <th></th>
    </thead>

    <!-- 生徒一覧 -->
    <tbody>
    <?php if(!empty($hit_students)) :?>
    <?php foreach ($hit_students as $hit_student) :?>
        <tr>
            <td>
                <?= $this->Time->format($hit_student['Student']['created'],'%m/%d' . '(' .
                $week[$this->Time->format($hit_student['Student']['created'],'%w')] . ')') ;?>
            </td>
            <td>
                <?= $this->Html->link(h($hit_student['Student']['family_name']) . ' '. h($hit_student['Student']['given_name']), [
                'action' => 'subview',$hit_student['Student']['id'],
                ], [
                'target' => '_blank'
                ]) ;?>
             </td>

            <td>
                <?= $this->Html->link('詳細',[
                'action' => 'subview',$hit_student['Student']['id'],
                ], [
                'target' => '_blank',
                'class' => 'btn btn-default btn-xs'
                ]) ;?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php endif ;?>
    </tbody>
</table>

</div>
</div>