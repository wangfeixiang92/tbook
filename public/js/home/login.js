/**
 * 登录js方法
 * @type {{init}}
 */
var Login = function() {
  var LoginInit = function(){

    $('.login').on('click',function () {
        var login_item = $('.login_item').val();
        var login_value = $('.login_value').val();
        var password = $('.password').val();
        //判断正确性

        //ajax请求
        $.ajax({
            url:'',
            type:'post',
            data:{
                login_item:login_item,
                login_value:login_value,
                password:password,
            },
            dataType:'json',
            success:function (data) {
                
            }
        });

    });

    //注册





  };

  return {
    init : LoginInit
  }
}();
$(function () {
    Login.init();
});