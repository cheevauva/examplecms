<?php

namespace ExampleCMS\Helper;

class UUID implements \ExampleCMS\Contract\Helper\UUID
{

    /**
     * @return string
     */
    public function guid()
    {
        $guid = '';

        $guid .= sprintf('%04X%04X-', mt_rand(0, 65535), mt_rand(0, 65535));
        $guid .= sprintf('%04X-%04X-', mt_rand(0, 65535), mt_rand(16384, 20479));
        $guid .= sprintf('%04X-%04X', mt_rand(32768, 49151), mt_rand(0, 65535));
        $guid .= sprintf('%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535));

        return $guid;
    }

}
