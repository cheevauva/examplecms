<?php

namespace ExampleCMS\Util;

class Arr
{

    public function serializeToPHP($value)
    {
        if (!is_array($value)) {
            return var_export($value, true);
        }

        foreach ($value as $key => $val) {
            if (empty($key) && empty($val)) {
                unset($value[$key]);
            }
        }

        return $this->toPHPArrayString($value);
    }

    public function toPHPArrayString($array, $offset = '')
    {
        $work_offset = $offset . '    ';

        $str = "array(\n";

        foreach ($array as $key => $value) {
            $str .= $work_offset;
            if (is_string($key)) {
                $str .= "'" . str_replace('\'', '\\\'', $key) . "' => ";
            }
            if (is_array($value)) {
                $str .= $this->toPHPArrayString($value, $work_offset);
            } else {
                $str .= var_export($value, true);
            }

            $str .= ",\n";
        }

        $str .= $offset . ')';

        return $str;
    }
}
