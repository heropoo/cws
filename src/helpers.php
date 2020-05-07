<?php
/**
 * Date: 2020/5/7
 * Time: 4:10 下午
 */

if (!function_exists('mb_str_split')) {
    function mb_str_split($string, $length = 1)
    {
        $tmp = preg_split('~~u', $string, -1, PREG_SPLIT_NO_EMPTY);
        if ($length > 1) {
            $chunks = array_chunk($tmp, $length);
            foreach ($chunks as $i => $chunk) {
                $chunks[$i] = join('', (array)$chunk);
            }
            $tmp = $chunks;
        }
        return $tmp;
    }
}