@extends('layouts.app')

@section('content')
<div class="row">       
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('flash_message') !!}</em></div>
                            @endif
                        </div>
                        <div class="col-sm-2"></div>
                      
                </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p><b>{{$forum->title}}</b></p>
                    <p>
                        {{$forum->body}}
                    </p>    
                    <button type="button" class="btn btn-warning" onclick="window.location='{{ action('ForumController@edit', $forum->id) }}'">Edit</button>
                    <hr />
                    
                    <h4>Display Comments</h4>
                    
                        <div class="display-comment">
                            <strong>ABC</strong>
                            <p>ASD</p>
                        </div>
                  
                    <hr />
                    <h4>Add comment</h4>
                    <form method="post" action="">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment_body" class="form-control" />
                            <input type="hidden" name="post_id" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Add Comment" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection