<?php
/**
 * Date: 2020/5/6
 * Time: 11:23 上午
 */

namespace Moon\CWS;

class Dict implements \JsonSerializable
{
    protected $words = [];

    /**
     * Add a word to the Dict
     * @param string $word
     * @param string $type
     * @return static
     */
    public function add($word, $type = null)
    {
        $type = isset($type) ? $type : 'N';
        $this->words[$word] = [$word, $type];
        return $this;
    }

    public function export($filename)
    {
        return file_put_contents($filename, json_encode(array_values($this->words), JSON_UNESCAPED_UNICODE));
    }

    public function import($filename)
    {
        $data = json_decode(file_get_contents($filename), true);
        foreach ($data as $item) {
            $type = isset($item[1]) ? $item[1] : 'N';
            $this->add($item[0], $type);
        }
    }

    public function jsonSerialize()
    {
        return $this->words;
    }
}