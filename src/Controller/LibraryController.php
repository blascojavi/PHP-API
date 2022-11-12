<?php
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LibraryController extends AbstractController
{
    private $logger;


    /**
   * @Route ("/library/list",name="library_list")
*/

public function list(Request $request,LoggerInterface $logger){
    $title = $request->get('title','default');
    $logger->info('list action called 2');
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

                ],
                [
                    'id'=>3,
                    'tittle'=>$title

                ],
            ]
        ]);
    return $response;

}
};
