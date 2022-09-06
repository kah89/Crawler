<?php
namespace App\Models;
use CodeIgniter\Model;

class autorizacoesModel extends Model{
    protected $table = 'autorizacoes';
    protected $primaryKey = 'USUARIO_ID';
    protected $returnType = 'array';
    protected $allowedFields = ['CHAVE_AUTORIZACAO'];


    public function getAutoriza($ID = null){
        if($ID === null){
            return $this->findAll();        
        }
        return $this->asArray()->where(['ID' => $ID])->first();
    }
}