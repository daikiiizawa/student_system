<?php
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController{

  public function beforeFilter(){
    parent::beforeFilter();

    $this->Auth->allow('signup', 'password_reset');
  }

  public function login(){
    if($this->Auth->user()){
      return $this->redirect($this->Auth->redirectUrl());
    }

    if($this->request->is('post')){
      if($this->Auth->login()){
        $this->Flash->success('ログインしました');
        $this->User->id = $this->Auth->user('id');
        $this->redirect(['controller' => 'students', 'action' => 'index']);
      }
      $this->Flash->error('メールアドレスかパスワードが違います');
    }

  }

  public function signup(){
    if($this->Auth->user()){
      return $this->redirect($this->Auth->redirectUrl());
    }

    if($this->request->is('post')){
      $this->User->create();
      if($this->User->save($this->request->data)){
        $this->Flash->success('ユーザーを登録しました');
        return $this->redirect(['action' => 'login']);
      }
    }

  }

  public function logout(){
    $this->Flash->success('ログアウトしました');
    $this->redirect($this->Auth->logout());
  }

  public function delete(){

  }

  public function edit(){
    if($this->request->is(['post', 'put'])){

      if($this->User->save($this->request->data)) {
        $this->Flash->success('パスワードを変更しました');

        $user = $this->User->find('first',
          ['fields' => ['id', 'email', 'password'],
          'conditions' => ['id' => $this->Auth->user('id')]]);
        $this->Auth->login($user['User']);

        return $this->redirect($this->Auth->redirectUrl());
      }
    } else {
      $this->request->data = $this->User->findById($this->Auth->user('id'));
    }
  }


  public function password_reset(){
    if($this->request->data){
      $user_email = $this->User->find('first',
        ['fields' => 'email', 'conditions' => ['email' => $this->request->data['User']['email']]]
      );

      if($user_email){
        //パスワードリセットの処理
        $new_password = $this->User->random();
        $passwordHasher = new BlowfishPasswordHasher();
        $hashed_password = $passwordHasher->hash($new_password);
        $userId = $this->User->find('first',
          ['fields' => 'id', 'conditions' => ['email' => $this->request->data['User']['email']]]
        );
        $this->User->updateAll(['User.password' => "'".$hashed_password. "'"], ['User.id' => $userId['User']['id']]);

        //メール送信の処理
        $user_email = $user_email['User']['email'];
        $email = new CakeEmail('default');
        $email->from(['info@elites.com' => 'ELITES']);
        $email->to($user_email);
        $email->template('reset_password');
        $email->subject('生徒管理システム パスワードのリセット');
        $email->send();
        $this->Flash->success('登録されているアドレスにメールを送信しました');
        var_dump($userId);
        var_dump($new_password);
        var_dump($hashed_password);
        $this->set('userId', $userId);
      } else {
        //セキュリティ保護のため、存在しないアドレスでもsuccessさせる
        $this->Flash->success('登録されているアドレスにメールを送信しました');
      }
    }

  }

}
