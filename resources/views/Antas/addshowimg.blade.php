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
            <h3 class="center-block">安娜斯塔尼亚商品展示图上传管理</h3>
            <form class="form-horizontal" action="/antas/uploadImg?id={{$_GET['id']}}&type=1"  method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">商品名</span>
                            <input type="text" class="form-control" name="good_name" value="{{$list['good_name']}}" disabled id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                        </div>
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">展示图</span>
                            <input type="file" class="form-control" name="img1" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                            <input type="file" class="form-control" name="img2" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                            <input type="file" class="form-control" name="img3" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                            <input type="file" class="form-control" name="img4" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
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