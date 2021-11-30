<?php

use App\Controller\ChallengeController;
use PHPUnit\Framework\TestCase;
use Monolog\Logger;

class ChallengeTest extends TestCase{



    public function testOperationSuccessfully(): void
    {

        $expected = [
            1,
            2,
            "Falabella",
            4,
            "IT",
            "Falabella",
            7,
            8,
        ];

        $challengeController = new ChallengeController(
            new Logger("logger")
        );

        $result = $challengeController->operation(5);

        $this->assertEquals($expected,$result);
    }


}