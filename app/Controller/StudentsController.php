<?php
App::uses('CakeEmail', 'Network/Email');


class StudentsController extends AppController{

    public $uses = ['Student', 'Region'];

    public $components = [
        'Search.Prg',
    ];

    public $presetVars = true;

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('find', 'entry', 'thanks');
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
        if ($this->request->is('post')) {
            $this->Student->create();

            if ($this->Student->save($this->request->data)) {
                $this->Flash->success('登録完了しました');
                return $this->redirect(['action' => 'index']);
            }
        }
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
        $this->set('regions',$this->Region->find('list',['fields'=>['id','region_name']]));

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
        $this->set('regions',$this->Region->find('list',['fields'=>['id','region_name']]));
        // 編集画面からのpostデータ
        $confirm = $this->request->data;
        $this->set('confirm', $confirm);

        // 日付フォーマット加工(array→string)
        if ($confirm['Student']['birthdate']['year'] != '') {
            $birthdate =    $confirm['Student']['birthdate']['year'].'-'.
                            $confirm['Student']['birthdate']['month'].'-'.
                            $confirm['Student']['birthdate']['day'];
            } else {$birthdate = '';}
        $this->set('birthdate', $birthdate);
        if ($confirm['Student']['first_meet_datetime']['year'] != '') {
            $firstdate =    $confirm['Student']['first_meet_datetime']['year'].'-'.
                            $confirm['Student']['first_meet_datetime']['month'].'-'.
                            $confirm['Student']['first_meet_datetime']['day'].' '.
                            $confirm['Student']['first_meet_datetime']['hour'].':'.
                            $confirm['Student']['first_meet_datetime']['min'].':00';
            } else {$firstdate = '';}
        $this->set('firstdate', $firstdate);
        if ($confirm['Student']['second_meet_datetime']['year'] != '') {
            $seconddate =   $confirm['Student']['second_meet_datetime']['year'].'-'.
                            $confirm['Student']['second_meet_datetime']['month'].'-'.
                            $confirm['Student']['second_meet_datetime']['day'].' '.
                            $confirm['Student']['second_meet_datetime']['hour'].':'.
                            $confirm['Student']['second_meet_datetime']['min'].':00';
            } else {$seconddate = '';}
        $this->set('seconddate', $seconddate);
        if ($confirm['Student']['third_meet_datetime']['year'] != '') {
            $thirddate =    $confirm['Student']['third_meet_datetime']['year'].'-'.
                            $confirm['Student']['third_meet_datetime']['month'].'-'.
                            $confirm['Student']['third_meet_datetime']['day'].' '.
                            $confirm['Student']['third_meet_datetime']['hour'].':'.
                            $confirm['Student']['third_meet_datetime']['min'].':00';
        } else {$thirddate = '';}
        $this->set('thirddate', $thirddate);
        if ($confirm['Student']['last_contact_datetime']['year'] != '') {
            $contactdate =  $confirm['Student']['last_contact_datetime']['year'].'-'.
                            $confirm['Student']['last_contact_datetime']['month'].'-'.
                            $confirm['Student']['last_contact_datetime']['day'].' '.
                            $confirm['Student']['last_contact_datetime']['hour'].':'.
                            $confirm['Student']['last_contact_datetime']['min'].':00';
        } else {$contactdate = '';}
        $confirm['Student']['address'] = $confirm['address'];
        $this->set('contactdate', $contactdate);

