<?php

namespace App\Http\Controllers\ajaxcrud;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Redirect,Response;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Response;
class AjaxPostController extends Controller
{
    public function index()
    {
        $data['posts'] = Post::orderBy('id', 'desc')->paginate(8);
        return view('ajaxcrud', $data);
    }
    public function store(Request $request)
    {
        // dd($request);
        $postID = $request->post_id;
        $post   =   Post::updateOrCreate(
            ['id' => $postID],
            ['title' => $request->title, 'body' => $request->body]
        );
        return Response::json($post);
    }
    public function update(Request $request)
    {
        // dd($request);
        $post = $request->all();
        // $post = Post::findOrFail($id);
        $data = Post::findOrFail($post['id']);
        $data->update($post);
        // $data->update($request->all());
        return $post;
    }
    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = Post::where($where)->first();
        return Response::json($post);
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        // $post = Post::where('id',$id)->delete();
        return $post;
    }
}
