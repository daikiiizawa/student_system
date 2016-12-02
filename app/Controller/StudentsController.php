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
        $this->Auth->allow('entry', 'thanks');
    }

    public function index(){
        $this->set('title_for_layout', '一覧画面');
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

        // 絞込時、該当データが存在しない場合のアラートメッセージ
        if (count($this->paginate('Student')) == 0) {
            $this->Flash->error('該当データなし');
        }

        // 絞込ステータス表示用
        $students_status_code = '0';
        if (!empty($this->request->data['Student'])) {
            $students_status_code = $this->request->data['Student']['students_status_code'];
        }
        $this->set('students_status_code', $students_status_code);
    }


    public function edit ($id = null) {
        $this->set('title_for_layout', '編集画面');
        if (!$this->Student->exists($id)) {
            throw new NotFoundException('生徒情報が見つかりません');
        }

        // 詳細ページからgetで来た場合のみdataに既存の生徒情報を参照する
        if (!$this->request->data) {
            $this->request->data = $this->Student->findById($id);
        }

        // 編集画面から戻るボタンで詳細ページに戻るのを簡潔にまとめるためidを定義
        $id = $this->request->data['Student']['id'];
        $this->set('id', $id);

        // 受講の目的に改行がある場合、全て表示させた状態で編集を開始する
        $purpose_rowcount = 0;
        $purpose_rowcount = substr_count($this->request->data['Student']['detail_purpose'], "\n") + 1;
        $this->set('purpose_rowcount', $purpose_rowcount);

        // 備考に改行がある場合、全て表示させた状態で編集を開始する
        $comment_rowcount = 0;
        $comment_rowcount = substr_count($this->request->data['Student']['comment'], "\n") + 1;
        $this->set('comment_rowcount', $comment_rowcount);

        // バリデーションのエラーメッセージ、エラー塗りつぶし箇所の変数宣言
        $errors = array();
        $datetime_errors = array();
        $this->set('errors',$errors);
        $this->set('datetime_errors',$datetime_errors);
        $alert_color = [
            'family_name' => '', 'given_name' => '',
            'family_name_kana' => '', 'given_name_kana' => '',
            'email' => '',
            'phone_number' => '',
            'birthdate' => '',
            'postalcode' => ''
            ];
        $this->set('alert_color',$alert_color);
        $datetime_alert_color = [
            'first_meet_datetime' => '',
            'second_meet_datetime' => '',
            'third_meet_datetime' => '',
            'last_contact_datetime' => '',
            ];
        $this->set('datetime_alert_color',$datetime_alert_color);
    }

    public function subedit ($id = null) {
        $this->set('title_for_layout', '入力フォーム');
        if (!$this->Student->exists($id)) {
            throw new NotFoundException('生徒情報が見つかりません');
        }

        // 詳細ページからgetで来た場合のみdataに既存の生徒情報を参照する
        if (!$this->request->data) {
            $this->request->data = $this->Student->findById($id);
        }

        // 編集画面から戻るボタンで詳細ページに戻るのを簡潔にまとめるためidを定義
        $id = $this->request->data['Student']['id'];
        $this->set('id', $id);

        // 受講の目的に改行がある場合、全て表示させた状態で編集を開始する
        $purpose_rowcount = 0;
        $purpose_rowcount = substr_count($this->request->data['Student']['detail_purpose'], "\n") + 1;
        $this->set('purpose_rowcount', $purpose_rowcount);

        // バリデーションのエラーメッセージ、エラー塗りつぶし箇所の変数宣言
        $errors = array();
        $this->set('errors',$errors);
        $alert_color = [
            'family_name' => '', 'given_name' => '',
            'family_name_kana' => '', 'given_name_kana' => '',
            'email' => '',
            'phone_number' => '',
            'birthdate' => '',
            'postalcode' => ''
            ];
        $this->set('alert_color',$alert_color);
    }


    public function view($id = null){
        $this->set('title_for_layout', '詳細画面');
        if (!$this->Student->exists($id)) {
            throw new NotFoundException('生徒情報がみつかりません');
        }
        $student = $this->Student->findById($id);
        $this->set('student', $student);
    }

    public function confirm($id = null) {
        $this->set('title_for_layout', '確認画面');
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

        // 受講の目的に改行がある場合、全て表示させた状態で編集を開始する
        $purpose_rowcount = 0;
        $purpose_rowcount = substr_count($this->request->data['Student']['detail_purpose'], "\n") + 1;
        $this->set('purpose_rowcount', $purpose_rowcount);

        // 備考に改行がある場合、全て表示させた状態で編集を開始する
        $comment_rowcount = 0;
        $comment_rowcount = substr_count($this->request->data['Student']['comment'], "\n") + 1;
        $this->set('comment_rowcount', $comment_rowcount);

        // エラーメッセージ、エラーメッセージ出力時の塗りつぶしの変数宣言
        $errors = array();
        $this->set('errors',$errors);
        $datetime_errors = array();
        $this->set('datetime_errors',$datetime_errors);
        $alert_color = [
            'family_name' => '', 'given_name' => '',
            'family_name_kana' => '', 'given_name_kana' => '',
            'email' => '',
            'phone_number' => '',
            'birthdate' => '',
            'postalcode' => ''
            ];
        $this->set('alert_color', $alert_color);
        $datetime_alert_color = [
            'first_meet_datetime' => '',
            'second_meet_datetime' => '',
            'third_meet_datetime' => '',
            'last_contact_datetime' => ''
            ];
        $this->set('datetime_alert_color',$datetime_alert_color);
        $this->set('id',$id);

        // 日付フォーマット加工(array→string)
        if ($confirm['Student']['birthdate']['year'] != '') {
            $birthdate =    $confirm['Student']['birthdate']['year'].'-'.
                            $confirm['Student']['birthdate']['month'].'-'.
                            $confirm['Student']['birthdate']['day'];
            } else {$birthdate = '';}
        $this->set('birthdate', $birthdate);
        $confirm['Student']['birthdate'] = $birthdate;


        // 第一希望のバリデーション処理
        if ($confirm['Student']['first_meet_datetime']['year'] == ''&&
            $confirm['Student']['first_meet_datetime']['month'] == ''&&
            $confirm['Student']['first_meet_datetime']['day'] == ''&&
            $confirm['Student']['first_meet_datetime']['hour'] == ''&&
            $confirm['Student']['first_meet_datetime']['min'] == ''
            ) {
            $firstdate = '';
        } elseif(
            $confirm['Student']['first_meet_datetime']['year'] == ''||
            $confirm['Student']['first_meet_datetime']['month'] == ''||
            $confirm['Student']['first_meet_datetime']['day'] == ''||
            $confirm['Student']['first_meet_datetime']['hour'] == ''||
            $confirm['Student']['first_meet_datetime']['min'] == ''
            ) {
            $datetime_errors['first_meet_datetime'][0] = '第一希望の全ての項目を入力して下さい';
            // 時間未入力時のエラー回避処理
            if ($confirm['Student']['first_meet_datetime']['hour'] == ''){
                $this->request->data['Student']['first_meet_datetime']['min'] = '';
                $datetime_errors['first_meet_datetime'][0] = '第一希望の全ての項目を入力して下さい';
            } elseif (
                $confirm['Student']['first_meet_datetime']['hour'] != ''&&
                $confirm['Student']['first_meet_datetime']['min'] != ''&&
                $confirm['Student']['first_meet_datetime']['year'] == ''||
                $confirm['Student']['first_meet_datetime']['month'] == ''||
                $confirm['Student']['first_meet_datetime']['day'] == ''
                ){
                $this->request->data['Student']['first_meet_datetime']['hour'] = '';
                $this->request->data['Student']['first_meet_datetime']['min'] = '';
                $datetime_errors['first_meet_datetime'][0] = '第一希望の全ての項目を入力して下さい';
            }
            $firstdate = '';
            $this->set('datetime_errors',$datetime_errors);
            $datetime_alert_color['first_meet_datetime'] = '#FADBDA';
            $this->set('datetime_alert_color', $datetime_alert_color);
            $this->render('edit');
        } else {
            $firstdate =    $confirm['Student']['first_meet_datetime']['year'].'-'.
                            $confirm['Student']['first_meet_datetime']['month'].'-'.
                            $confirm['Student']['first_meet_datetime']['day'].' '.
                            $confirm['Student']['first_meet_datetime']['hour'].':'.
                            $confirm['Student']['first_meet_datetime']['min'].':00';

            // 日付の妥当性確認
            $firstday =     $confirm['Student']['first_meet_datetime']['year'].'-'.
                            $confirm['Student']['first_meet_datetime']['month'].'-'.
                            $confirm['Student']['first_meet_datetime']['day'];
            list($Y, $m, $d) = explode('-', $firstday);
            if (checkdate($m, $d, $Y) === false) {
                $datetime_errors['first_meet_datetime'][0] =
                    '第一希望に正しい日付を入力して下さい ('.
                    $confirm['Student']['first_meet_datetime']['month'].'月'.
                    $confirm['Student']['first_meet_datetime']['day'].'日と入力されました)';
                $this->set('datetime_errors',$datetime_errors);
                $datetime_alert_color['first_meet_datetime'] = '#FADBDA';
                $this->set('datetime_alert_color', $datetime_alert_color);
                $this->render('edit');
            }
        }
        $confirm['Student']['first_meet_datetime'] = $firstdate;
        $this->set('firstdate', $firstdate);


        // 第二希望のバリデーション処理
        if ($confirm['Student']['second_meet_datetime']['year'] == ''&&
            $confirm['Student']['second_meet_datetime']['month'] == ''&&
            $confirm['Student']['second_meet_datetime']['day'] == ''&&
            $confirm['Student']['second_meet_datetime']['hour'] == ''&&
            $confirm['Student']['second_meet_datetime']['min'] == ''
            ) {
            $seconddate = '';
        } elseif(
            $confirm['Student']['second_meet_datetime']['year'] == ''||
            $confirm['Student']['second_meet_datetime']['month'] == ''||
            $confirm['Student']['second_meet_datetime']['day'] == ''||
            $confirm['Student']['second_meet_datetime']['hour'] == ''||
            $confirm['Student']['second_meet_datetime']['min'] == ''
            ) {
            $datetime_errors['second_meet_datetime'][0] = '第二希望の全ての項目を入力して下さい';
            // 時間未入力時のエラー回避処理
            if ($confirm['Student']['second_meet_datetime']['hour'] == ''){
                $this->request->data['Student']['second_meet_datetime']['min'] = '';
                $datetime_errors['second_meet_datetime'][0] = '第二希望の全ての項目を入力して下さい';
            } elseif (
                $confirm['Student']['second_meet_datetime']['hour'] != ''&&
                $confirm['Student']['second_meet_datetime']['min'] != ''&&
                $confirm['Student']['second_meet_datetime']['year'] == ''||
                $confirm['Student']['second_meet_datetime']['month'] == ''||
                $confirm['Student']['second_meet_datetime']['day'] == ''
                ){
                $this->request->data['Student']['second_meet_datetime']['hour'] = '';
                $this->request->data['Student']['second_meet_datetime']['min'] = '';
                $datetime_errors['second_meet_datetime'][0] = '第二希望の全ての項目を入力して下さい';
            }
            $seconddate = '';
            $this->set('datetime_errors',$datetime_errors);
            $datetime_alert_color['second_meet_datetime'] = '#FADBDA';
            $this->set('datetime_alert_color', $datetime_alert_color);
            $this->render('edit');
        } else {
            $seconddate =    $confirm['Student']['second_meet_datetime']['year'].'-'.
                            $confirm['Student']['second_meet_datetime']['month'].'-'.
                            $confirm['Student']['second_meet_datetime']['day'].' '.
                            $confirm['Student']['second_meet_datetime']['hour'].':'.
                            $confirm['Student']['second_meet_datetime']['min'].':00';

            // 日付の妥当性確認
            $secondday =     $confirm['Student']['second_meet_datetime']['year'].'-'.
                            $confirm['Student']['second_meet_datetime']['month'].'-'.
                            $confirm['Student']['second_meet_datetime']['day'];
            list($Y, $m, $d) = explode('-', $secondday);
            if (checkdate($m, $d, $Y) === false) {
                $datetime_errors['second_meet_datetime'][0] =
                    '第二希望に正しい日付を入力して下さい ('.
                    $confirm['Student']['second_meet_datetime']['month'].'月'.
                    $confirm['Student']['second_meet_datetime']['day'].'日と入力されました)';
                $this->set('datetime_errors',$datetime_errors);
                $datetime_alert_color['second_meet_datetime'] = '#FADBDA';
                $this->set('datetime_alert_color', $datetime_alert_color);
                $this->render('edit');
            }
        }
        $confirm['Student']['second_meet_datetime'] = $seconddate;
        $this->set('seconddate', $seconddate);


        // 第三希望のバリデーション処理
        if ($confirm['Student']['third_meet_datetime']['year'] == ''&&
            $confirm['Student']['third_meet_datetime']['month'] == ''&&
            $confirm['Student']['third_meet_datetime']['day'] == ''&&
            $confirm['Student']['third_meet_datetime']['hour'] == ''&&
            $confirm['Student']['third_meet_datetime']['min'] == ''
            ) {
            $thirddate = '';
        } elseif(
            $confirm['Student']['third_meet_datetime']['year'] == ''||
            $confirm['Student']['third_meet_datetime']['month'] == ''||
            $confirm['Student']['third_meet_datetime']['day'] == ''||
            $confirm['Student']['third_meet_datetime']['hour'] == ''||
            $confirm['Student']['third_meet_datetime']['min'] == ''
            ) {
            $datetime_errors['third_meet_datetime'][0] = '第三希望の全ての項目を入力して下さい';
            // 時間未入力時のエラー回避処理
            if ($confirm['Student']['third_meet_datetime']['hour'] == ''){
                $this->request->data['Student']['third_meet_datetime']['min'] = '';
                $datetime_errors['third_meet_datetime'][0] = '第三希望の全ての項目を入力して下さい';
            } elseif (
                $confirm['Student']['third_meet_datetime']['hour'] != ''&&
                $confirm['Student']['third_meet_datetime']['min'] != ''&&
                $confirm['Student']['third_meet_datetime']['year'] == ''||
                $confirm['Student']['third_meet_datetime']['month'] == ''||
                $confirm['Student']['third_meet_datetime']['day'] == ''
                ){
                $this->request->data['Student']['third_meet_datetime']['hour'] = '';
                $this->request->data['Student']['third_meet_datetime']['min'] = '';
                $datetime_errors['third_meet_datetime'][0] = '第三希望の全ての項目を入力して下さい';
            }
            $thirddate = '';
            $this->set('datetime_errors',$datetime_errors);
            $datetime_alert_color['third_meet_datetime'] = '#FADBDA';
            $this->set('datetime_alert_color', $datetime_alert_color);
            $this->render('edit');
        } else {
            $thirddate =    $confirm['Student']['third_meet_datetime']['year'].'-'.
                            $confirm['Student']['third_meet_datetime']['month'].'-'.
                            $confirm['Student']['third_meet_datetime']['day'].' '.
                            $confirm['Student']['third_meet_datetime']['hour'].':'.
                            $confirm['Student']['third_meet_datetime']['min'].':00';

            // 日付の妥当性確認
            $thirdday =     $confirm['Student']['third_meet_datetime']['year'].'-'.
                            $confirm['Student']['third_meet_datetime']['month'].'-'.
                            $confirm['Student']['third_meet_datetime']['day'];
            list($Y, $m, $d) = explode('-', $thirdday);
            if (checkdate($m, $d, $Y) === false) {
                $datetime_errors['third_meet_datetime'][0] =
                    '第三希望に正しい日付を入力して下さい ('.
                    $confirm['Student']['third_meet_datetime']['month'].'月'.
                    $confirm['Student']['third_meet_datetime']['day'].'日と入力されました)';
                $this->set('datetime_errors',$datetime_errors);
                $datetime_alert_color['third_meet_datetime'] = '#FADBDA';
                $this->set('datetime_alert_color', $datetime_alert_color);
                $this->render('edit');
            }
        }
        $confirm['Student']['third_meet_datetime'] = $thirddate;
        $this->set('thirddate', $thirddate);



        // 最終連絡日のバリデーション処理
        if ($confirm['Student']['last_contact_datetime']['year'] == ''&&
            $confirm['Student']['last_contact_datetime']['month'] == ''&&
            $confirm['Student']['last_contact_datetime']['day'] == ''&&
            $confirm['Student']['last_contact_datetime']['hour'] == ''&&
            $confirm['Student']['last_contact_datetime']['min'] == ''
            ) {
            $contactdate = '';
        } elseif(
            $confirm['Student']['last_contact_datetime']['year'] == ''||
            $confirm['Student']['last_contact_datetime']['month'] == ''||
            $confirm['Student']['last_contact_datetime']['day'] == ''||
            $confirm['Student']['last_contact_datetime']['hour'] == ''||
            $confirm['Student']['last_contact_datetime']['min'] == ''
            ) {
            $datetime_errors['last_contact_datetime'][0] = '最終連絡日の全ての項目を入力して下さい';
            // 時間未入力時のエラー回避処理
            if ($confirm['Student']['last_contact_datetime']['hour'] == ''){
                $this->request->data['Student']['last_contact_datetime']['min'] = '';
                $datetime_errors['last_contact_datetime'][0] = '最終連絡日の全ての項目を入力して下さい';
            } elseif (
                $confirm['Student']['last_contact_datetime']['hour'] != ''&&
                $confirm['Student']['last_contact_datetime']['min'] != ''&&
                $confirm['Student']['last_contact_datetime']['year'] == ''||
                $confirm['Student']['last_contact_datetime']['month'] == ''||
                $confirm['Student']['last_contact_datetime']['day'] == ''
                ){
                $this->request->data['Student']['last_contact_datetime']['hour'] = '';
                $this->request->data['Student']['last_contact_datetime']['min'] = '';
                $datetime_errors['last_contact_datetime'][0] = '最終連絡日の全ての項目を入力して下さい';
            }
            $contactdate = '';
            $this->set('datetime_errors',$datetime_errors);
            $datetime_alert_color['last_contact_datetime'] = '#FADBDA';
            $this->set('datetime_alert_color', $datetime_alert_color);
            $this->render('edit');
        } else {
            $contactdate =    $confirm['Student']['last_contact_datetime']['year'].'-'.
                            $confirm['Student']['last_contact_datetime']['month'].'-'.
                            $confirm['Student']['last_contact_datetime']['day'].' '.
                            $confirm['Student']['last_contact_datetime']['hour'].':'.
                            $confirm['Student']['last_contact_datetime']['min'].':00';

            // 日付の妥当性確認
            $thirdday =     $confirm['Student']['last_contact_datetime']['year'].'-'.
                            $confirm['Student']['last_contact_datetime']['month'].'-'.
                            $confirm['Student']['last_contact_datetime']['day'];
            list($Y, $m, $d) = explode('-', $thirdday);
            if (checkdate($m, $d, $Y) === false) {
                $datetime_errors['last_contact_datetime'][0] =
                    '最終連絡日に正しい日付を入力して下さい ('.
                    $confirm['Student']['last_contact_datetime']['month'].'月'.
                    $confirm['Student']['last_contact_datetime']['day'].'日と入力されました)';
                $this->set('datetime_errors',$datetime_errors);
                $datetime_alert_color['last_contact_datetime'] = '#FADBDA';
                $this->set('datetime_alert_color', $datetime_alert_color);
                $this->render('edit');
            }
        }
        $confirm['Student']['last_contact_datetime'] = $contactdate;
        $this->set('contactdate', $contactdate);


        // 日付データをarrayからstringに戻してconfirm内に入れる
        $this->set('confirm', $confirm);

        // 確認画面に入る前にバリデーション処理
        if ($this->request->is('post')) {
            // モデルにpostされたデータをセット
            $this->Student->set($this->request->data);

            // if ($this->Student->validates()) {
            if ($this->Student->validates()) {
                // バリデートが成功した場合

            } else {
                // 失敗した場合
                // $this->Flash->error('バリデーションにかかりました');
                $errors = $this->validateErrors($this->Student);
                $errors['first_meet_datetime'][0] = null;

                $alert_color = [
                    'family_name' => '', 'given_name' => '',
                    'family_name_kana' => '', 'given_name_kana' => '',
                    'email' => '',
                    'phone_number' => '',
                    'birthdate' => '',
                    'postalcode' => ''
                    ];
                foreach ($errors as $key => $error) {
                    $alert_color[$key] = '#FADBDA';
                }
                $this->set('alert_color', $alert_color);

                $this->set('id',$id);
                $this->set('errors',$errors);
                $this->render('edit');
            }
        }
    }

    public function subconfirm($id = null) {
        $this->set('title_for_layout', '確認画面');
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

        // 受講の目的に改行がある場合、全て表示させた状態で編集を開始する
        $purpose_rowcount = 0;
        $purpose_rowcount = substr_count($this->request->data['Student']['detail_purpose'], "\n") + 1;
        $this->set('purpose_rowcount', $purpose_rowcount);

        // 日付フォーマット加工(array→string)
        if ($confirm['Student']['birthdate']['year'] != '') {
            $birthdate =    $confirm['Student']['birthdate']['year'].'-'.
                            $confirm['Student']['birthdate']['month'].'-'.
                            $confirm['Student']['birthdate']['day'];
            } else {$birthdate = '';}
        $this->set('birthdate', $birthdate);
        // 日付データをarrayからstringに戻してconfirm内に入れる
        $confirm['Student']['birthdate'] = $birthdate;

        $this->set('confirm', $confirm);


        // 確認画面に入る前にバリデーション処理
        if ($this->request->is('post')) {
            // モデルにpostされたデータをセット
            $this->Student->set($this->request->data);

            if ($this->Student->validates()) {
                // バリデートが成功した場合
                $this->Flash->success('送信されたデータは正常です');
            } else {
                // 失敗した場合
                // $this->Flash->error('バリデーションにかかりました');
                $errors = $this->validateErrors($this->Student);

                $alert_color = [
                    'family_name' => '', 'given_name' => '',
                    'family_name_kana' => '', 'given_name_kana' => '',
                    'email' => '',
                    'phone_number' => '',
                    'birthdate' => '',
                    'postalcode' => ''
                    ];
                foreach ($errors as $key => $error) {
                    $alert_color[$key] = '#FADBDA';
                }
                $this->set('alert_color', $alert_color);
                $this->set('id',$id);
                $this->set('errors',$errors);
                $this->render('subedit');
            }
        }
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

    public function subsave($id = null) {
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
        $this->set('title_for_layout', '検索画面');
        $count_students = 0;
        $this->paginate = [
            'order' => ['created' => 'desc'],
            'limit' => 100,
        ];
        if ($this->request->is('post')){
            if ($this->request->data['Student']['search_sei'] != '' ||
                $this->request->data['Student']['search_mei'] != '' ||
                $this->request->data['Student']['search_phone'] != '') {
                $search_sei = $this->request->data['Student']['search_sei'];
                $search_mei = $this->request->data['Student']['search_mei'];
                $search_phone = $this->request->data['Student']['search_phone'];
                $conditions = [
                    // 部分一致
                    'Student.family_name LIKE' => "%{$search_sei}%",
                    'Student.given_name LIKE' => "%{$search_mei}%",
                    'Student.phone_number LIKE' => "%{$search_phone}%",
                    // 全項目必須の完全一致
                    // 'Student.family_name LIKE' => $search_sei,
                    // 'Student.given_name LIKE' => $search_mei,
                    // 'Student.phone_number LIKE' => $search_phone,
                ];
                $hit_students = $this->paginate('Student', $conditions);
                $this->set('hit_students', $hit_students);
                $count_students = count($hit_students);
                if ($count_students == 0){
                    $this->Flash->error('検索条件に一致する対象者がいません。');
                }

            } else {
                $this->Flash->error('検索条件を入力して下さい。');
            }
        }
        $this->set('count_students', $count_students);
    }

    public function entry(){
        $this->set('title_for_layout', 'エントリーフォーム');
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
