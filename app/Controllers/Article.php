<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\articleModel;
use CodeIgniter\Controller;
use Tests\Support\Models\articleModel as ModelsarticleModel;


class Article extends BaseController
{

    public function saveArticle()
    {

        helper(['form']);
        $rules = [
            'NOME'          => 'required|min_length[3]|max_length[150]',
            'LINK'         => 'required|min_length[3]|max_length[50]'
        ];

        if ($this->validate($rules)) {
            $model = new articleModel();
            $data = [
                'NOME'     => $this->request->getVar('NOME'),
                'LINK'    => $this->request->getVar('LINK'),
            ];
            $model->save($data);
            return redirect()->to(\base_url('/Article/successArticle'));
        } else {
            $data['validation'] = $this->validator;
            echo view('templates/header',);
            echo view('pages/register_article', $data);
            echo view('templates/footer',);
        }
    }


    public function editArticle()
    {
            $uri = current_url(true);
            $artigo_id = $uri->getSegment(5);
            $model = new articleModel();
            $result = $model->find($artigo_id);

            
            $data = [
                'data' =>  $result
            ];

            helper(['form']);

            if ($this->request->getMethod() == 'post') {
                //VALIDAÇÕES
                $rules = [
                    'NOME'  => 'required|min_length[3]|max_length[150]',
                    'LINK'  => 'required|min_length[3]|max_length[50]',
                ];

            
                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else {
                    //salva no BD
                    $newdData = [
                        'ID_ARTIGOS' => $artigo_id, 
                        'NOME' => $this->request->getVar('NOME'),
                        'LINK' => $this->request->getVar('LINK')
                    ];
                } 
            
                
                if ($model->save($newdData)) { 
                            return redirect()->to(\base_url('/Article/successArticle'));
                        } else {
                            return redirect()->to(\base_url('/Article/listArticle'));
                        }
                    }
                


        echo view('templates/header');
        echo view('pages/edit_article', $data);
        echo view('templates/footer');
    }

    public function listArticle()
    {
        session_start();
        // $usuario_id = $_SESSION['USUARIO_ID'];
        $model = new articleModel();
        if($this->request->getGet('q')){
            $q=$this->request->getGet('q');
            $data = [
                'data' => $model->like('NOME', $q , '')->findAll(),
            ];
        }else{
            $data = [
                'data' => $model->findAll(),
                // 'id' => $usuario_id
            ];
        }
        // \var_dump($data);exit;

        echo view('templates/header');
        echo view('pages/list_article', $data);
        echo view('templates/footer');
    }

    public function successArticle()
    {
        helper('form');

        echo view('templates/header');
        echo view('pages/sucess_article');
        echo view('templates/footer');
    }


    public function deleteArticle($ID_ARTIGOS = null)
    {
        $model = new articleModel();
        $model->delete($ID_ARTIGOS);

        echo view('templates/header');
        echo view('pages/delete_article');
        echo view('templates/footer');
    }


}