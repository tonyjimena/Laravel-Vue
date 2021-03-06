@extends('layouts.app')
@section('content')
<div class="container">
 <div class="row">
    <div class="col-md-10 col-md-offset-1">
        <form method="POST" action="/post/store">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputtext1">text address</label>
                <input name="post_title" type="text" class="form-control">
                <small id="textHelp" class="form-text text-muted">We'll never share your text with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputtext1">text address</label>
                <input name="post_body" type="text" class="form-control">
            </div>

                <input name="user" type="hidden" class="form-control" value=" {{ Auth::user()->name }}">


            <input type="submit" class="btn btn-primary" value="Submit">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </form>
    </div>
 </div>
</div>
@endsection
