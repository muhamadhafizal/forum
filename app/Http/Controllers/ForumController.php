<?php

namespace App\Http\Controllers;
use App\Forum;
use Illuminate\Http\Request;
use Redirect;
use App\User;
use App\Comment;

class ForumController extends Controller
{
    public function getinfo() {

		$username = session()->get('username');
		$password = session()->get('password');
		$role = session()->get('role');

		$user = User::all()->where('username', $username)
			->where('password', $password)
			->first();
		return $user;
    }

    public function getallforum(){
        $allforum = Forum::orderBy('created_at','DESC')->get();

        return $allforum;
    }
    //end get

    public function index(Request $request){
    
        return view('/main/index');
    }

    public function add(){

        $user = $this->getinfo();

        return view('/main/addforum', compact('user'));
    }

    public function store(Request $request){

        $user = $this->getinfo();

        $title = $request->input('title');
        $body = $request->input('body');
        $userid = $request->input('userid');

        $forum = new Forum;
        $forum->title = $title;
        $forum->body = $body;
        $forum->userid = $userid;

        $forum->save();

        \Session::flash('flash_message', 'successfully added.');
        return Redirect::route('listforum', compact('user'));


    }

    public function list(){

        $allforum = $this->getallforum();
        $i = 1;
        return view('/main/listforum', compact('allforum','i'));
    }

    public function detail($id){

        $forum = Forum::find($id);

        $listcomment = Comment::where('forumid',$id)->orderBy('created_at','DESC')->get();
        return view('/main/detailforum', compact('forum','listcomment'));
    }

    public function destroy($id){

        $forum = Forum::find($id);
        $forum->delete($forum->id);

        \Session::flash('flash_message_delete', 'successfully deleted.');
        return Redirect::route('listforum');

    }

    public function edit($id){

        $detailforum = Forum::find($id);

        return view('/main/editforum', compact('detailforum'));
    }

    public function update(Request $request,$id){

        $title = $request->input('title');
        $body = $request->input('body');

        $forum = Forum::find($id);

        $forum->title = $title;
        $forum->body = $body;

        $forum->save();

        \Session::flash('flash_message', 'successfully updated.');
        return Redirect::route('detailforum', compact('id'));


    }
}
