<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\HomePageSetting;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.childcategory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.childcategory.create', compact('categories'));
    }

    /**
     * Get subcategories.
     */
    public function getSubCategories(Request $request){
        $subCategories = SubCategory::where('category_id', $request->id)->where('status',1)->get();
        return $subCategories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'=> ['required'],
            'sub_category'=> ['required'],
            'name'=> ['required', 'max:200', 'unique:child_categories,name'],
            'status'=>['required'],
        ]);

        $childcategory = new ChildCategory();

        $childcategory->category_id = $request->category;
        $childcategory->sub_category_id = $request->sub_category;
        $childcategory->name = $request->name;
        $childcategory->slug = Str::slug($request->name);
        $childcategory->status = $request->status;
        $childcategory->save();

        toastr('Created Successfully', 'success');

        return redirect()->route('admin.child-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $childcategory = ChildCategory::findOrFail($id);
        $subCategories = SubCategory::where('category_id', $childcategory->category_id)->get();
        return view('admin.childcategory.edit', compact('childcategory', 'categories', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category'=> ['required'],
            'sub_category'=> ['required'],
            'name'=> ['required', 'max:200', 'unique:child_categories,name,'.$id],
            'status'=>['required'],
            
        ]);

        $childcategory = ChildCategory::findOrFail($id);

        $childcategory->category_id = $request->category;
        $childcategory->sub_category_id = $request->sub_category;
        $childcategory->name = $request->name;
        $childcategory->slug = Str::slug($request->name);
        $childcategory->status = $request->status;
        $childcategory->save();

        toastr('Updated Successfully', 'success');

        return redirect()->route('admin.child-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $childCategory = ChildCategory::findOrFail($id);
        if(Product::where('child_category_id', $childCategory->id)->count() > 0){
            return response(['status' => 'error', 'message' => 'This item contain relation can\'t delete it.']);
        }
        $homeSettings = HomePageSetting::all();

        foreach($homeSettings as $item){
            $array = json_decode($item->value, true);
            $collection = collect($array);
            if($collection->contains('child_category', $childCategory->id)){
                return response(['status' => 'error', 'message' => 'This item contain relation can\'t delete it.']);
            }
        }

        $childCategory->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request){
        $childCategory = ChildCategory::findOrFail($request->id);
        $childCategory->status = $request->status == 'true' ? 1 : 0;
        $childCategory->save();

        return response(['message'=> 'Status has been updated!']);
    }

}
