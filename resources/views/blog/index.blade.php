@extends('layouts.app')

@section('content')
    @include('partials.edit-delete-modal')
    <div class="container">
        @if (auth::check())
            <div class="row">
                <a href="/blog/create" class="btn btn-default">Create new</a>
            </div>
        @endif
            <div class="row">
                {{ $blogs->links() }}
            </div>
        <div class="row">
            <table class="table table-bordered">
                <tr class="">
                    <th>Status</th>
                    <th>Publish Date</th>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Categories</th>
                    <th>Actions</th>
                </tr>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{$blog->status}}</td>
                        <td>{{$blog->publish_date}}</td>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->blog_text}}</td>
                        <td>@include ('partials.list-category-pills')</td>
                        <td>@include("partials.edit-delete-buttons")</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('partials.edit-delete-script')
@endsection