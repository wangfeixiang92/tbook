<?php
namespace App\Repositories\Eloquent;
use App\Models\BookContent;
use App\Repositories\Contracts\BookRepository;
use Prettus\Repository\Eloquent\BaseRepository;


/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class BookRepositoryEloquent extends BaseRepository implements BookRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BookContent::class;
    }

    /**
     * getBookList
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:获取book列表
     * @param array $where
     * @param int $page
     * @param int $size
     * @return array|null
     */
    public function getBookList(array $where,$page=1,$size=10,$order_by='id'){
        $book = $this->model;
        if(empty($where)){
            return null;
        }
        if(!is_array($where)){
            return null;
        }

        foreach ($where as $key=>$item){
            if (is_array($item)) {
                list($key, $condition, $val) = $item;
                $book = $this->model->where($key, $condition, $val);
            } else {
                $book = $this->model->where($key, '=', $item);
            }
        }
        $book->orderBy($order_by,'desc')->forPage($page,$size);
        return $book->get()->toArray();
    }
    
}
