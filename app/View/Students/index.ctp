<!-- ユーザー定義定数の読み出し -->
<?php
$week = Configure::read("week");
$yomi = Configure::read("yomi");
$status = Configure::read("status");
?>

<div class='container'>

<div class="col-md-2">
    <h2>一覧画面</h2>

</div>
<div class="col-md-10" style="margin-top: 17px">
    <table>
        <div class='form-inline'>
            <?= $this->Form->create('Student', [
                'novalidate' => true,
                'url' => [
                'action' => 'index'
                ]]); ?>

            <tr>
                <td>生徒ステータス&nbsp;</td>
                <td>
                    <?= $this->Form->input('students_status_code', [
                        'label' => false,
                        'type' => 'select',
                        'options' => $status,
                        'style' => 'width:130px;'
                    ]);?>
                <td>&nbsp;</td>
                <td>
                    <div class="btn-group">
                        <?= $this->Form->end([
                            'label' => '絞込',
                            'class' => 'btn btn-primary btn-xs'
                            ]); ?>
                    </div>
                    <div class="btn-group">
                        <?= $this->Html->link('リセット', [
                            'action' => 'index',
                            'students_status_code' => '0'
                            ],
                            ['class' => 'btn btn-default btn-xs']
                        ); ?>
                    </div>
                </td>
            </tr>
        </div>
    </table>
    <span>対象<?= $this->Paginator->counter(['format' => ('{:count}')]);?>件／全件数<?= $all_students_count;?>件</span>
</div>
<br/>
<div class="col-md-12">
    <table class="table table-striped">

        <!-- ヘッダー -->
        <thead class="text-info">
            <th>
                <?= urldecode($this->Html->link(
                    '登録日',
                    array_merge($this->params['named'], [
                        'controller' => 'students',
                        'action' => 'index',
                        'sort' => 'created',
                        'direction' => $direction,
                        'escape' => false
                    ]
                )));?>
            </th>
            <th>
                <?= urldecode($this->Html->link(
                    '氏名',
                    array_merge($this->params['named'], [
                        'controller' => 'students',
                        'action' => 'index',
                        'sort' => 'family_name_kana',
                        'direction' => $direction,
                        'escape' => false
                    ]
                )));?>
            </th>
            <th>
                <?= urldecode($this->Html->link(
                    '面談希望日',
                    array_merge($this->params['named'], [
                        'controller' => 'students',
                        'action' => 'index',
                        'sort' => 'first_meet_datetime',
                        'direction' => $direction,
                        'escape' => false
                    ]
                )));?>
            </th>
            <th>
                <?= urldecode($this->Html->link(
                    '入学月',
                    array_merge($this->params['named'], [
                        'controller' => 'students',
                        'action' => 'index',
                        'sort' => 'admission_month',
                        'direction' => $direction,
                        'escape' => false
                    ]
                )));?>
            </th>
            <th>
                <?= urldecode($this->Html->link(
                    'ヨミ',
                    array_merge($this->params['named'], [
                        'controller' => 'students',
                        'action' => 'index',
                        'sort' => 'yomi_code',
                        'direction' => $direction,
                        'escape' => false
                    ]
                )));?>
            </th>
            <th>
                <?= urldecode($this->Html->link(
                    '生徒ステータス',
                    array_merge($this->params['named'], [
                        'controller' => 'students',
                        'action' => 'index',
                        'sort' => 'students_status_code',
                        'direction' => $direction,
                        'escape' => false
                    ]
                )));?>
            </th>
            <th>
                <?= urldecode($this->Html->link(
                    '最終連絡日',
                    array_merge($this->params['named'], [
                        'controller' => 'students',
                        'action' => 'index',
                        'sort' => 'last_contact_datetime',
                        'direction' => $direction,
                        'escape' => false
                    ]
                )));?>
            </th>
            <th>
                <?= urldecode($this->Html->link(
                    'ID',
                    array_merge($this->params['named'], [
                        'controller' => 'students',
                        'action' => 'index',
                        'sort' => 'affiliate_id',
                        'direction' => $direction,
                        'escape' => false
                    ]
                )));?>
            </th>
            <th></th>
        </thead>

        <!-- 生徒一覧 -->
        <tbody>
        <?php foreach ($students as $student) :?>
            <tr>
                <td>
                    <?= $this->Time->format($student['Student']['created'],'%m/%d' . '(' .
                    $week[$this->Time->format($student['Student']['created'],'%w')] . ')') ;?>
                </td>
                <td>
                    <?= $this->Html->link(h($student['Student']['family_name']) . ' '. h($student['Student']['given_name']), [
                    'action' => 'view', $student['Student']['id']
                    ], [
                    'target' => '_blank'
                    ]) ;?>
                 </td>
                <td>
                    <?php if($student['Student']['first_meet_datetime']) :?>
                        <?= $this->Time->format(h($student['Student']['first_meet_datetime']),'%m/%d'. '(' .
                        $week[$this->Time->format(h($student['Student']['first_meet_datetime']),'%w')].') / '.
                        $this->Time->format(h($student['Student']['first_meet_datetime']),'%H:%M')) ;?>
                    <?php endif ;?>
                </td>
                <td><?= h($student['Student']['admission_month']) ;?></td>

                <td>
                    <?php if($student['Student']['yomi_code'] != null) :?>
                        <?= $yomi[h($student['Student']['yomi_code'])] ;?>
                    <?php endif ;?>
                </td>

                <td>
                    <?php if($student['Student']['students_status_code'] != null) :?>
                        <?= $status[h($student['Student']['students_status_code'])] ;?>
                    <?php endif ;?>
                </td>

                <td>
                    <?php if($student['Student']['last_contact_datetime']) :?>
                        <?= $this->Time->format(h($student['Student']['last_contact_datetime']),'%m/%d'. '(' .
                        $week[$this->Time->format(h($student['Student']['last_contact_datetime']),'%w')].')') ;?>
                    <?php endif ;?>
                </td>
                <td><?= h($student['Student']['affiliate_id']) ;?></td>

                <td>
                    <?= $this->Html->link('詳細',[
                    'action' => 'view',$student['Student']['id']
                    ], [
                    'target' => '_blank',
                     'class' => 'btn btn-default btn-xs'
                    ]) ;?>

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- ページネーション -->
    <?php if (empty($conditions) || $conditions['Student.students_status_code'] == '0') :?>
        <div class="pagination">
            <?= $this->Paginator->first('最初', $options = array()) ;?>
            <?= $this->Paginator->prev('前へ', array(), null, ['class' => 'prev disabled']) ;?>
            <?= $this->Paginator->numbers(array('separator' => '','url'=>['students_status_code'=>'0'])) ;?>
            <?= $this->Paginator->next('次へ', array('url'=>['students_status_code'=>'0']), null, ['class' => 'next disabled']) ;?>
            <?= $this->Paginator->last('最後', $options = array('url'=>['students_status_code'=>'0'])) ;?>
        </div>
    <?php else :?>
        <div class="pagination">
            <?= $this->Paginator->first('最初', $options = array()) ;?>
            <?= $this->Paginator->prev('前へ', array(), null, ['class' => 'prev disabled']) ;?>
            <?= $this->Paginator->numbers(array('separator' => '')) ;?>
            <?= $this->Paginator->next('次へ', array(), null, ['class' => 'next disabled']) ;?>
            <?= $this->Paginator->last('最後', $options = array()) ;?>
        </div>
    <?php endif ;?>

</div>
</div>
