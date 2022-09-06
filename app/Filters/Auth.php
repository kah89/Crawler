<?php namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
class Auth implements FilterInterface
{
public function before(RequestInterface $request, $arguments = null)
{
// Se o usuario não logar
if(! session()->get('logged_in')){
// redirecionamento para pagina de login
return redirect()->to('/pages/index'); 
}
}
//--------------------------------------------------------------------
public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
{
// Do something here
}
}