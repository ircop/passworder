<?php
/**
 * Created by PhpStorm.
 * User: wingman
 * Date: 12.11.2015
 * Time: 16:36
 */

namespace Ircop\Passworder;


class Passworder
{
    private $randCase = true;

    public function gen()
    {
        $word = $this->getWord();
        $str = $this->getString();

        return $this->getResult($str, $word);
    }

    private function getResult( $string, $word )
    {
        $delimeter = $this->getDelimeter();
        return $string.$delimeter.$word;
    }

    private function randomize( $string )
    {
        $string = $this->ucase($string);
        $string = $this->numbers($string);

        return $string;
    }

    private function numbers( $string ) {
        if( \Config::get('passworder.add_numbers') !== true )
            return $string;
        $chance = \Config::get('passworder.number_chance');
        if( !is_numeric($chance) )
            return $string;

        // commented, because not so friendly
        //# before
        //if( mt_rand(0, 10) < $chance ) {
        //    $string = mt_rand(0,9).$string;
        //}

        # after
        if( mt_rand(0, 10) < $chance ) {
            $string = $string.mt_rand(0,9);
        }

        return $string;
    }
    private function ucase( $string )
    {
        if( \Config::get('passworder.random_uppercase') !== true )
            return $string;
        $chance = \Config::get('passworder.uppercase_chance');
        if( !is_numeric($chance) )
            return $string;

        $result = '';
        for( $i=0; $i<strlen($string); $i++ ) {
            if( mt_rand(0,10) < $chance )
                $result .= mb_strtoupper($string[$i]);
            else
                $result .= $string[$i];
        }

        return $result;
    }

    private function getDelimeter()
    {
        $delimeters = \Config::get('passworder.delimeters');
        return substr($delimeters, mt_rand(0, strlen($delimeters) - 1), 1 );
    }

    /**
     * return random word from config array
     * @return string
     */
    private function getWord()
    {
        $words = \Config::get('passworder.words');
        $word = $words[ mt_rand(0, ( count($words)-1 ) ) ];
        return $this->randomize($word);
    }

    /**
     * return random well-readable string
     *
     * @return string
     */
    private function getString()
    {
        $consonants = 'bcdgkmnprst';
        $vowels = 'aeiou';
        $len = 6;

        $c = $v = [];
        for( $x = 0; $x < $len; $x++ ) {
            $c[$x] = substr( $consonants, mt_rand(0, strlen($consonants) - 1 ), 1 );
            $v[$x] = substr( $vowels, mt_rand(0, strlen($vowels) - 1 ), 1 );
        }

        $str = $c[0] . $v[0] . $c[2] . $c[1] . $v[1];
        return $this->randomize($str);
    }
}
