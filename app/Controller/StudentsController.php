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
        $this->Auth->allow('find', 'entry', 'thanks', 'view', 'edit', 'confirm', 'save');
    }

    public function index(){
        $all_students_count = count($this->Student->find('all'));
        $this->set('all_students_count', $all_students_count);
        $conditions = array();

        // 生徒ステータスの絞込処理
        $this->Prg->commonProcess();

        if (empty($this->request->data['Student'])){
            $conditions = ['Student.students_status_code' => '0'];
        } else {
            // 生徒ステータスを'全表示'にした場合
            if ($this->request->data['Student']['students_status_code'] == '4') {
                $conditions = null;

            // 生徒ステータスをpostした場合
            } elseif ($this->request->data) {
                $conditions = $this->Student->parseCriteria($this->passedArgs);
            }
        }
        $this->paginate = [
            'conditions' => $conditions,
            'order' => ['created' => 'desc'],
            'limit' => 20,
        ];

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
    }

    public function edit ($id = null) {
        if (!$this->Student->exists($id)) {
            throw new NotFoundException('生徒情報が見つかりません');
        }
        $this->set('regions',$this->Region->find('list',['fields'=>['id','region_name']]));

        // 詳細ページからgetで来た場合のみdataに既存の生徒情報を参照する
        if (!$this->request->data) {
            $this->request->data = $this->Student->findById($id);
        }

        // 編集画面から戻るボタンで詳細ページに戻るのを簡潔にまとめるためidを定義
        $id = $this->request->data['Student']['id'];
        $this->set('id', $id);
    }

    public function view($id = null){
        if (!$this->Student->exists($id)) {
            throw new NotFoundException('生徒情報がみつかりません');
        }
        $student = $this->Student->findById($id);
        $this->set('student', $student);
    }

    public function confirm($id = null) {
        if (!$this->Student->exists($id)) {
            throw new NotFoundExeption('生徒情報が見つかりません');
        }
        // 既存データ参照
        $student = $this->Student->findById($id);
        $this->set('student', $student);
        $this->set('regions',$this->Region->find('list',['fields'=>['id','region_name']]));
        // 編集画面からのpostデータ
        $confirm = $this->request->data;
        $this->set('confirm', $confirm);

        $confirm['Student']['address'] = $confirm['address'];

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

        // 管理情報のため、管理者ログイン時のみ処理を行う
        if($this->Auth->user()){
            if ($confirm['Student']['last_contact_datetime']['year'] != '') {
                $contactdate =  $confirm['Student']['last_contact_datetime']['year'].'-'.
                                $confirm['Student']['last_contact_datetime']['month'].'-'.
                                $confirm['Student']['last_contact_datetime']['day'].' '.
                                $confirm['Student']['last_contact_datetime']['hour'].':'.
                                $confirm['Student']['last_contact_datetime']['min'].':00';
            } else {$contactdate = '';}
            $this->set('contactdate', $contactdate);
            $confirm['Student']['last_contact_datetime'] = $contactdate;
        }

        // 日付データをarrayからstringに戻してconfirm内に入れる
        $confirm['Student']['birthdate'] = $birthdate;
        $confirm['Student']['first_meet_datetime'] = $firstdate;
        $confirm['Student']['second_meet_datetime'] = $seconddate;
        $confirm['Student']['third_meet_datetime'] = $thirddate;

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
            } else {
            $this->Flash->error('必須項目の編集に誤りがあるため保存できませんでした。');
            return $this->redirect(['action' => 'view',$id]);
            }
        } else {
            $this->Flash->error('失敗');
            return $this->redirect(['action' => 'view',$id]);
        }
    }

    public function find() {
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
