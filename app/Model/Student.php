<?php

class Student extends AppModel {

    public $actsAs = array('Search.Searchable');

    public $filterArgs = array(
        'students_status_code' => array('type' => 'value')
    );

}