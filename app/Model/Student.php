<?php

class Student extends AppModel {

    public $actsAs = array('Search.Searchable');

    public $filterArgs = array(
        'students_status_code' => array('type' => 'value')
    );

    // 都道府県との紐付け
    public $belongsTo = [
        'Region' => ['className' => 'Region']
    ];


    public $validate = [
        'family_name' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '姓を入力して下さい'
            ],
            'length' => [
                'rule' => ['between', 1, 50],
                'message' => '姓を50字以下で入力して下さい'
            ],
        ],
        'given_name' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '名を入力して下さい'
            ],
            'length' => [
                'rule' => ['between', 1, 50],
                'message' => '名を50字以下で入力して下さい'
            ],
        ],
        'family_name_kana' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => 'フリガナ(姓)を入力して下さい'
            ],
            'katakana' => [
                'rule' => ['katakana_only'],
                'message' => 'フリガナ(姓)は全角カタカナで入力して下さい'
            ],
            'length' => [
                'rule' => ['between', 1, 50],
                'message' => 'フリガナ(姓)を50字以下で入力して下さい'
            ],
        ],
        'given_name_kana' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => 'フリガナ(名)を入力して下さい'
            ],
            'katakana' => [
                'rule' => ['katakana_only'],
                'message' => 'フリガナ(名)は全角カタカナで入力して下さい'
            ],
            'length' => [
                'rule' => ['between', 1, 50],
                'message' => 'フリガナ(名)を50字以下で入力して下さい'
            ],
        ],
        'email' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => 'メールアドレスを入力してください'
            ],
              'validEmail' => [
                'rule' => 'email',
                'message' => 'メールアドレスを正しく入力して下さい'
            ],
            'length' => [
                'rule' => ['between', 1, 255],
                'message' => 'メールアドレスを255字以下で入力して下さい'
            ],
        ],
        'phone_number' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '電話番号を入力してください'
            ],
              'numeric' => [
                'rule' => 'numeric',
                'message' => '電話番号はハイフン無しの半角数字で入力して下さい'
            ],
            'length' => [
                'rule' => ['between', 10, 20],
                'message' => '電話番号を10字以上で入力して下さい'
            ],
        ],
        'postalcode' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '電話番号を入力してください'
            ],
        ],
        'postalcode' => [
            'numeric' => [
                'rule' => 'numeric',
                'message' => '郵便番号はハイフン無しの半角数字で入力して下さい'
            ],
        ],
        'birthdate' => [
            'required' => [
                'rule' => ['date', 'ymd'],
                'message' => '誕生日を正しく入力して下さい'
            ],
        ],
    ];

    public function katakana_only($wordvalue){
        $value = array_shift($wordvalue);

        return preg_match("/^[ァ-ヶー゛゜]*$/u", $value);
    }


}
