<?php

namespace Tests;

use Tests\TestCase;
use App\Validators\FaltaAtrasoValidator;

class FaltaAtrasoValidatorTest extends TestCase
{   
    /**
     * @var FaltaAtrasoValidator
     */
    protected $validator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->validator = new FaltaAtrasoValidator();
    }

    /**
     * Teste 1: Deve falhar ao tentar validar uma quantidade de horas negativa.
     *
     * Este é o primeiro teste, focado no cenário principal de falha.
     */
    public function testDeveFalharComQuantidadeDeHorasNegativa()
    {
        $data = [
            'quantidade_horas' => -5,
            'quantidade_minutos' => 0,
        ];

        $this->assertFalse($this->validator->validate($data), 'A validação deve falhar para horas negativas.');
        $this->assertContains('A quantidade de horas não pode ser negativa.', $this->validator->getErrors());
    }

    /**
     * Teste 2: Deve falhar ao tentar validar uma quantidade de minutos negativa.
     *
     * Este teste verifica a validação de minutos negativos.
     */
    public function testDeveFalharComQuantidadeDeMinutosNegativa()
    {
        $data = [
            'quantidade_horas' => 0,
            'quantidade_minutos' => -10,
        ];

        $this->assertFalse($this->validator->validate($data), 'A validação deve falhar para minutos negativos.');
        $this->assertContains('A quantidade de minutos não pode ser negativa.', $this->validator->getErrors());
    }

    /**
     * Teste 3: Deve passar com valores positivos ou zero.
     *
     * Este teste verifica o cenário de sucesso com valores válidos.
     */
    public function testDevePassarComValoresPositivosOuZero()
    {
        $data = [
            'quantidade_horas' => 5,
            'quantidade_minutos' => 30,
        ];

        $this->assertTrue($this->validator->validate($data), 'A validação deve passar para valores positivos.');
        $this->assertEmpty($this->validator->getErrors(), 'Não deve haver erros para valores válidos.');
    }
}

