@extends('layouts.app')

@section('title')
    Create new post
@endsection

@section('content')
    <div class="panel pane-default">
        
        <div class="panel-heading">
            Create a new post
        </div>
        
        <div class="panel-body">
            <form action="{{ route('post.store') }}" method="post">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="control" cols="5" rows="5" class="form-control">
                    </textarea>
                </div>
                
                <div class="mt-2 form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" >Store Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
