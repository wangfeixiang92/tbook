<?php

if (file_exists('./install.lock')) {
    echo '
		<html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        </head>
        <body>
        	你已经安装过该系统，如果想重新安装，请先删除站点install目录下的 install.lock 文件，然后再安装。
        </body>
        </html>';
    exit;
}
@set_time_limit(1000);
if (phpversion() <= '5.4.0')
    set_magic_quotes_runtime(0);
if ('5.4.0' > phpversion()){
	header("Content-type:text/html;charset=utf-8");
	exit('您的php版本过低，不能安装本软件，请升级到5.4.0或更高版本再安装，谢谢！');
}

define("TP_SHOP_VERSION", '20170101');
date_default_timezone_set('PRC');
error_reporting(E_ALL & ~E_NOTICE);
header('Content-Type: text/html; charset=UTF-8');
define('SITEDIR', _dir_path(substr(dirname(__FILE__), 0, -8)));
//define('SITEDIR2', substr(SITEDIR,0,-7));
//echo SITEDIR2;
//exit;
//数据库
$sqlFile = 'tpshop.sql';
$configFile = 'config.php';
if (!file_exists(SITEDIR . 'install/' . $sqlFile)) {
    echo '缺少必要的安装文件!';
    exit;
}
$Title = "Tbook安装向导";
$Powered = "Powered by TPshop";
$steps = array(
    '1' => '安装许可协议',
    '2' => '运行环境检测',
    '3' => '安装参数设置',
    '4' => '安装详细过程',
    '5' => '安装完成',
);
$step = isset($_GET['step']) ? $_GET['step'] : 1;

