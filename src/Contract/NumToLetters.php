<?php

namespace VerumConsilium\NumToLetters\Contract;

abstract class NumToLetters
{
    abstract protected function and(): string;

    abstract protected function zero(): string;

    abstract protected function one(): string;

    abstract protected function units(): array;

    abstract protected function tens(): array;

    abstract protected function oneHundred(): string;

    abstract protected function hundreds(): array;

    abstract protected function oneThousand(): string;

    abstract protected function thousands(): string;

    abstract protected function oneMillion(): string;

    abstract protected function millions(): string;

    /**
     * Converts the number to letters
     *
     * @return string
     */
    public function convert(float $number, string $currency = '', $forceDecimals = false): string
    {
        $converted = '';
        $decimals = $number - floor($number);
        $decimals = (string)  round($decimals * 100, 2);
        $fraction = sprintf('%02d', $decimals);

        if (($number < 0) || ($number > 999999999)) {
            return 'Error converting the number';
        }

        $div_decimales = explode('.', $number);

        if (count($div_decimales) > 1) {
            $number = $div_decimales[0];
            $decNumberStr = (string)$div_decimales[1];
            if (strlen($decNumberStr) == 2) {
                $decNumberStrFill = str_pad($decNumberStr, 9, '0', STR_PAD_LEFT);
                $decCientos = substr($decNumberStrFill, 6);
                $decimals = $this->convertGroup($decCientos);
            }
        } elseif (count($div_decimales) == 1 && $forceDecimals) {
            $decimals = "{$this->zero()} ";
        }

        $numberStr = (string)$number;
        $numberStrFill = str_pad($numberStr, 9, '0', STR_PAD_LEFT);
        $millones = substr($numberStrFill, 0, 3);
        $miles = substr($numberStrFill, 3, 3);
        $cientos = substr($numberStrFill, 6);

        if (intval($millones) > 0) {
            if ($millones == '001') {
                $converted .= "{$this->oneMillion()} ";
            } elseif (intval($millones) > 0) {
                $converted .= sprintf('%s%s ', $this->convertGroup($millones), $this->millions());
            }
        }

        if (intval($miles) > 0) {
            if ($miles == '001') {
                $converted .= "{$this->oneThousand()} ";
            } elseif (intval($miles) > 0) {
                $converted .= sprintf('%s%s ', $this->convertGroup($miles), $this->thousands());
            }
        }

        if (intval($cientos) > 0) {
            if ($cientos == '001') {
                $converted .= "{$this->one()} ";
            } elseif (intval($cientos) > 0) {
                $converted .= sprintf('%s ', $this->convertGroup($cientos));
            }
        }

        $valor_convertido = $converted . "$fraction/100 " . strtoupper($currency);

        return trim($valor_convertido);
    }

    protected function convertGroup($n): string
    {
        $output = '';

        if ($n == '100') {
            $output = "{$this->oneHundred()} ";
        } elseif ($n[0] !== '0') {
            $output = $this->hundreds()[$n[0] - 1];
        }

        $k = intval(substr($n, 1));

        if ($k <= 20) {
            $output .= $this->units()[$k];
        } else {
            if (($k > 30) && ($n[2] !== '0')) {
                $output .= sprintf('%s%s %s', $this->tens()[intval($n[1]) - 2], $this->and(), $this->units()[intval($n[2])]);
            } else {
                $output .= sprintf('%s%s', $this->tens()[intval($n[1]) - 2], $this->units()[intval($n[2])]);
            }
        }

        return $output;
    }
}
