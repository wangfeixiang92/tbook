<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>安娜斯塔尼亚后台</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link rel="stylesheet" href="/view_dist/viewer.css">
      <style>
          h3{text-align: center}
          table{margin-top: 20px}
          th,td{font-size: 3px}
          .red{color: red}
          .green{color:green}
      </style>
  </head>
  <body>
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-1 "></div>
          <div class="col-md-10 ">
              <h3 class="center-block">安娜斯塔尼亚商品管理</h3>
              <table class="table table-condensed table-hover table-bordered ">
                  <head>
                      <th >ID</th>
                      <th >班列购名称</th>
                      <th >图片</th>
                      <th >班列购URL</th>
                      <th >商城实际零售价</th>
                      <th >实际供货价</th>
                      <th >天猫价</th>
                      <th >淘宝价格区间</th>
                      <th >单品盈利</th>
                      <th >推荐指数</th>
                      <th >详情</th>
                      <th >补充供货价</th>
                      <th>问题</th>
                  </head>
                  <tbody>
                 @foreach($list as $key=>$val)
                  <tr>
                      <td >{{$val['id']}}</td>
                      <td >{{$val['good_name']}}</td>
                      <td id="galley"><img style="width:50px;" data-original="{{$val['showimg']}}" src="{{$val['showimg']}}" alt="点击查看"></td>
                      <td ><button class="btn btn-default btn-xs"  style="font-size: 5px" data-toggle="modal" onclick="lookUrl('{{$val['source_url']}}')" data-target="#myModal"  >点击查看</button></td>
                      <td >{{$val['retailprice']}}</td>
                      @if(empty($val['taxsupplyprice']))
                          <td>待补充</td>
                      @else
                          <td >{{$val['taxsupplyprice']}}</td>
                      @endif
                      <td >{{$val['tmprice']}}</td>
                      <td >{{$val['taobao_min']}} - {{$val['taobao_max']}} </td>
                      <td >{{$val['profit']}}</td>
                      <td >{{$val['power']}}星</td>
                      <td ><button class="btn btn-default btn-xs"  style="font-size: 5px" data-toggle="modal" data-target="#myModal2" onclick="lookDeatil({{$val['id']}})" >查看详情</button></td>
                          @if(empty($val['taxsupplyprice']))
                          <td ><button onclick="supplePrice({{$val['id']}})"  class="btn btn-danger btn-xs"  style="font-size: 5px" data-toggle="modal" data-target="#myModal3" >补充供货价</button></td>
                          @else
                          <td ><button onclick="supplePrice({{$val['id']}})" class="btn btn-success btn-xs"  style="font-size: 5px" data-toggle="modal" data-target="#myModal3" >补充供货价</button></td>
                          @endif
                      <td ><button class="btn btn-danger btn-xs"  style="font-size: 5px" data-toggle="modal" data-target="#myModal4" >回答问题</button></td>
                  </tr>
                     @endforeach
                  </tbody>
              </table>
          </div>
          <div class="col-md-1 "><button class="btn btn-danger btn-xs" type="button" style="font-size: 5px">
                  待回答的问题 <span class="badge">4</span>条
              </button></div>
      </div>
  </div>


  <!-- 班列够URL -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h6 class="modal-title" id="myModalLabel">班列购程序有验证，URL必须微信端打开</h6>
              </div>
              <div class="modal-body">

              </div>
          </div>
      </div>
  </div>

  <!-- 查看详情 -->
  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h6 class="modal-title" id="myModalLabe2">详情列表</h6>
              </div>
              <div class="modal-body">

              </div>
          </div>
      </div>
  </div>

  <!-- 补价 -->
  <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h6 class="modal-title" id="myModalLabe3">补充供货价</h6>
              </div>
              <form class="form-horizontal" action="/antas/updatetaxsupplyprice"  method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="gid" id="gid">
              <div class="modal-body">
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
              </div>
                  <input type="submit" class="btn btn-primary btn-lg btn-block">
              </form>
          </div>
      </div>
  </div>




  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
      <script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.bootcss.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="/view_dist/viewer.js"></script>
  </body>
  <script>
      window.addEventListener('DOMContentLoaded', function () {
          var galley = document.getElementById('galley');
          var viewer = new Viewer(galley, {
              url: 'data-original',
              toolbar: {
                  oneToOne: true,
                  prev: function() {
                      viewer.prev(true);
                  },
                  play: true,
                  next: function() {
                      viewer.next(true);
                  },
                  download: function() {
                      const a = document.createElement('a');

                      a.href = viewer.image.src;
                      a.download = viewer.image.alt;
                      document.body.appendChild(a);
                      a.click();
                      document.body.removeChild(a);
                  },
              },
          });
      });
  </script>
  <script>
      //查看班列购的URL
      function lookUrl(url) {
          $('#myModal').find('.modal-body').html(url);
      }

      //更新ID
      function supplePrice(id){
          $('#gid').val(id);
      }

      //查看详情
      function  lookDeatil(id)
      {
          $.ajax({
              type: "GET",
              url: "/antas/detail",
              data: {id:id},
              dataType: "json",
              success: function(data){
                  var html = '<table class="table table-condensed table-hover table-bordered ">' +
                      '<head>' +
                      '<th>选项</th>'+
                      '<th>值</th>'+
                      '<tbody>';
                  var shows = '';
                  var detail ='';
                  for(var i=0;i<data['showimgs'].length;i++){
                      shows += '<img style="width: 100px" data-original="'+data['showimgs'][i]['img']+'" src="'+data['showimgs'][i]['img']+'" alt="点击查看">';
                  }
                  for(var i=0;i<data['detailsimgs'].length;i++){
                      detail += '<img style="width: 100px" data-original="'+data['detailsimgs'][i]['img']+'" src="'+data['detailsimgs'][i]['img']+'" alt="点击查看">';
                  }
                      html +='<tr>'+
                          '<td >商品ID</td>'+
                          '<td >'+data['id']+'</td>'+
                          '</tr><tr>'+
                          '<td >品牌</td>'+
                          '<td >'+data['brand_name']+'</td>'+
                          '</tr><tr>'+
                          '<td >班列购名称</td>'+
                          '<td>'+data['good_name']+'</td>'+
                          '</tr><tr>'+
                          '<td >店铺名称</td>'+
                          '<td >'+data['shop_name']+'</td>'+
                          '</tr><tr>'+
                          '<td >预览图</td>'+
                          '<td >'+shows+'</td>'+
                          '</tr><tr>'+
                          '<td>税费</td>'+
                          '<td >'+data['taxation']+'</td>'+
                          '</tr><tr>'+
                          '<td >税率</td>'+
                          '<td >'+data['taxrate']+'%</td>'+
                          '</tr><tr>'+
                          '<td >零售价</td>'+
                          '<td >'+data['taxprice']+'</td>'+
                          '</tr><tr>'+
                          '<td >含税零售价</td>'+
                          '<td >'+data['retailprice']+'</td>'+
                          '</tr><tr>'+
                          '<td>供货价</td>'+
                          '<td >'+data['supplyprice']+'</td>'+
                          '</tr><tr>'+
                          '<td >含税供货价</td>'+
                          '<td >'+data['taxsupplyprice']+'</td>'+
                          '</tr><tr>'+
                          '<td >实际到手价</td>'+
                          '<td >'+data['taxsupplyprice']+'</td>'+
                          '</tr><tr>'+
                          '<td >实际出售价</td>'+
                          '<td>'+data['realsellingprice']+'</td>'+
                          '</tr><tr>'+
                          '<td >天猫价</td>'+
                          '<td >'+data['tmprice']+'</td>'+
                          '</tr><tr>'+
                          '<td >淘宝价格区间</td>'+
                          '<td>'+data['taobao_min']+'-'+data['taobao_max']+'</td>'+
                          '</tr><tr>'+
                          '<td >销量</td>'+
                          '<td >'+data['salasnum']+'</td>'+
                          '</tr><tr>'+
                          '<td >单品盈利</td>'+
                          '<td >'+data['profit']+'</td>'+
                          '</tr><tr>'+
                          '<td >详情图</td>'+
                          '<td>'+detail+'</td>'+
                          '</tr><tr>'+
                          '<td >班列购商品链接</td>'+
                          '<td >'+data['source_url']+'</td>'+
                          '</tr><tr>'+
                          '<td >店铺URL</td>'+
                          '<td >'+data['my_url']+'</td>'+
                          '</tr><tr>'+
                          '<td >库存</td>'+
                          '<td >'+data['store_num']+'</td>'+
                          '</tr><tr>'+
                          '<td >创建时间</td>'+
                          '<td >'+data['createtime']+'</td>'+
                          '</tr><tr>'+
                          '<td >状态</td>'+
                          '<td >'+data['status']+'</td>'+
                          '</tr><tr>'+
                          '<td >添加预览图</td>'+
                          '<td ><a class="btn btn-default btn-xs" style="font-size: 5px" href="/antas/addshowimg?id='+data['id']+'" target="_blank" >添加预览图</a></td>'+
                          '</tr><tr>'+
                          '<td >添加详情图</td>'+
                          '<td ><a class="btn btn-default btn-xs" style="font-size: 5px"href="/antas/adddetails?id='+data['id']+'" target="_blank" >添加详情</a></td>'+
                          '</tr>';
                  html+= '</tbody></table>';

                  $('#myModal2').find('.modal-body').empty().html(html);
              }
          });
      }
  </script>
</html>
