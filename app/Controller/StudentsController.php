<?php

class StudentsController extends AppController{

  public function beforeFilter(){
    parent::beforeFilter();

    $this->Auth->allow('add');
  }

  public function index(){

  }

  public function add(){

  }

  public function edit(){

  }

  public function view(){

  }

}
