<?php

namespace App\Validators;

class FaltaAtrasoValidator
{
    /**
     * Mensagens de erro de validação.
     */
    private const ERROR_HORAS_NEGATIVAS = 'A quantidade de horas não pode ser negativa.';
    private const ERROR_MINUTOS_NEGATIVOS = 'A quantidade de minutos não pode ser negativa.';

    /**
     * @var array<string>
     */
    protected array $errors = [];

    /**
     * Valida os dados de falta/atraso.
     *
     * @param array<string, mixed> $data
     * @return bool
     */
    public function validate(array $data): bool
    {
        $this->errors = [];

        $this->validateQuantidadeHoras($data);
        $this->validateQuantidadeMinutos($data);

        return empty($this->errors);
    }

    /**
     * Valida a quantidade de horas.
     *
     * @param array<string, mixed> $data
     * @return void
     */
    private function validateQuantidadeHoras(array $data): void
    {
        if (isset($data['quantidade_horas']) && $data['quantidade_horas'] < 0) {
            $this->errors[] = self::ERROR_HORAS_NEGATIVAS;
        }
    }

    /**
     * Valida a quantidade de minutos.
     *
     * @param array<string, mixed> $data
     * @return void
     */
    private function validateQuantidadeMinutos(array $data): void
    {
        if (isset($data['quantidade_minutos']) && $data['quantidade_minutos'] < 0) {
            $this->errors[] = self::ERROR_MINUTOS_NEGATIVOS;
        }
    }

    /**
     * Retorna os erros de validação.
     *
     * @return array<string>
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}

