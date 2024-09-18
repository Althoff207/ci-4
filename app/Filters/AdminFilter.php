<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->get('logged_in')){
            session()->setFlashdata('message', 'youre not logged in');
            return redirect()->to('/login');
        }

        if(session()->get('level') != 'admin'){
            session()->setFlashdata('message', 'you cannot access admin page');
            return redirect()->back();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
        {
            // Do something here
        }
}
