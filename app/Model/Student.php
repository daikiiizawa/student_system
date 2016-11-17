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
                'message' => '姓を入力してください'
            ],
        ],
        'given_name' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '名を入力してください'
            ],
        ],
        'family_name_kana' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => 'フリガナ(姓)を入力してください'
            ],
            'katakana' => [
                'rule' => ['katakana_only'],
                'message' => '全角カタカナで入力して下さい'
            ],
        ],
        'given_name_kana' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => 'フリガナ(名)を入力してください'
            ],
            'katakana' => [
                'rule' => ['katakana_only'],
                'message' => '全角カタカナで入力して下さい'
            ],
        ],
        'email' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => 'メールアドレスを入力してください'
              ],
              'validEmail' => [
                  'rule' => 'email',
                  'message' => '正しいメールアドレスを入力してください'
              ],
        ],
        'phone_number' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '電話番号を入力してください'
              ],
              'numeric' => [
                  'rule' => 'numeric',
                  'message' => 'ハイフン無しで入力して下さい'
              ],
        ],
    ];

    public function katakana_only($wordvalue){
        $value = array_shift($wordvalue);
        
        return preg_match("/^[ァ-ヶー゛゜]*$/u", $value);
    }


}