        // 日付データをarrayからstringに戻す
        $confirm['Student']['birthdate'] = $birthdate;
        $confirm['Student']['first_meet_datetime'] = $firstdate;
        $confirm['Student']['second_meet_datetime'] = $seconddate;
        $confirm['Student']['third_meet_datetime'] = $thirddate;
        $confirm['Student']['last_contact_datetime'] = $contactdate;
        $this->set('confirm', $confirm);
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
        } else {
            $this->Flash->error('失敗');
            return $this->redirect(['action' => 'view',$id]);
        }

    }

    public function find() {
        $week = ['日', '月', '火', '水', '木', '金', '土'];
        $this->set('week', $week);
        $count_students = 0;
        $this->paginate = [
            'order' => ['created' => 'desc'],
            'limit' => 100,
        ];
        if ($this->request->is('post')){
            if ($this->request->data['Student']['search_sei'] != '' &&
                $this->request->data['Student']['search_mei'] != '' &&
                $this->request->data['Student']['search_phone'] != '') {
                $search_sei = $this->request->data['Student']['search_sei'];
                $search_mei = $this->request->data['Student']['search_mei'];
                $search_phone = $this->request->data['Student']['search_phone'];
                $conditions = [
                    // 全項目必須の完全一致
                    'Student.family_name LIKE' => $search_sei,
                    'Student.given_name LIKE' => $search_mei,
                    'Student.phone_number LIKE' => $search_phone,
                    // 部分一致
                    // 'Student.family_name LIKE' => "%{$search_sei}%",
                    // 'Student.given_name LIKE' => "%{$search_mei}%",
                    // 'Student.phone_number LIKE' => "%{$search_phone}%",
                ];
                $hit_students = $this->paginate('Student', $conditions);
                // $this->Flash->success('検索しました');
                $this->set('hit_students', $hit_students);
                $count_students = count($hit_students);
            } else {
                $this->Flash->error('全項目入力して下さい');
            }
        }
        $this->set('count_students', $count_students);
    }


    public function entry(){
        $programming_lv = ['初めてプログラミングに触れる', 'プログラミングを少し学んだことがある', 'プログラミングで仕事をしている・したことがある'];
        $this->set('programming_lv', $programming_lv);
        $region = $this->Region->find('list', ['fields' => ['region_name']]);
        $this->set('region', $region);
        if($this->request->is('post')){
            $this->Student->create();
            if($this->Student->save($this->request->data)){

                //ELITES事務局への通知メール送信
                $family_name = $this->request->data['Student']['family_name'];
                $given_name = $this->request->data['Student']['given_name'];
                $family_name_kana = $this->request->data['Student']['family_name_kana'];
                $given_name_kana = $this->request->data['Student']['given_name_kana'];
                $student_email = $this->request->data['Student']['email'];
                $phone_number = $this->request->data['Student']['phone_number'];

                //都道府県の変数設定
                $region_name = $this->Region->find('list', [
                    'fields' => ['region_name'],
                    'conditions' => ['id' => $this->request->data['Student']['region_id']
                ]]);
                $region_name = $region_name[$this->request->data['Student']['region_id']];

                //プログラミングレベルの変数設定
                //あとでメール送れる環境で確認すること！！
                $programming_lv = $programming_lv[$this->request->data['Student']['programming_lv_code']];

                $comment = $this->request->data['Student']['comment'];

                $email = new CakeEmail('default');
                $email->from(['info@elites.com' => 'ELITES']);
                $email->to('monokuro_monocuro@yahoo.co.jp');
                $email->template('entry_to_user');
                $email->subject('ELITES新規エントリーのお知らせ');
                $email->viewVars(compact([
                    'family_name',
                    'given_name',
                    'family_name_kana',
                    'given_name_kana',
                    'student_email',
                    'phone_number',
                    'region_name',
                    'programming_lv',
                    'comment'
                ]));
                $email->send();


                //エントリーした生徒へのメール送信
                $email = new CakeEmail('default');
                $email->from(['info@elites.com' => 'ELITES']);
                $email->to($student_email);
                $email->template('entry_to_student');
                $email->subject('ELITESにお問い合わせいただきありがとうございます');
                $email->viewVars(compact([
                    'family_name',
                    'given_name',
                ]));
                $email->send();



                //thanksページへの遷移
                $this->Flash->success('エントリーが完了しました');
                return $this->redirect(['action' => 'thanks']);
            }
        }
    }

    public function thanks(){

    }

}
