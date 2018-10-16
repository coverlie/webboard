<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{

    public function index()
    {
        return back();
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'topic_id'=> 'required',
            'user_id'=> 'required'
        ]);
        $comment = new Comment();
        $comment->topic_id = $request->topic_id;
        $comment->user_id = $request->user_id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->action('TopicController@show', $comment->topic_id);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
