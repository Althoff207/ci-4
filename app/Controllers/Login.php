<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function loginAction()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $userCheck = new UsersModel();
        $check = $userCheck->where('username',$username)->first();

        if($check){
            //if data valid
            $checkPassword = password_verify($password, $check['password']);
            if($checkPassword){
                    //if password valid
                $sessData = [
                    'id' => $check['id'],
                    'username' => $check['username'],
                    'name' => $check['name'],
                    'level' => $check['level'],
                    'logged_in' => true,
                ];
                $session->set($sessData);
                switch($check['level']){
                    case 'admin':
                        return redirect()->to('/admin');
                    break;
                    case 'user':
                        return redirect()->to('/user');
                    break;
                    default:
                        session()->setFlashdata('message', 'Failed To Login!, Account Not Registered!');
                        return redirect()->to('/login');
                    break;
                }
            }else{
                    //if password not valid
                session()->setFlashdata('message', 'Failed To Login!, Wrong Password');
                return redirect()->to('/login');
            }

        }else{
            //if data not valid
            session()->setFlashdata('message', 'Failed To Login!, Wrong Username');
            return redirect()->to('/login');
        }
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
