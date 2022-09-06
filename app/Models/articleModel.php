<?php
namespace App\Models;
use CodeIgniter\Model;

class articleModel extends Model{
    protected $table = 'artigos';
    protected $primaryKey = 'ID_ARTIGOS';
    protected $returnType = 'array';
    protected $allowedFields = ['NOME', 'LINK'];
}