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