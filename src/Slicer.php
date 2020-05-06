<?php
/**
 * Date: 2020/5/6
 * Time: 11:25 上午
 */

namespace Moon\CWS;


class Slicer
{
    protected $usedDict = [];

    public function useDict(Dict $dict)
    {
        array_push($this->usedDict, $dict);
    }
}