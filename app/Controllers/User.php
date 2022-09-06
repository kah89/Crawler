<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\userModel;
use CodeIgniter\Controller;
use Tests\Support\Models\UserModel as ModelsUserModel;


class User extends BaseController
{
    public function index()
    {
        helper(['form']);

        echo view('templates/header',);
        echo view('pages/index');
        echo view('templates/footer',);
    }

    
    private function setUserSession($user)
    {
        $model =  new UserModel();
        $data = [
            'USUARIO_ID' => $user['USUARIO_ID'],
            'NOME_COMPLETO' => $user['NOME_COMPLETO'],
            'isLoggedIn' => true,
            'data' => $model->findAll(),
        ];

        session()->set($data);
    }
    public function save()
    {
        helper(['form']);
        $rules = [
            'NOME_COMPLETO'          => 'required|min_length[3]|max_length[150]',
            'LOGIN'         => 'required|min_length[3]|max_length[50]',
            'SENHA'      => 'required|min_length[3]|max_length[20]'
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'NOME_COMPLETO'     => $this->request->getVar('NOME_COMPLETO'),
                'LOGIN'    => $this->request->getVar('LOGIN'),
                'SENHA' => $this->request->getVar('SENHA')
            ];
            $model->save($data);
            return redirect()->to(\base_url('/user/success'));
        } else {
            $data['validation'] = $this->validator;
            echo view('templates/header',);
            echo view('pages/register_user', $data);
            echo view('templates/footer',);
        }
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $LOGIN = $this->request->getVar('LOGIN');
        $SENHA = $this->request->getVar('SENHA');
        $data = $model->where('LOGIN', $LOGIN)->first();
        if ($data) {
            $pass = $data['SENHA'];
            if ($pass == $SENHA) {
                $ses_data = [
                    'USUARIO_ID'       => $data['USUARIO_ID'],
                    'NOME_COMPLETO'     => $data['NOME_COMPLETO'],
                    'LOGIN'    => $data['LOGIN'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(\base_url('/Article/listArticle'));
            } else {
                $session->setFlashdata('msg', 'Login ou Senha incorretos');
                return redirect()->to('./User');
            }
        } else {
            $session->setFlashdata('msg', 'Login não encontrado');
            return redirect()->to('pages/index');
        }
    }

    public function edit()
    {
        
        $session = session();
           $usuario_id = $_SESSION['USUARIO_ID'];
            $model = new userModel();
            $result = $model->find($usuario_id);

            
            $data = [
                'data' =>  $result
            ];
            // \var_dump($data);exit;

            helper(['form']);

            if ($this->request->getMethod() == 'post') {
                //VALIDAÇÕES
                $rules = [
                    'NOME_COMPLETO'          => 'required|min_length[3]|max_length[150]',
                    'LOGIN'         => 'required|min_length[3]|max_length[50]',
                ];

            
                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else {
                    //salva no BD
                    $newdData = [
                        'USUARIO_ID' => $usuario_id, 
                        'NOME_COMPLETO' => $this->request->getVar('NOME_COMPLETO'),
                        'LOGIN' => $this->request->getVar('LOGIN'),
                        'SENHA' => $this->request->getVar('SENHA'),
                    ];
                } 
            
                // var_dump($data);die;
                
                if ($model->save($newdData)) { 
                            return redirect()->to(\base_url('/user/success'));
                        } else {
                            return redirect()->to(\base_url('/user/list'));
                        }
                    }
                    // var_dump($model->save($newdData));die;
                


        echo view('templates/header');
        echo view('pages/edit_user', $data);
        echo view('templates/footer');
    }


    public function success()
    {
        helper('form');

        echo view('templates/header');
        echo view('pages/success');
        echo view('templates/footer');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}