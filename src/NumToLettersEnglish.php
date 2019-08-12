<?php

namespace VerumConsilium\NumToLetters;

use VerumConsilium\NumToLetters\Contract\NumToLetters as NumToLettersContract;

class NumToLettersEnglish extends NumToLettersContract
{
    protected function and(): string
    {
        return '';
    }

    protected function zero(): string
    {
        return 'ZERO';
    }

    protected function one(): string
    {
        return 'ONE';
    }

    protected function units(): array
    {
        return [
            '',
            'ONE ',
            'TWO ',
            'THREE ',
            'FOUR ',
            'FIVE ',
            'SIX ',
            'SEVEN ',
            'EIGHT ',
            'NINE ',
            'TEN ',
            'ELEVEN ',
            'TWELVE ',
            'THIRTEEN ',
            'FOURTEEN ',
            'FIFTEEN ',
            'SIXTEEN ',
            'SEVENTEEN ',
            'EIGHTEEN ',
            'NINETEEN ',
            'TWENTY '
        ];
    }

    protected function tens(): array
    {
        return [
            'TWENTY ',
            'THIRTY ',
            'FOURTY ',
            'FIFTY ',
            'SIXTY ',
            'SEVENTY ',
            'EIGHTY ',
            'NINETY ',
            'HUNDRED '
        ];
    }

    protected function oneHundred(): string
    {
        return 'ONE HUNDRED';
    }

    protected function hundreds(): array
    {
        return [
            'ONE HUNDRED ',
            'TWO HUNDRED ',
            'THREE HUNDRED ',
            'FOUR HUNDRED ',
            'FIVE HUNDRED ',
            'SIX HUNDRED ',
            'SEVEN HUNDRED ',
            'EIGHT HUNDRED ',
            'NINE HUNDRED '
        ];
    }

    protected function oneThousand(): string
    {
        return 'ONE THOUSAND';
    }

    protected function thousands(): string
    {
        return 'THOUSAND';
    }

    protected function oneMillion(): string
    {
        return 'ONE MILLION';
    }

    protected function millions(): string
    {
        return 'MILLON';
    }
}
