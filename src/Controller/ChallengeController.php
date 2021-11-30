<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChallengeController extends AbstractController
{
    private LoggerInterface $logger;

    public function __construct(
        LoggerInterface $logger
    )
    {
        $this->logger = $logger;
    }
    /**
     * @Route("/", name="displayHttp")
     */
    public function displayHttp(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'ChallengeController',
            'resultados' => []
        ]);
    }


    /**
     * @Route("/result", name="displayResultHttp")
     */
    public function displayResultHttp(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'ChallengeController',
            'resultados' => $this->operation(100)
        ]);
    }


    public function operation(int $limit = 100): array
    {
        $arr_mult = range(1, $limit); // array de rango 1 a 100
        for ($i=3; $i <= $limit; $i=$i+3) { // for que aumenta de 3 para obtener múltiplos
            $arr_mult[$i-1] = 'Falabella'; // se reemplaza los índices del array de múltiplos de 3 por "Falabella"
        }
        for ($i=5; $i <= $limit; $i=$i+5) { // for que aumenta de 5 para obtener múltiplos
            $arr_mult[$i-1] = 'IT'; // se reemplaza los índices del array de múltiplos de 3 por "Falabella"
            if($i%15==0){ // se valida los números que son múltiplos de 3 y 5
                $arr_mult[$i-1] = 'Integración'; // se reemplaza los índices del array de múltiplos de 15 por "Integración"
            }
        }

        ksort($arr_mult); // se ordena array
        //$arr_mult = array_values($arr_mult); // se formatean los indices para que inicien desde 0

        return $arr_mult;
    }
}
