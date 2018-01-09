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
class BookController extends Controller{
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


        return view('home.book');
    }

    /**
     * js
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:js模块
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function js(Request $request){
        //js
        $cate  = $this->category->getCategoryInfo(array('short_name'=>'js'));
        $child_cate = $this->category->getChildCategory($cate['id']);
        $page = $request->get('page',1);
        $cate_id = $request->get('cate_id');
        $orderby['browse_num'] = $request->get('browse_num');
        $orderby['collect_num'] = $request->get('collect_num');
        $orderby['favorite_num'] = $request->get('favorite_num');
        $pageSize = $request->get('pageSize',10);
        $where['pcategory_id'] = $cate['id'];
        if(!empty($cate_id)){
            $where['category_id'] = $cate_id;
        }
        //默认排序
        $orderby = 'id';
        if($orderby['browse_num']){
            $orderby = 'browse_num';
        }
        if($orderby['collect_num']){
            $orderby = 'collect_num';
        }
        if($orderby['favorite_num']){
            $orderby = 'favorite_num';
        }
        $js_count = $this->book->getBookCount($where);
        $js_list = $this->book->getBookList($where,$page,$pageSize,$orderby);

        return view('home.book')->with(compact('child_cate','js_count','js_list'));
    }
}