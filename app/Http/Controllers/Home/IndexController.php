<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\12\27 0027
 * Time: 21:52
 */
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Home\BookService;
use App\Services\Home\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class IndexController
 * @package App\Http\Controllers\Home
 */
class IndexController extends Controller{
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
    public function __construct(CategoryService $categoryService,BookService $bookService)
    {
        $this->category = $categoryService;
        $this->book = $bookService;
    }

    /**
     * index
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:首页显示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        //获取分类
        $category = $this->category->getCategoryList(array(
            'is_show'=>'Y',
        ),1,8);
        $book = array();
        //获取内容，todo 此方法需待改进
        foreach ($category as $key=>$item){
            $book[$key] = $this->book->getBookList(array(
                'is_show'=>'Y',
                'category_id'=>$item['id'],
            ),1,8);
        }

        return view('home.index')->with(compact('category','book'));
    }

    //登录
    public function login(Request $request){
        try{
            $result = DB::table('tbook_user')
                ->whereRaw('username= ? and pwd = ?',[$request->username,md5($request->password)])
                ->first();
            if($result){
                if($result->status <= 0){
                    return response()->json(array(
                        'status' => 0,
                        'msg' => '账号被禁用或者删除！',
                    ));
                }
                $request->session()->put('uid', $result->uid);
                return response()->json(array(
                    'status' => 1,
                    'msg' => 'ok',
                ));
            }
        }catch (\Exception $e){
            throw $e;
        }
    }

    public function register(Request $request){
        try{

        }catch (\Exception $e){
            throw $e;
        }
    }

    //首页2

    public function index2(){
        return view('home.index2');
    }

    public function index4(){
        return view('home.index4');
    }
}