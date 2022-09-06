<?php
namespace App\Models;
use CodeIgniter\Model;

class userModel extends Model{
    protected $table = 'usuarios';
    protected $primaryKey = 'USUARIO_ID';
    protected $returnType = 'array';
    protected $allowedFields = ['LOGIN', 'SENHA', 'NOME_COMPLETO'];


}