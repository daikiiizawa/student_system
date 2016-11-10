<?php

class StudentsController extends AppController{

    public $components = [
        'Search.Prg',
    ];
    public $presetVars = true;

    public function beforeFilter(){
        parent::beforeFilter();

        $this->Auth->allow('add', 'entry', 'thanks');
    }

    public function index(){
        $all_students_count = count($this->Student->find('all'));
        $week = ['日', '月', '火', '水', '木', '金', '土'];
        $yomi = ['A', 'B', 'C'];
        $status = ['入会前', '学習中', '卒業済', '削除予定'];
        $this->set('all_students_count', $all_students_count);
        $this->set('week', $week);
        $this->set('yomi', $yomi);
        $this->set('status', $status);

        $this->Prg->commonProcess();

        if ($this->request->data) {
            $conditions = $this->Student->parseCriteria($this->passedArgs);
        } elseif (empty($this->request->data['Student'])) {
            $conditions = ['Student.students_status_code' => '0'];
        }

        $this->paginate = [
            'conditions' => $conditions,
            'order' => ['created' => 'desc'],
            'limit' => 20,
        ];
        $params = $this->request->params;
        $this->set('params', $params);

        // sortを昇順降順切り替えとなるようdirectionを場合分け
        if (empty($this->request->params['named']['direction'])) {
            $direction = 'desc';
        } elseif ($this->request->params['named']['direction'] == 'desc') {
            $direction = 'asc';
        } else {
            $direction = 'desc';
        }
        $this->set('direction', $direction);
        $this->set('students', $this->paginate('Student'));
        $this->set('conditions', $conditions);
    }

    public function add(){

    }

    public function edit(){

    }

    public function view(){

    }

    public function entry(){

    }

    public function thanks(){

    }

}
