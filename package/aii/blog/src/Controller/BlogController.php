<?php

namespace Aii\Blog\Controller;

use Aii\Blog\Models\Blog;
use Aii\Blog\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class BlogController extends BlogAdminController
{
    public function Index()
    {
        $aCategory = Category::where('status',config('constants.ACTIVE'))->get();
        $aBlog = Blog::all();
        return view('blog::templates.blog.blog', compact('aBlog','aCategory'));
    }

    /*start::get contact-data*/
    public function GetBlogDetail(Request $oRequest)
    {
        $oBlog = Blog::where('id_blog', $oRequest->id)->first();
        $html = view('blog::templates.blog.blog-modal-data', compact('oBlog'))->render();
        if ($html) {
            return response()->json(['status' => 1, 'html' => $html,'data' =>$oBlog, 'req_data' => $oRequest->all()]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
    /*End::get contact-data*/
    /*Start::blog insert*/
    public function Insert(Request $oRequest)
    {
        $aRules = array(
            'title' => 'required',
            'slug' => 'required',
            'date' => 'required',
            'post_by' => 'required',
            'description' => 'required',
        );

        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oBlog = new Blog();
            $oBlog['fk_id_category'] = $oRequest->fk_id_category;
            $oBlog['title'] = $oRequest->title;
            $oBlog['slug'] = $oRequest->slug;
            $oBlog['date'] = $oRequest->date;
            $oBlog['post_by'] = $oRequest->post_by;
            $oBlog['description'] = $oRequest->description;
            $oResponse = $oBlog->save();

            if ($oResponse) {
                session()->flash('msg', 'Blog Added');
            } else {
                session()->flash('msg', 'Blog Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*End::blog insert*/

    public function GetBlog(Blog $id)
    {
        $aCategory = Category::where('status',config('constants.ACTIVE'))->get();
        $aBlog = Blog::all();
        return view('blog::templates.blog.blog', compact('id','aBlog','aCategory'));
    }
    /*End:: Get product Edit*/

    /*Start:: Update product*/
    public function Update(Request $oRequest)
    {
        $aRules = array(
            'fk_id_category' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'date' => 'required',
            'post_by' => 'required',
            'description' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oResponse = Blog::where('id_blog', $oRequest->selected_id)->update([
                'fk_id_category' => $oRequest->fk_id_category ,
                'title' => $oRequest->title ,
                'slug' => $oRequest->slug,
                'date' => $oRequest->date,
                'post_by' => $oRequest->post_by,
                'description' => $oRequest->description,

            ]);

            if ($oResponse) {
                session()->flash('msg', 'Blog Updated');
            } else {
                session()->flash('msg', 'Blog Not Updated');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return redirect()->route('blog.blog.index');
    }

    /*Start:: Delete Blog */
    public function Delete(Blog $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Blog Deleted');
        } else {
            session()->flash('msg', 'Blog Not Deleted');
        }
        return redirect()->route('blog.blog.index');
    }
    /*End:: Delete Blog*/

    /*Start::Update status blog*/
    public function UpdateStatus(Request $oRequest)
    {
        $oResponse = Blog::where('id_blog', $oRequest->id)->update([
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
    /*End::Update status blog*/

}
