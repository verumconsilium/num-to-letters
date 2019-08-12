<?php

namespace VerumConsilium\NumToLetters\Factory;

use VerumConsilium\NumToLetters\Contract\NumToLetters as NumToLettersContract;
use VerumConsilium\NumToLetters\NumToLettersEnglish;
use VerumConsilium\NumToLetters\NumToLettersSpanish;

class NumToLetters
{
    /**
     * NumToLetters implementations
     *
     * @var array
     */
    protected static $implementations = [
        'es' => NumToLettersSpanish::class,
        'en' => NumToLettersEnglish::class,
    ];

    /**
     * Creates an instance of the selected language implementation
     *
     * @param string $language
     * @return NumToLettersContract
     */
    public static function getInstance(string $language = 'es'): NumToLettersContract
    {
        $language = strtolower($language);

        if (!isset(self::$implementations[$language])) {
            throw new \Exception("The language {$language} is not defined", 1);
        }

        return new self::$implementations[$language];
    }
}
