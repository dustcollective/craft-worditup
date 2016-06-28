<?php
namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class WordItUpTwigExtension extends \Twig_Extension
{
    private $digitToWord = array(
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thireen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen'
    );

    private $dobuleToWord = [
        2 => 'twenty',
        3 => 'thirty',
        4 => 'fourty',
        5 => 'fifty',
        6 => 'sixty',
        7 => 'seventy',
        8 => 'eighty'
    ];

    public function getName()
    {
        return 'WordItUp';
    }

    public function getFilters()
    {
        return array(
            'wordItUp' => new Twig_Filter_Method($this, 'wordItUp'),
        );
    }

    public function wordItUp($number)
    {
        if($number < 20) {
            return $this->digitToWord[$number];
        } else {
            $split = str_split(intval($number));
            if(count($split) > 2) {
                return $number;
            } else {
                return $this->dobuleToWord[$split[0]] . $this->digitToWord[1];
            }
        }
    }
}
