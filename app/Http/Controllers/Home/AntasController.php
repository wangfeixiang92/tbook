<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\12\27 0027
 * Time: 21:52
 */
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * 安娜斯塔尼亚淘宝店专属
 * 请勿修改这里代码，若有新修改，请通知王飞翔
 * @package App\Http\Controllers\Home
 */
class AntasController extends Controller{
    /**
     * @var CategoryService
     */
    private $category;
    /**
     * @var BookService
     */
    private $book;

    /**
     * IndexController constructor.
     * @param CategoryService $categoryService
     * @param BookService $bookService
     */
    public function __construct()
    {

    }


    /**
     * index
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:首页显示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $status = empty($request->input('staus'))?1:$request->input('status');
        $page =  empty($request->input('page'))?1:$request->input('page');
        $page = $page-1;
        $length = 50;
        $list = DB::table('antas_goods')->where('status',$status)->skip($page*$length)->take($length)->get();
        $list = json_decode($list,true);
        foreach ($list as $key=>$val)
        {
            $id=$val['id'];
            $shows = DB::table('antas_showimgs')->where('gid',$id)->where('status',$status)->select('img')->orderby('sort','desc')->first();
            $list[$key]['showimg'] =empty(get_object_vars($shows))?'':get_object_vars($shows)['img'];
        }

        return view('antas.index')->with(compact('list'));
    }

    //预览详情
    public function detail(Request $request){
        $id = $request->input('id');
        $list = DB::table('antas_goods')->where('status',1)->where('id',$id)->get();
        $list = json_decode($list,true);
        foreach ($list as $key=>$val)
        {
            $id=$val['id'];
            $shows = DB::table('antas_showimgs')->where('gid',$id)->where('status',1)->orderby('sort','desc')->get();
            $details = DB::table('antas_good_details')->where('gid',$id)->where('status',1)->orderby('sort','desc')->get();
            $list[$key]['showimgs'] = json_decode($shows,true);
            $list[$key]['detailsimgs'] = json_decode($details,true);
        }
        return json_encode($list[0]);
    }

    //添加页
    public function add(Request $request){
        return view('antas.add');
    }

    //添加页
    public function addshowimg(Request $request){
        $id=$request->input('id');
        $list = DB::table('antas_goods')->select('good_name')->where('id',$id)->first();
        $list = get_object_vars($list);
        return view('antas.addshowimg')->with(compact('list'));
    }

    //添加页
    public function adddetails(Request $request){
        $id=$request->input('id');
        $list = DB::table('antas_goods')->select('good_name')->where('id',$id)->first();
        $list = get_object_vars($list);
        return view('antas.adddetails')->with(compact('list'));
    }

    //上传图片

    public function uploadImg(Request $request){
        $id=$request->input('id');
        $type = $request->input('type');
        if(empty($_FILES)) die('请提交图片');
        $dir = ($type == 1)?'antas/show/':'antas/details/';
        foreach($_FILES as $val)
        {
            if($val['error'] != 0)continue;
            $new = md5($val['name']).'.'.basename($val['type']);
            if (file_exists("$dir" .$new))
            {
                echo $val['name'].'图片已存在'.'<br>';
            } else {
                if(move_uploaded_file($val["tmp_name"], "$dir" .$new)){
                    $map['createtime'] = date('Y-m-d H:i:s',time());
                    $map['gid'] = $id;
                    $map['img'] = '/'."$dir" .$new;
                    if($type == 1)
                    {
                        $res = DB::table('antas_showimgs')->insert($map);
                    }else{
                        $res = DB::table('antas_good_details')->insert($map);
                    }
                    echo $val['name'].'上传成功'.'<br>';;
                }else{
                    echo $val['name'].'上传失败'.'<br>';;
                }
            }
        }

    }


    //上传商品信息
    public function addAction(Request $request){
        $map=$request->input();
        unset($map['_token']);
        $map['createtime'] = date('Y-m-d H:i:s',time());
        $map['retailprice'] = round($map['taxprice']+$map['taxation'],2);
        $map['profit'] = round($map['realprice']-$map['realsellingprice'],2);
        $res = DB::table('antas_goods')->insert($map);
        if($res){
            echo '成功';exit;
        }
        echo '失败';
    }

    //更新供货价
    public  function updatetaxsupplyprice(Request $request){
        $id=$request->input('gid');
        $supplyprice=$request->input('supplyprice');
        $taxsupplyprice=$request->input('taxsupplyprice');
        $res = DB::table('antas_goods')->select('tmprice')->where('id',$id)->first();
        if(empty($res))die('商品不存在');
        $list = get_object_vars($res);
        $tmprice = $list['tmprice'];
        if($taxsupplyprice > $tmprice)
        {
            //比天猫价格高
            $map['power'] = 0-round(($taxsupplyprice-$tmprice)/10);
        }else{
            $map['power'] = round(($tmprice-$taxsupplyprice)/10);
        }
        $map['taxsupplyprice']=$taxsupplyprice;
        $map['supplyprice']=$supplyprice;
        $map['realprice']=$taxsupplyprice;
        $result = DB::table('antas_goods')->where('id',$id)->update($map);
        return redirect('/antas/index');
    }


}