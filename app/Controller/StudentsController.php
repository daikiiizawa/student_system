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
        $this->Prg->commonProcess();
    }

    public function add(){

    }

    public function edit(){

    }

    public function view(){

    }

    public function entry(){

    }

    public function thanks(){

    }

}
