<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LibraryController extends AbstractController
{
/**
   * @Route ("/library/list",name="library_list")
*/

public function list(){
    //$response = new Response();
    $response = new JsonResponse();
    //$response->setContent('<div>Hola Mundo</div>');
    $response->setData([
        'succes'=>true,
            'data'=>[
                [
                    'id'=>1,
                    'titte'=>'Hacia rutas salvajes'
                ],
                [
                    'id'=>2,
                    'tittle'=>'El nombre del viento'

                ]
            ]
        ]);
    return $response;

}
};
