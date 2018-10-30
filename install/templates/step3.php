<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title><?php echo $Title; ?> - <?php echo $Powered; ?></title>
<link rel="stylesheet" href="./css/install.css?v=9.0" />
</head>
<body>
<div class="wrap">
  <?php require './templates/header.php';?>
  <section class="section">
    <div class="step">
      <ul>
        <li class="on"><em>1</em>检测环境</li>
        <li class="current"><em>2</em>创建数据</li>
        <li><em>3</em>完成安装</li>
      </ul>
    </div>
    <form id="J_install_form" action="index.php?step=4" method="post">
      <input type="hidden" name="force" value="0" />
      <div class="server">
        <table width="100%">
          <tr>
            <td class="td1" width="100">数据库信息</td>
            <td class="td1" width="200">&nbsp;</td>
            <td class="td1">&nbsp;</td>
          </tr>
		  <tr>
            <td class="tar">数据库服务器：</td>
            <td><input type="text" name="dbhost" id="dbhost" value="localhost" class="input"></td>
            <td><div id="J_install_tip_dbhost"><span class="gray">数据库服务器地址，一般为localhost</span></div></td>
          </tr>
		  <tr>
            <td class="tar">数据库端口：</td>
            <td><input type="text" name="dbport" id="dbport" value="3306" class="input"></td>
            <td><div id="J_install_tip_dbport"><span class="gray">数据库服务器端口，一般为3306</span></div></td>
          </tr>
          <tr>
            <td class="tar">数据库用户名：</td>
            <td><input type="text" name="dbuser" id="dbuser" value="root" class="input"></td>
            <td><div id="J_install_tip_dbuser"></div></td>
          </tr>
          <tr>
            <td class="tar">数据库密码：</td>
            <td><input type="password" name="dbpw" id="dbpw" value="" class="input" autoComplete="off" onBlur="TestDbPwd(0)"></td>
            <td><div id="J_install_tip_dbpw"></div></td>
          </tr>
          <tr>
            <td class="tar">数据库名：</td>
            <td><input type="text" name="dbname" id="dbname" value="tbook" class="input" onBlur="TestDbPwd(0)"></td>
            <td><div id="J_install_tip_dbname"></div></td>
          </tr>
          <tr>
            <td class="tar">数据库表前缀：</td>
            <td><input type="text" name="dbprefix" id="dbprefix" value="laravel_" class="input" ></td>
            <td><div id="J_install_tip_dbprefix"><span class="gray">建议使用默认，同一数据库安装多个时需修改</span></div></td>
          </tr>
<!--          <tr>-->
<!--          	<td class="tar">演示数据：</td>-->
<!--          	<td colspan="2"><input style="width:18px;height:18px;" type="checkbox" id="demo" name="demo" value="demo" checked></td>-->
<!--          </tr>-->
        </table>
        <div id="J_response_tips" style="display:none;"></div>
      </div>
      <div class="bottom tac"> <a href="./index.php?step=2" class="btn">上一步</a>
        <button type="button" class="btn btn_submit J_install_btn">创建数据</button>
      </div>
    </form>
  </section>
  <div  style="width:0;height:0;overflow:hidden;"> <img src="./images/install/pop_loading.gif"> </div>
  <script src="./js/jquery.js?v=9.0"></script> 
  <script src="./js/validate.js?v=9.0"></script> 
  <script src="./js/ajaxForm.js?v=9.0"></script> 
  <script>
   
  function TestDbPwd(connect_db)
    {
        var dbHost = $('#dbhost').val();
        var dbUser = $('#dbuser').val();
        var dbPwd = $('#dbpw').val();
        var dbName = $('#dbname').val();
        var dbport = $('#dbport').val();
		var demo  =  $('#demo').val();
        data={'dbHost':dbHost,'dbUser':dbUser,'dbPwd':dbPwd,'dbName':dbName,'dbport':dbport,'demo':demo};
        var url =  "<?php echo $_SERVER['PHP_SELF']; ?>?step=3&testdbpwd=1";
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType:'JSON',
            beforeSend:function(){				 
            },
            success: function(msg){			
                if(msg == 1){
                     
					if(connect_db == 1)
					{
						$("#J_install_form").submit(); // ajax 验证通过后再提交表单
					}		
					$('#J_install_tip_dbpw').html('');
					$('#J_install_tip_dbname').html('');							
                }
				else if(msg == -1)
				{				    
                    $('#J_install_tip_dbname').html('<span for="dbname" generated="true" class="tips_error" style="">你的不是空数据库, 请更换一个数据库名字</span>');
				}
				else{
				    $('#dbpw').val("");
                    $('#J_install_tip_dbpw').html('<span for="dbname" generated="true" class="tips_error" style="">数据库链接配置失败</span>');
                }
            },
            complete:function(){
            },
            error:function(){
                $('#J_install_tip_dbpw').html('<span for="dbname" generated="true" class="tips_error" style="">数据库链接配置失败</span>');		
				$('#dbpw').val("");
            }
        });
    }


</script> 
</div>
<?php require './templates/footer.php';?>
</body>
</html>