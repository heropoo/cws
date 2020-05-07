<?php
/**
 * Date: 2020/5/6
 * Time: 11:25 上午
 */

namespace Moon\CWS;


class Slicer
{
    /** @var Dict[] */
    protected $usedDict = [];

    protected $breakers = [
        ',', '.', '/', '?', "'", '"', ':', ';', '[', ']', '{', '}', '|', '\\', '+', '=', '-', '_', '(', ')', ''
    ];

    public function useDict(Dict $dict)
    {
        array_push($this->usedDict, $dict);
    }

    /**
     * @param string $text
     * @return array
     */
    public function getWords($text)
    {
        $length = mb_strlen($text);
        $str_arr = [];
        $dst = [];
        $str_arr = mb_str_split($text);
        $dict_words = $this->getUsedDictWords();
        //var_dump($dict_words);exit;

        $continue = 0;

        foreach ($str_arr as $key => $character) {
            //$dst[] = $this->findInDict($key, $str_arr, $dict_words);
            echo "$key => $character\n";

            if (isset($continue) && $continue > 0) {
                $continue--;
                continue;
            }

            $dst[] = $this->findInDict($key, $str_arr, $dict_words, $continue);
        }
        return $dst;
    }

    protected function findInDict($key, $str_arr, $dict_words, &$continue, $word = '')
    {
        $word .= $str_arr[$key];
        if (key_exists($word, $dict_words)) {
            echo "$word in dict\n";
            $next = $key + 1;
            if (isset($str_arr[$next]) && key_exists($word . $str_arr[$next], $dict_words)) {
                echo $word . $str_arr[$next] . " in dict 2\n";
                $word .= $str_arr[$next];
                $continue++;
            }
        }
        return $word;
    }

    protected function getUsedDictWords()
    {
        $words = [];
        foreach ($this->usedDict as $dict) {
            $dict_words = $dict->getWords();
            $words = array_merge($words, $dict_words);
        }
        return $words;
    }
}