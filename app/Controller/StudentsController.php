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

    public function edit ($id = null) {
        if (!$this->Student->exists($id)) {
            throw new NotFoundException('生徒情報が見つかりません');
        }

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
        $month = [
            '01月' => '01月',
            '02月' => '02月',
            '03月' => '03月',
            '04月' => '04月',
            '05月' => '05月',
            '06月' => '06月',
            '07月' => '07月',
            '08月' => '08月',
            '09月' => '09月',
            '10月' => '10月',
            '11月' => '11月',
            '12月' => '12月'
            ];
        $this->set('month', $month);

        // 詳細ページからgetで来た場合のみdataに既存の生徒情報を参照する
        if (!$this->request->data) {
            $this->request->data = $this->Student->findById($id);
        }
        $id = $this->request->data['Student']['id'];
        $this->set('id', $id);
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

    public function confirm($id = null) {
        if (!$this->Student->exists($id)) {
            throw new NotFoundExeption('生徒情報が見つかりません');
        }
        // 既存データ参照
        $student = $this->Student->findById($id);
        $this->set('student', $student);

        // マスタデータ
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

        // 編集画面からのpostデータ
        $confirm = $this->request->data;
        $this->set('confirm', $confirm);
        // 日付フォーマット加工(array→string)
        $birthdate =    $confirm['Student']['birthdate']['year'].'-'.
                        $confirm['Student']['birthdate']['month'].'-'.
                        $confirm['Student']['birthdate']['day'];
        $this->set('birthdate', $birthdate);
        $firstdate =    $confirm['Student']['first_meet_datetime']['year'].'-'.
                        $confirm['Student']['first_meet_datetime']['month'].'-'.
                        $confirm['Student']['first_meet_datetime']['day'].' '.
                        $confirm['Student']['first_meet_datetime']['hour'].':'.
                        $confirm['Student']['first_meet_datetime']['min'].':00';
        $this->set('firstdate', $firstdate);
        $seconddate =   $confirm['Student']['second_meet_datetime']['year'].'-'.
                        $confirm['Student']['second_meet_datetime']['month'].'-'.
                        $confirm['Student']['second_meet_datetime']['day'].' '.
                        $confirm['Student']['second_meet_datetime']['hour'].':'.
                        $confirm['Student']['second_meet_datetime']['min'].':00';
        $this->set('seconddate', $seconddate);
        $thirddate =    $confirm['Student']['third_meet_datetime']['year'].'-'.
                        $confirm['Student']['third_meet_datetime']['month'].'-'.
                        $confirm['Student']['third_meet_datetime']['day'].' '.
                        $confirm['Student']['third_meet_datetime']['hour'].':'.
                        $confirm['Student']['third_meet_datetime']['min'].':00';
        $this->set('thirddate', $thirddate);
        $contactdate =  $confirm['Student']['last_contact_datetime']['year'].'-'.
                        $confirm['Student']['last_contact_datetime']['month'].'-'.
                        $confirm['Student']['last_contact_datetime']['day'].' '.
                        $confirm['Student']['last_contact_datetime']['hour'].':'.
                        $confirm['Student']['last_contact_datetime']['min'].':00';
        $this->set('contactdate', $contactdate);
    }

    public function save($id = null) {
        if (!$this->Student->exists($id)) {
            throw new NotFoundExeption('生徒情報が見つかりません');
        }
        if ($this->request->is(['post', 'put'])) {
            if ($this->Student->save($this->request->data)) {
                $this->Flash->success('更新しました');
                return $this->redirect(['action' => 'view',$id]);
            }
        }
    }

    public function entry(){

    }

    public function thanks(){

    }

}
