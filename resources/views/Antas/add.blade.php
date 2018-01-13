<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>安娜斯塔尼亚后台</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style>
        h3{text-align: center}
        form{margin-top: 20px}
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1 "></div>
        <div class="col-md-10 ">
            <h3 class="center-block">安娜斯塔尼亚商品上传管理</h3>
            <form class="form-horizontal" action="/antas/addAction"  method="post">
                {{ csrf_field() }}
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">商品名</span>
                            <input type="text" class="form-control" name="good_name" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">店铺商品名</span>
                            <input type="text" class="form-control" name="shop_name" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">品牌名</span>
                            <input type="text" class="form-control" name="brand_name" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">规格</span>
                            <input type="text" class="form-control" name="style" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">库存</span>
                            <input type="text" class="form-control" name="store_num" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">税费</span>
                            <input type="text" class="form-control" name="taxation" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">税率</span>
                            <input type="text" class="form-control" name="taxrate" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">店铺URL</span>
                            <input type="text" class="form-control" name="my_url" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">班列管URL</span>
                            <input type="text" class="form-control" name="source_url" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">零售价</span>
                            <input type="text" class="form-control" name="taxprice" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">含税零售价</span>
                            <input type="text" class="form-control" name="retailprice" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">供货价</span>
                            <input type="text" class="form-control" name="supplyprice" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">含税供货价</span>
                            <input type="text" class="form-control" name="taxsupplyprice" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">实际到手价</span>
                            <input type="text" class="form-control" name="realprice" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>  <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">实际出售价</span>
                            <input type="text" class="form-control" name="realsellingprice" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">天猫价</span>
                            <input type="text" class="form-control" name="tmprice" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">淘宝最低价</span>
                            <input type="text" class="form-control" name="taobao_min" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">淘宝最高价</span>
                            <input type="text" class="form-control" name="taobao_max" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">天猫链接</span>
                            <input type="text" class="form-control" name="tm_url" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">淘宝搜索链接</span>
                            <input type="text" class="form-control" name="taobao_url" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-lg btn-block">
            </form>
        </div>
        <div class="col-md-1 "></div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>