<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Akhamatvarokah\Rentbro\Models\Mysql\Category;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function index()
	{
		return view('admin/category/index');
	}

	public function show()
	{
		DB::statement(DB::raw('set @rownum=0'));        
        $model = Category::select('category.*', DB::raw('@rownum  := @rownum  + 1 AS row'));

        return DataTables::eloquent($model)                        
            ->rawColumns(['action', 'verify', 'image', 'province_name'])
            ->make();
	}

	public function create()
	{
		$category = Category::get();
		$data = [];
		$data['category'] = $category;
		return view('admin/category/create', $data);
	}

	public function store(Request $request)
	{
		$category = new Category;
		$category->name = $request->name;
		$category->alias = strtolower(str_replace(" ", "-", $request->name));
		$category->parent_id = $request->parent;
		$category->icon = $request->icon;
		$category->description = $request->description;
		$category->save();

		return redirect('category');
	}
}
