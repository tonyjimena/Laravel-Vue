@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <p><a class="btn btn-primary btn-lg" href="/post/new" >New PHP</a></p>
        <posts-index-component token=" {{ csrf_token() }} " user="{{ Auth::user()->name }}"></posts-index-component>
        <br>
        <table-component></table-component>
        {{-- <table-component posts="{{$posts}}"></table-component> --}}
        {{-- <div class="tabler">
            <table class="table table-condensed table-striped table-bordered">
                 <thead>
                    <tr>
                    <th>title</th>
                    <th>body</th>
                    <th>user</th>
                    <th>updated</th>
                    <th>created</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->post_title }}</td>
                        <td>{{ $post->post_body }}</td>
                        <td>{{ $post->user }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="{{ route('post.edit',['id' => $post->post_id] )}}" >Edit</a>
                            <a class="btn btn-danger btn-xs" href="{{ route('post.destroy',['id' => $post->post_id] )}}" >Delete</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div> --}}

    </div>
</div>
@endsection
