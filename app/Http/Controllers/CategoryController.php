<?php

namespace App\Http\Controllers;

use App\Events\MessagePosted;
use App\Category;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 *
 * @category Auth
 * @package  App\Http\Controllers
 * @author   Petros Diveris <petros@diveris.org>
 * @license  Apache 2.0
 * @link     https://www.diveris.org
 */
class CategoryController extends Controller
{
    
    /**
     * Get all categories and return in JSON
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $cats = Category::all();
        
        $addSelected = $request->get('addSelected', 0);
        if ((int)$addSelected === 1) {
            foreach ($cats as $cat) {
                $cat->selected = true;
            }
        }

        return response()->json($cats);
    }
    
    /**
     * Find category by ID, return in JSON
     *
     * @param int $categoryId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($categoryId = 0)
    {
        $cat = Category::find((int)($categoryId));
        if (null===$cat) {
            return response()->json(['type'=>'error', 'message' => 'Not Found.'], 404);
        }
        return response()->json($cat);
    }
}
