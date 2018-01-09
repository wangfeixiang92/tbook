<?php
namespace App\Services\Home;
use App\Repositories\Eloquent\CategoryRepositoryEloquent;
use App\Services\Home\BaseService;

/**
 * Class UserService
 * @package App\Services\Home
 */
class CategoryService extends BaseService
{
    /**
     * @var CategoryRepositoryEloquent
     */
	private $category;

    /**
     * CategoryService constructor.
     * @param CategoryRepositoryEloquent $category
     */
	public function __construct(CategoryRepositoryEloquent $category)
	{
		$this->category =  $category;
	}

    /**
     * getCategoryList
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:获取分类列表
     * @param $where
     * @param $page
     * @param $size
     * @param $oederby
     * @return array|null
     */
    public function getCategoryList($where,$page,$size,$oederby){
	    return $this->category->getCategoryList($where,$page,$size,$oederby);
    }

    /**
     * getCategoryInfo
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:
     * @param $where
     * @return array|null
     */
    public function getCategoryInfo($where){
        return $this->category->getCategoryBywhere($where);
    }

    /**
     * getChildCategory
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:获取子分类
     * @param $cate_id
     * @return array|null
     */
    public function getChildCategory($cate_id){
        return $this->category->getChildrenCategory($cate_id);
    }



}