//地址
$scriptName = !empty($_SERVER["REQUEST_URI"]) ? $scriptName = $_SERVER["REQUEST_URI"] : $scriptName = $_SERVER["PHP_SELF"];
$rootpath = @preg_replace("/\/(I|i)nstall\/index\.php(.*)$/", "", $scriptName);
$domain = empty($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
if ((int) $_SERVER['SERVER_PORT'] != 80) {
    $domain .= ":" . $_SERVER['SERVER_PORT'];
}
$domain = $domain . $rootpath;

switch ($step) {

    case '1':
        include_once ("./templates/step1.php");
        exit();

    case '2':

        if (phpversion() < 7.1) {
            die('本系统需要PHP7.1+MYSQL >=5.0环境，当前PHP版本为：' . phpversion());
        }

        $phpv = @ phpversion();
        $os = PHP_OS;
        //$os = php_uname();
        $tmp = function_exists('gd_info') ? gd_info() : array();
        $server = $_SERVER["SERVER_SOFTWARE"];
        $host = (empty($_SERVER["SERVER_ADDR"]) ? $_SERVER["SERVER_HOST"] : $_SERVER["SERVER_ADDR"]);
        $name = $_SERVER["SERVER_NAME"];
        $max_execution_time = ini_get('max_execution_time');
        $allow_reference = (ini_get('allow_call_time_pass_reference') ? '<font color=green>[√]On</font>' : '<font color=red>[×]Off</font>');
        $allow_url_fopen = (ini_get('allow_url_fopen') ? '<font color=green>[√]On</font>' : '<font color=red>[×]Off</font>');
        $safe_mode = (ini_get('safe_mode') ? '<font color=red>[×]On</font>' : '<font color=green>[√]Off</font>');
		
        $err = 0;
        if (empty($tmp['GD Version'])) {
            $gd = '<font color=red>[×]Off</font>';
            $err++;
        } else {
            $gd = '<font color=green>[√]On</font> ' . $tmp['GD Version'];
        }
        if (function_exists('mysqli_connect')) {
            $mysql = '<span class="correct_span">&radic;</span> 已安装';
        } else {
            $mysql = '<span class="correct_span error_span">&radic;</span> 请安装mysqli扩展';
            $err++;
        }
        if (ini_get('file_uploads')) {
            $uploadSize = '<span class="correct_span">&radic;</span> ' . ini_get('upload_max_filesize');
        } else {
            $uploadSize = '<span class="correct_span error_span">&radic;</span>禁止上传';
        }
        if (function_exists('session_start')) {
            $session = '<span class="correct_span">&radic;</span> 支持';
        } else {
            $session = '<span class="correct_span error_span">&radic;</span> 不支持';
            $err++;
        }
        if(function_exists('curl_init')){
        	$curl = '<font color=green>[√]支持</font> ';
        }else{
        	$curl = '<font color=red>[×]不支持</font>';
        	$err++;
        }
        if(function_exists('file_put_contents')){
        	$file_put_contents = '<font color=green>[√]支持</font> ';
        }else{
        	$file_put_contents = '<font color=red>[×]不支持</font>';
        	$err++;
        }
        
        $folder = array(
            'install',
            'public/upload',
        );
        include_once ("./templates/step2.php");
        exit();

    case '3':
		$dbName = strtolower(trim($_POST['dbName']));
		$_POST['dbport'] = $_POST['dbport'] ? $_POST['dbport'] : '3306';
        if ($_GET['testdbpwd']) {
            $dbHost = $_POST['dbHost'];
            $conn = @mysqli_connect($dbHost, $_POST['dbUser'], $_POST['dbPwd'],NULL,$_POST['dbport']);			
            if (mysqli_connect_errno($conn)){				
				die(json_encode(0));                
            } else {
				$result = mysqli_query($conn,"select count(table_name) as c from information_schema.`TABLES` where table_schema='$dbName'");
				$result = $result->fetch_array();
				if($result['c'] > 0)
					exit(json_encode(-1));
				
                exit(json_encode(1));
            }
        }		 		
        include_once ("./templates/step3.php");
        exit();


    case '4':
        if (intval($_GET['install'])) {
            $n = intval($_GET['n']);
            $arr = array();

            $dbHost = trim($_POST['dbhost']);
            $dbPort = $_POST['dbport'] ? $_POST['dbport'] : '3306';
            $dbName = strtolower(trim($_POST['dbname']));            
            $dbUser = trim($_POST['dbuser']);
            $dbPwd = trim($_POST['dbpw']);
            $dbPrefix = empty($_POST['dbprefix']) ? 'laravel_' : trim($_POST['dbprefix']);

            $username = trim($_POST['manager']);
            $password = trim($_POST['manager_pwd']);
            $email	  = trim($_POST['manager_email']);
            
            if (!function_exists('mysqli_connect')) {
                $arr['msg'] = "请安装 mysqli 扩展!";
                echo json_encode($arr);
                exit;
            }			
			
            $conn = @mysqli_connect($dbHost, $dbUser, $dbPwd,NULL,$_POST['dbport']);
            if (mysqli_connect_errno($conn)){
                $arr['msg'] = "连接数据库失败!".mysqli_connect_error($conn);           
                echo json_encode($arr);
                exit;
            }
            mysqli_set_charset($conn, "utf8"); //,character_set_client=binary,sql_mode='';
            $version = mysqli_get_server_info($conn);
            if ($version < 5.5) {
                $arr['msg'] = '数据库版本太低! 必须5.5以上';
                echo json_encode($arr);
                exit;
            }
            
            if (!mysqli_select_db($conn,$dbName)) {
                //创建数据时同时设置编码
                if (!mysqli_query($conn,"CREATE DATABASE IF NOT EXISTS `" . $dbName . "` DEFAULT CHARACTER SET utf8;")) {
                    $arr['msg'] = '数据库 ' . $dbName . ' 不存在，也没权限创建新的数据库！';
                    echo json_encode($arr);
                    exit;
                }
                if ($n==-1) {
                    $arr['n'] = 0;
                    $arr['msg'] = "成功创建数据库:{$dbName}<br>";
                    echo json_encode($arr);
                    exit;
                }
                mysqli_select_db($conn , $dbName);
            }

            //读取数据文件
            $sqldata = file_get_contents(SITEDIR . 'install/' . $sqlFile);
            $sqlFormat = sql_split($sqldata, $dbPrefix);
            //创建写入sql数据库文件到库中 结束

            /**
             * 执行SQL语句
             */
            $counts = count($sqlFormat);

            for ($i = $n; $i < $counts; $i++) {
                $sql = trim($sqlFormat[$i]);

                if (strstr($sql, 'CREATE TABLE')) {
                    preg_match('/CREATE TABLE `([^ ]*)`/', $sql, $matches);
                    mysqli_query($conn,"DROP TABLE IF EXISTS `$matches[1]");
                    $ret = mysqli_query($conn,$sql);
                    if ($ret) {
                        $message = '<li><span class="correct_span">&radic;</span>创建数据表' . $matches[1] . '，完成!<span style="float: right;">'.date('Y-m-d H:i:s').'</span></li> ';
                    } else {
                        $message = '<li><span class="correct_span error_span">&radic;</span>创建数据表' . $matches[1] . '，失败!<span style="float: right;">'.date('Y-m-d H:i:s').'</span></li>';
                    }
                    $i++;
                    $arr = array('n' => $i, 'msg' => $message);
                    echo json_encode($arr);
                    exit;
                } else {
					if(trim($sql) == '')
					   continue;
                    $ret = mysqli_query($conn,$sql);
                    $message = '';
                    $arr = array('n' => $i, 'msg' => $message);
                    //echo json_encode($arr); exit;
                }
            }

            if(!empty($_POST['demo'])){
			// 清空测试数据			
			if($_POST['demo'] != 'demo')
			{				
				$result = mysqli_query($conn,"show tables");      
				$tables=$result->fetch_all(MYSQLI_NUM);//参数MYSQL_ASSOC、MYSQLI_NUM、MYSQLI_BOTH规定产生数组类型
				$bl_table = array('tp_admin','tp_config','tp_region','tp_system_module','tp_admin_role','tp_system_menu','tp_article_cat','tp_wx_user');
				foreach($bl_table as $k => $v)
				{
					$bl_table[$k] = str_replace('tp_',$dbPrefix,$v); 
				}			      
			
				foreach($tables as $key => $val)
				{					
					if(!in_array($val[0], $bl_table))
					{
						mysqli_query($conn,"truncate table ".$val[0]);
					}		
				}   	
				delFile('../public/upload/goods'); // 清空测试图片			
			}
            }
            if ($i == 999999)
                exit;
            //先要保证设置composer 并执行安装composer install
            $ini = ini_get_all();
            $path = $ini['extension_dir']['local_value'];
            $php_path = str_replace('\\', '/', $path);
            $php_path = str_replace(array('/ext/', '/ext'), array('/', '/'), $php_path);
            @exec("composer1",$out);
            if(empty($out)){
//            @exec("php -r \"copy('composer.bat','{$php_path}composer.bat');\"",$out);
//            @exec("php -r \"copy('composer.phar','{$php_path}composer.phar');\"",$out);
//            @exec("composer1",$out);
//                if(!empty($out)){
//                    @exec("composer install",$out);
//                }
            }

            //复制配置文件
//            @exec("php -r \"copy('".SITEDIR.".env.example', '".SITEDIR.".env');\"",$out);
            //读取配置文件，并替换真实配置数据
            $strConfig = file_get_contents(SITEDIR . '.env.example');
            $strConfig = str_replace('DB_HOST=127.0.0.1', 'DB_HOST='.$dbHost, $strConfig);
            $strConfig = str_replace('DB_PORT=3306', 'DB_HOST='.$dbPort, $strConfig);
            $strConfig = str_replace('DB_DATABASE=homestead', 'DB_DATABASE='.$dbName, $strConfig);
            $strConfig = str_replace('DB_USERNAME=homestead', 'DB_USERNAME='.$dbUser, $strConfig);
            $strConfig = str_replace('DB_PASSWORD=secret', 'DB_PASSWORD='.$dbPwd, $strConfig);
            @chmod(SITEDIR . '.env',0777); //数据库配置文件的地址
            @file_put_contents(SITEDIR . '.env', $strConfig); //数据库配置文件的地址
            //执行成app_key
            @exec("php ".SITEDIR."/artisan key:generate",$out);//成功
            $message = '成功写入配置文件<br>安装完成．';
            $arr = array('n' => 999999, 'msg' => $message);
            echo json_encode($arr);
            exit;
        }

        include_once ("./templates/step4.php");
        exit();

    case '5':
    	$ip = get_client_ip();
    	$host = $_SERVER['HTTP_HOST'];
        include_once ("./templates/step5.php");
        @touch('./install.lock');
        exit();
}

function testwrite($d) {
    $tfile = "_test.txt";
    $fp = @fopen($d . "/" . $tfile, "w");
    if (!$fp) {
        return false;
    }
    fclose($fp);
    $rs = @unlink($d . "/" . $tfile);
    if ($rs) {
        return true;
    }
    return false;
}

function sql_execute($sql, $tablepre) {
    $sqls = sql_split($sql, $tablepre);
    if (is_array($sqls)) {
        foreach ($sqls as $sql) {
            if (trim($sql) != '') {
                mysqli_query($sql);
            }
        }
    } else {
        mysqli_query($sqls);
    }
    return true;
}

function sql_split($sql, $tablepre) {

    if ($tablepre != "tp_")
    	$sql = str_replace("tp_", $tablepre, $sql);
          
    $sql = preg_replace("/TYPE=(InnoDB|MyISAM|MEMORY)( DEFAULT CHARSET=[^; ]+)?/", "ENGINE=\\1 DEFAULT CHARSET=utf8", $sql);
    
    $sql = str_replace("\r", "\n", $sql);
    $ret = array();
    $num = 0;
    $queriesarray = explode(";\n", trim($sql));
    unset($sql);
    foreach ($queriesarray as $query) {
        $ret[$num] = '';
        $queries = explode("\n", trim($query));
        $queries = array_filter($queries);
        foreach ($queries as $query) {
            $str1 = substr($query, 0, 1);
            if ($str1 != '#' && $str1 != '-')
                $ret[$num] .= $query;
        }
        $num++;
    }
    return $ret;
}

function _dir_path($path) {
    $path = str_replace('\\', '/', $path);
    if (substr($path, -1) != '/')
        $path = $path . '/';
    return $path;
}

// 获取客户端IP地址
function get_client_ip() {
    static $ip = NULL;
    if ($ip !== NULL)
        return $ip;
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $pos = array_search('unknown', $arr);
        if (false !== $pos)
            unset($arr[$pos]);
        $ip = trim($arr[0]);
    }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    // IP地址合法验证
    $ip = (false !== ip2long($ip)) ? $ip : '0.0.0.0';
    return $ip;
}

