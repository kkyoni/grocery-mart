<?php

namespace App\Helpers;

class Helper
{

    public static function ORM_to_string($object)
    {
        $query = $object->toSql();
        $bindings = $object->getBindings();
        foreach ($bindings as $key => $binding) {
            if (!is_numeric($binding)) {
                $binding = "'" . $binding . "'";
            }
            $regex = is_numeric($key) ? " / \?(?=(?:[^'\\\']*'[^'\\\']*')*[^'\\\']*$)/" : "/:{$key}(?=(?:[^'\\\']*'[^'\\\']*')*[^'\\\']*$)/";
            $query = preg_replace($regex, $binding, $query, 1);
        }
        return $query;
    }

    public static function checkDiscount($total, $discount)
    {

        $percent =  $total * $discount / 100;
        $discount = $total - number_format((float)$percent, 2, '.', '');
        $temp = array(
            'discount' => number_format((float)$discount, 2, '.', ''),
            'promototal' => number_format((float)$percent, 2, '.', ''),
        );
        return $temp;
    }
}
