<?php

namespace App\Helpers;
use App\Models\LogActivity;
use Request;
class Helper
{

    public static function addToLog($subject,$user_id,$status)
    {
        $log = [];
        $log['subject'] = $subject;
        $log['url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
        $log['method'] = $_SERVER['REQUEST_METHOD'];
        $log['ip'] = $_SERVER['REMOTE_ADDR'];
        $log['agent'] = $_SERVER["HTTP_USER_AGENT"];
        $log['status'] = $status;
        $log['user_id'] = $user_id ? $user_id : 1;
        LogActivity::create($log);
    }



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
