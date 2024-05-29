<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Page2Controller 
{
    
    #[Route('/page2', name: 'page', methods:['GET'])]
    public function hello() 
    {
        return new Response("Johnny");
    }
}