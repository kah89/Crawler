<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
  
class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        echo "Bem-vindo, ".$session->get('LOGIN');
    }
}