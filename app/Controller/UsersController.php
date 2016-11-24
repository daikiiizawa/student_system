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
            $request_user = $this->User->find('first', [
                'fields' => ['id', 'try_login'], '
                conditions' => ['email' => $this->request->data['User']['email']]
            ]);
            if($request_user['User']['try_login'] >= 5){
                $this->Flash->error('試行回数が5回以上です。アカウントをロックしました。');
                $this->redirect($this->referer());
            }
            if($this->Auth->login()){
                $request_user['User']['try_login'] = 0;
                $this->User->save($request_user);
                $this->Flash->success('ログインしました');
                $this->User->id = $this->Auth->user('id');
                $this->redirect(['controller' => 'students', 'action' => 'index', 'students_status_code' => '0']);
            }
            if(!empty($request_user)){
                $request_user['User']['try_login'] += 1;
                $this->User->save($request_user);
                if($request_user['User']['try_login'] >=5){
                  $this->Flash->error('試行回数が5回以上です。アカウントをロックしました。');
                  $this->redirect($this->referer());
                }
            }
            $this->Flash->error('メールアドレスかパスワードが間違っています');
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
            $request_user = $this->User->find('first',
                ['fields' => ['id', 'email', 'try_login'], 'conditions' => ['email' => $this->request->data['User']['email']]]
            );

            if($request_user){
                //パスワードリセットの処理
                $new_password = $this->User->random();
                $passwordHasher = new BlowfishPasswordHasher();
                $hashed_password = $passwordHasher->hash($new_password);
                $this->User->updateAll(
                    ['User.password' => "'".$hashed_password. "'", 'User.try_login' => 0],
                    ['User.id' => $request_user['User']['id']]
                );

                //メール送信の処理
                $user_email = $request_user['User']['email'];
                $email = new CakeEmail('default');
                $email->from(['info@elites.com' => 'ELITES']);
                $email->to($user_email);
                $email->template('reset_password');
                $email->subject('生徒管理システム パスワードのリセット');
                $email->viewVars(compact('new_password'));
                $email->send();
                $this->Flash->success('登録されているアドレスにメールを送信しました');
            } else {
                //セキュリティ保護のため、存在しないアドレスでもsuccessさせる
                $this->Flash->success('登録されているアドレスにメールを送信しました');
            }
        }
    }

}
