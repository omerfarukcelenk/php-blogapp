<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
class MyFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        echo "Before Çalıştı";
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        echo "After çalıştır";
    }
}