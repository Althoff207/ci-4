<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class UserFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->get('logged_in')){
            session()->setFlashdata('message', 'youre not logged in');
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}