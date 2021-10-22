<?php

class Phrase
{
    public $currentPhrase;
    public $selected =[];
    public $phrases = [
        'crypt'=>"Where mummys stay",
        'zombie'=> "Also known as the undead",
        'khaki'=> "jake from state farm wears these",
        'waltz'=>"A ballroom dance",
        'Blizzard'=>"snowstorm",
        'Banjo'=>"A country guitar",
        'Kayak'=>"Used for traveling rivers",
        'flapjack'=>"pancake",
        'Matrix'=> "Neo"
    ];

    public function __construct($phrase = null, $selected = null)
    {
        if (!empty($phrase)) {
            $this->currentPhrase = $phrase;
        } else {
            $randIndex = array_rand($this->phrases);
            $this->currentPhrase = $this->phrases[$randIndex];
            $temp = $this->currentPhrase;
            $key = array_search($temp, $this->phrases);
            $this->new = $temp;
            $this->currentPhrase = $key;
        }
        if (!empty($selected)) {
            $this->selected = $selected;
        }
    }

    public function addPhraseToDisplay()
    {
        $characters = str_split(strtolower($this->currentPhrase));
        $phrase = '';
        foreach ($characters as $character) {
            if (in_array($character, $this->selected)) {
                $phrase .= "<li class='show'>$character</li>";
            } elseif (ctype_space($character)) {
                $phrase .= "<li class='space'>$character</li>";
            } elseif (!ctype_alpha($character)) {
                $phrase .= "<li class='hide'>$character</li>";
            } else {
                $phrase .= "<li class='hide letter'>$character</li>";
            }
        }
        return $phrase;
    }

    public function getLetterArray()
    {
        return array_unique(str_split(str_replace(' ', '', strtolower($this->currentPhrase))));
    }

    public function checkLetter($letter)
    {

        return in_array($letter, $this->getLetterArray());
    }

    public function numberLost()
    {
        $diff = array_diff($this->selected, $this->getLetterArray());
        return count($diff);
    }
}
