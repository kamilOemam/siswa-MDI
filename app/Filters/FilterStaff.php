<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterStaff implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // merintah sebelum login
        if (session()->idlevel == 0) {
            return redirect()->to('/login/index');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // setelah login
        if (session()->idlevel == 3) {
            return redirect()->to('/home/index');
        }
    }
}
