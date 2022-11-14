<?php
namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LibraryController extends AbstractController
{
    #private $logger;


    /**
     * @Route("/books", name="books_get")
     */

    public function list(Request $request, BookRepository $bookRepository)
{

    $books = $bookRepository->findAll();
    $booksAsArray = [];
    foreach ($books as $book) {
        $booksAsArray[] = [
            'id' => $book->getId(),
            'title' => $book->getTitle(),
            'image' => $book->getImage()
        ];
    };
    $response = new JsonResponse();

    $response->setData([
        'success' => true,
        'data' => $booksAsArray
    ]);
    return $response;
}

    /**
     * @Route("/book/create", name="create_book")
     */
public function createBook(Request $request, EntityManagerInterface $em){
    $book = new Book();
    $response=new JsonResponse();
    $title = $request->get('title',null);
    if (empty($title)){
        $response->setData([
            'succes'=>false,
            'error'=>'Title cannot be empty',
            'data'=>null


        ]);
        return $response;

    }

    $book->setTitle($title);
    $em->persist($book);
    $em->flush();//Todos los objetos controlados con persist los manda a la bbdd

        $response->setData([
        'succes'=>true,
        'data'=>[
            [
                'id'=>$book->getId(),
                'title'=>$book->getTitle()
            ]
            ]
    ]);
    return $response;
}
};
