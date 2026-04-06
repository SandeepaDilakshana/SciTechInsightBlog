@extends('layouts.app')

@section('title')
    Create new category
@endsection

@section('content')
    @if (count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif

    <div class="panel pane-default">

        <div class="panel-heading">
            Create a category
        </div>

        <div class="panel-body">
            <form action="{{ route('category.store') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mt-2 form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Store Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
