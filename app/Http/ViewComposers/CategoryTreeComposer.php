<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/11/29
 * Time: 11:32 AM
 */
namespace App\Http\ViewComposers;

use App\Services\CategoryService;
use Illuminate\View\View;

class CategoryTreeComposer
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function compose(View $view)
    {
        $view->with('categoryTree',$this->categoryService->getCategoryTree());
    }

}