<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class indexController
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        $number = mt_rand(0, 5);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}