<?php

class Region extends AppModel{

    public $hasMany = [
        'Student' => ['className' => 'Student']
    ];

}
