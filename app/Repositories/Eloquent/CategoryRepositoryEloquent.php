<?php
namespace App\Repositories\Eloquent;
use App\Models\BookCategory;
use App\Repositories\Contracts\CategoryRepository;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BookCategory::class;
    }

    public function getCategoryList(array $where,$page=1,$size=10,$order_by='id'){
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
