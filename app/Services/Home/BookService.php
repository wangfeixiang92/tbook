<?php
namespace App\Services\Home;
use App\Repositories\Eloquent\BookRepositoryEloquent;
use App\Services\Home\BaseService;

/**
 * Class UserService
 * @package App\Services\Home
 */
class BookService extends BaseService
{
    /**
     * @var BookRepositoryEloquent
     */
	private $book;

    /**
     * BookService constructor.
     * @param BookRepositoryEloquent $book
     */
	public function __construct(BookRepositoryEloquent $book)
	{
		$this->book =  $book;
	}

    /**
     * getBookList
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:获取book内容列表
     * @param $where
     * @param $page
     * @param $size
     * @param $orderby
     * @return array|null
     */
    public function getBookList($where,$page,$size,$orderby){
        return $this->book->getBookList($where,$page,$size,$orderby);
    }



}