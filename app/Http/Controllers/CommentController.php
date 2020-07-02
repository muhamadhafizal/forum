<?php

namespace App\Http\Controllers;
use App\Comment;
use Redirect;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){

        $content = $request->input('content');
        $forumid = $request->input('forumid');

        $comment = new Comment;
        $comment->content = $content;
        $comment->forumid = $forumid;

        $id = $forumid;

        $comment->save();
        return Redirect::route('detailforum', compact('id'));


    }

    public function destroy($id){

        $comment = Comment::find($id);
        $comment->delete($comment->id);

        \Session::flash('flash_message_delete', 'successfully deleted.');
        return Redirect::back();

    }
}
