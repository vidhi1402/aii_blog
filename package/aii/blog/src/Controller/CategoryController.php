<?php

namespace Aii\Blog\Controller;

use Aii\Blog\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends BlogAdminController
{
    public function Index()
    {
        $aCategory = Category::all();
        return view('blog::templates.category.category', compact('aCategory'));
    }

    /*Start::blog insert*/
    public function Insert(Request $oRequest)
    {
        $aRules = array(
            'name' => 'required',
            'slug' => 'required',
        );

        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oCategory = new Category();
            $oCategory['name'] = $oRequest->name;
            $oCategory['slug'] = $oRequest->slug;
            $oResponse = $oCategory->save();

            if ($oResponse) {
                session()->flash('msg', 'Category Added');
            } else {
                session()->flash('msg', 'Category Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*End::blog insert*/

    /*Start:: Get category*/
    public function GetCategory(Category $id)
    {
        $aCategory = Category::all();
        return view('blog::templates.category.category', compact('id', 'aCategory'));
    }
    /*End:: Get category*/

    /*Start:: Update category*/
    public function Update(Request $oRequest)
    {
        $aRules = array(
            'slug' => 'required',
            'name' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oResponse = Category::where('id_category', $oRequest->selected_id)->update([
                'slug' => $oRequest->slug,
                'name' => $oRequest->name,
            ]);
            if ($oResponse) {
                session()->flash('msg', 'Category Update');
            } else {
                session()->flash('msg', 'Category Not Update');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return redirect()->route('blog.category.index');
    }
    /*End:: Update category*/

    /*Start:: Delete category */
    public function Delete(Category $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Category Deleted');
        } else {
            session()->flash('msg', 'Category Not Deleted');
        }
        return redirect()->route('blog.category.index');
    }
    /*End:: Delete category*/

    /*Start::Update status category*/
    public function UpdateStatus(Request $oRequest)
    {
        $oResponse = Category::where('id_category', $oRequest->id)->update([
            'status' => $oRequest->status,
        ]);
        if ($oResponse) {
            session()->flash('msg', 'Status Changed');
            return response()->json(array('data' => $oResponse, 'status' => 1));
        } else {
            $oResponse = 'not found';
            session()->flash('msg', 'Status Not Changed');
            return response()->json(array('data' => $oResponse, 'status' => 0));
        }
    }
    /*End::Update status category*/
}