function dir_create($path, $mode = 0777) {
    if (is_dir($path))
        return TRUE;
    $ftp_enable = 0;
    $path = dir_path($path);
    $temp = explode('/', $path);
    $cur_dir = '';
    $max = count($temp) - 1;
    for ($i = 0; $i < $max; $i++) {
        $cur_dir .= $temp[$i] . '/';
        if (@is_dir($cur_dir))
            continue;
        @mkdir($cur_dir, 0777, true);
        @chmod($cur_dir, 0777);
    }
    return is_dir($path);
}

function dir_path($path) {
    $path = str_replace('\\', '/', $path);
    if (substr($path, -1) != '/')
        $path = $path . '/';
    return $path;
}

function sp_password($pw, $pre){
	$decor = md5($pre);
	$mi = md5($pw);
	return substr($decor,0,12).$mi.substr($decor,-4,4);
}

function sp_random_string($len = 8) {
	$chars = array(
			"a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
			"l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
			"w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
			"H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
			"S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
			"3", "4", "5", "6", "7", "8", "9"
	);
	$charsLen = count($chars) - 1;
	shuffle($chars);    // 将数组打乱
	$output = "";
	for ($i = 0; $i < $len; $i++) {
		$output .= $chars[mt_rand(0, $charsLen)];
	}
	return $output;
}
// 递归删除文件夹
function delFile($dir,$file_type='') {
	if(is_dir($dir)){
		$files = scandir($dir);
		//打开目录 //列出目录中的所有文件并去掉 . 和 ..
		foreach($files as $filename){
			if($filename!='.' && $filename!='..'){
				if(!is_dir($dir.'/'.$filename)){
					if(empty($file_type)){
						unlink($dir.'/'.$filename);
					}else{
						if(is_array($file_type)){
							//正则匹配指定文件
							if(preg_match($file_type[0],$filename)){
								unlink($dir.'/'.$filename);
							}
						}else{
							//指定包含某些字符串的文件
							if(false!=stristr($filename,$file_type)){
								unlink($dir.'/'.$filename);
							}
						}
					}
				}else{
					delFile($dir.'/'.$filename);
					rmdir($dir.'/'.$filename);
				}
			}
		}
	}else{
		if(file_exists($dir)) unlink($dir);
	}
}
?>