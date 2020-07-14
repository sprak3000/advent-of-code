<?php

namespace adventofcode\Year2015;

class AdventCoin
{
    /**
     * Returns the lowest possible integer where the secret key concatenated with that integer results in an MD5 hash
     * beginning with five zeroes.
     *
     * @param string $secretKey
     * @return string
     */
    public function mine(string $secretKey, int $leadingZeroAmount = 5): int
    {
        for ($i = 1;; $i++) {
            $hash = md5($secretKey . strval($i));
            if (preg_match('/^0{' . $leadingZeroAmount . '}.*/', $hash) === 1) {
                return $i;
            }
        }
    }
}
