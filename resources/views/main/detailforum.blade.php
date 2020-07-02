@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p><b>ABC</b></p>
                    <p>
                        DEF
                    </p>
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