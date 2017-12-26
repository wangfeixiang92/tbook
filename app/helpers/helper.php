<?php

if(!function_exists('getRandomString')){
    //生成随机码
    function getRandomString($possibleChars, $length = 4)
    {
        $charNum    = strlen($possibleChars) - 1;
        $ret        = '';
        for ($i = 0; $i < $length; ++ $i)
        {
            $ret    .= $possibleChars[mt_rand(0, $charNum)];
        }
        return $ret;
    }
}

if(!function_exists('echoJs')){
    /**
     * 向客户端发送一段Javascript消息
     *
     * @param string $message
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


if(!function_exists('echoJs')){
    /**
     * 向客户端发送一段Js之后终止
     *
     * @param string $message
     */
    function dieJs($message)
    {
        echoJs($message);
        die;
    }
}

if(!function_exists('echoJs')){
    /**
     * 在客户端alert一条消息之后并且终止
     *
     * @param string $message
     */
    function errorAlert($message)
    {
        echoJs("alert('{$message}');");
        die;
    }
}