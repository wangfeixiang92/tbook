function loginhtml() {
    var html = '<div class="lg_dialog_mask remove" style="display: block;"></div>';
    html += '<div class="lg_wrap_login curr remove">';
    html += '<div class="lg_login">';
    html += '<p class="lg_wrap_colse"><a href="javascript:void(0);" class="close"><img src="/images/web/lg_close.jpg" width="25"/></a></p>';
    html += '<p class="lg_wrap_logo"><img src="/images/web/logo.png"></p>';
    html += '<p class="msg" style="color: red"></p>';
    html += '<p class="lg_wrap_text"><input type="text" name="mobile" placeholder="请输入手机号码"></p>';
    html += '<p class="lg_wrap_text"><input type="password" name="password" placeholder="请输入密码"></p>';
    html += '<p class="lg_wrap_lz"><a class="blue fl j_wj_btn" href="/forgetpwd.html?ReturnUrl='+window.location.href+'">忘记密码</a><a class="blue fr j_login_btn" href="/register.html?ReturnUrl='+window.location.href+'">注册账号</a></p>';
    html += '<p class="lg_wrap_btn"><input type="button" class="but_login_submit" value="登&#12288;录"></p>';
    html += '<p class="lg_wrap_dsf"><a class="lg_wrap_sina" href="/login/wxlogin?ReturnUrl='+window.location.href+'" target="_blank"></a><a class="lg_wrap_qq" href="/login/qqlogin?ReturnUrl='+window.location.href+'" target="_blank"></a></p>';
    html += '</div>';
    html += '</div>';
    $('body').append(html);
}