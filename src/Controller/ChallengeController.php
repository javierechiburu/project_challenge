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
        $arr_mult = range(1, $limit);
        for ($i=3; $i <= $limit; $i=$i+3) {
            $arr_mult[$i-1] = 'Falabella';
        }
        for ($i=5; $i <= $limit; $i=$i+5) {
            $arr_mult[$i-1] = 'IT';
            if($i%15==0){
                $arr_mult[$i-1] = 'Integración';
            }
        }

        ksort($arr_mult);
        $arr_mult = array_values($arr_mult);

        return $arr_mult;
    }
}
