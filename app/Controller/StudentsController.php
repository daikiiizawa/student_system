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

    public function view($id = null){
        if (!$this->Student->exists($id)) {
            throw new NotFoundException('生徒情報がみつかりません');
        }
        $student = $this->Student->findById($id);
        $this->set('student', $student);

        // 指定項目の入力情報
        $sex = ['男性', '女性', '不明'];
        $this->set('sex', $sex);
        $purpose = ['起業', '転職', 'フリーランス', 'スキルアップ', '副業', '趣味', 'その他'];
        $this->set('purpose', $purpose);
        $pc = ['Mac', 'Windows7', 'Windows8', 'Windows10', 'その他'];
        $this->set('pc', $pc);
        $week = ['日', '月', '火', '水', '木', '金', '土'];
        $this->set('week', $week);
        $status = ['入会前', '学習中', '卒業済', '削除予定'];
        $this->set('status', $status);
        $yomi = ['A', 'B', 'C'];
        $this->set('yomi', $yomi);
    }

    public function entry(){

    }

    public function thanks(){

    }

}
