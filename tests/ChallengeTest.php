<?php

use App\Controller\ChallengeController;
use PHPUnit\Framework\TestCase;
use Monolog\Logger;

class ChallengeTest extends TestCase{


    public function testOperationSuccessfully(): void
    {

        // array expectativo donde se ingresan los resultados esperados
        $expected = [
            1,
            2,
            "Falabella",
            4,
            "IT",
            "Falabella",
            7,
            8,
            "Falabella",
            "IT",
            11,
            "Falabella",
            13,
            14,
            "Integración",
            16,
        ];
        $limit = count($expected); // límite superior que se pasará a la funcción

        $challengeController = new ChallengeController(
            new Logger("logger")
        );

        $result = $challengeController->operation($limit);

        $this->assertEquals($expected,$result);
    }


}