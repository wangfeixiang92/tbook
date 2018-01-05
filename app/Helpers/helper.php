<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\12\26 0026
 * Time: 23:24
 */

if (!function_exists('echoJs'))
{
    /**
     * echoJs
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:向客户端发送一段Javascript消息
     * @param $message
     */
    function echoJs($message)
    {
        echo <<<EOF
    <script type='text/javascript'>
    {$message}
    </script>
EOF;
    }
}
if (!function_exists('dieJs')) {
    /**
     * dieJs
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:向客户端发送一段Js之后终止
     * @param $message
     */
    function dieJs($message)
    {
        echoJs($message);
        die;
    }
}
if (!function_exists('errorAlert')) {
    /**
     * errorAlert
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:在客户端alert一条消息之后并且终止
     * @param $message
     */
    function errorAlert($message)
    {
        echoJs("alert('{$message}');");
        die;
    }
}
if (!function_exists('getRandomString')) {
    /**
     * getRandomString
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:随机字符
     * @param $possibleChars
     * @param int $length
     * @return string
     */
    function getRandomString($possibleChars, $length = 4)
    {
        $charNum = strlen($possibleChars) - 1;
        $ret = '';
        for ($i = 0; $i < $length; ++$i) {
            $ret .= $possibleChars[mt_rand(0, $charNum)];
        }
        return $ret;
    }
}
if (!function_exists('isEmail')) {
    /**
     * isEmail
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:
     * @param $email
     * @return int
     */
    function isEmail($email)
    {
        return preg_match('/^[a-z0-9.\-_]{2,64}@[a-z0-9]{1,32}(\.[a-z0-9]{2,5})+$/i', $email);
    }
}
if (!function_exists('isMobile')) {
    /**
     * isMobile
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:
     * @param $mobile
     * @return int
     */
    function isMobile($mobile)
    {
        return preg_match("/^1[34578][0-9]{9}$/", $mobile);
    }
}
if (!function_exists('isPhone')) {
    /**
     * isPhone
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:
     * @param $string
     * @return bool
     */
    function isPhone($string)
    {
        if (preg_match('/^0\d{2,3}-\d{7,8}$/', $string) || preg_match('/^0\d{2,3}-\d{7,8}-\d{1,6}$/', $string)) {
            return true;
        }
        return false;
    }
}