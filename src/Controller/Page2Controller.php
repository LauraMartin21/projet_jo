<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class Page2Controller {
    #[Route('/Page2')]
    public function hello() {
        dd('Johnny');
    }
}