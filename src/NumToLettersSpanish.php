<?php

namespace VerumConsilium\NumToLetters;

use VerumConsilium\NumToLetters\Contract\NumToLetters as NumToLettersContract;

class NumToLettersSpanish extends NumToLettersContract
{
    protected function and(): string
    {
        return 'Y';
    }

    protected function zero(): string
    {
        return 'CERO';
    }

    protected function one(): string
    {
        return 'UN';
    }

    protected function units(): array
    {
        return [
            '',
            'UN ',
            'DOS ',
            'TRES ',
            'CUATRO ',
            'CINCO ',
            'SEIS ',
            'SIETE ',
            'OCHO ',
            'NUEVE ',
            'DIEZ ',
            'ONCE ',
            'DOCE ',
            'TRECE ',
            'CATORCE ',
            'QUINCE ',
            'DIECISEIS ',
            'DIECISIETE ',
            'DIECIOCHO ',
            'DIECINUEVE ',
            'VEINTE '
        ];
    }

    protected function tens(): array
    {
        return [
            'VENTI',
            'TREINTA ',
            'CUARENTA ',
            'CINCUENTA ',
            'SESENTA ',
            'SETENTA ',
            'OCHENTA ',
            'NOVENTA ',
            'CIEN '
        ];
    }

    protected function oneHundred(): string
    {
        return 'CIEN';
    }

    protected function hundreds(): array
    {
        return [
            'CIENTO ',
            'DOSCIENTOS ',
            'TRESCIENTOS ',
            'CUATROCIENTOS ',
            'QUINIENTOS ',
            'SEISCIENTOS ',
            'SETECIENTOS ',
            'OCHOCIENTOS ',
            'NOVECIENTOS '
        ];
    }

    protected function oneThousand(): string
    {
        return 'MIL';
    }

    protected function thousands(): string
    {
        return 'MIL';
    }

    protected function oneMillion(): string
    {
        return 'UN MILLON';
    }

    protected function millions(): string
    {
        return 'MILLONES';
    }
}
