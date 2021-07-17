<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{

    public function showList()
    {
        $blogs = Blog::all();

        return view('blog.list',['blogs' => $blogs]);
    }

    public function showDetail($id)
    {
        $blog = Blog::find($id);

        if (is_null($blog)) {
            \Session::flash('err_msg','データがありません');
            return redirect(route('blogs'));
        }

        return view('blog.detail',['blog' => $blog]);
    }

    public function showCreate() {
        return view('blog.form');
    }

    public function exeStore(Request $request) {

        $inputs = $request->all();
        Blog::create($inputs);
        \Session::flash('err_msg','ブログを投稿しました');
            return redirect(route('blogs'));
    }
}