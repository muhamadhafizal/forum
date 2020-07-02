@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Forum</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updateforum', $detailforum->id) }}">
                        <div class="form-group">
                            @csrf
                            <label class="label">Forum Title: </label>
                            <input type="text" name="title" name="title" value="{{$detailforum->title}}" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label class="label">Forum Body: </label>
                            <textarea name="body" rows="10" cols="30" name="body" class="form-control" required>{{$detailforum->body}}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection