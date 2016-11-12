<?php

class Student extends AppModel {

    public $actsAs = array('Search.Searchable');

    public $filterArgs = array(
        'students_status_code' => array('type' => 'value')
    );

    //programming_lv、都道府県との紐付け
    public $hasOne = ['Level', 'Region'];

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
                'message' => 'ふりがな(姓)を入力してください'
            ],
        ],
        'given_name_kana' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => 'ふりがな(名)を入力してください'
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


}
