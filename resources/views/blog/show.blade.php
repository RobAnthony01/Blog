@extends('layouts.app')

@section('content')
    @include('partials.edit-delete-modal')
    @include('partials.error-alert')
    <div id="grey">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-md-offset-2">
                @include("partials.edit-delete-buttons")
                <br>
                <h1>{{ $blog->title }}</h1>
                @if (!empty($blog->image))
                    <img src="..\images\blog-images\{{$blog->image}}" alt="{{$blog->alt_text}}"
                         class="img-responsive center-block"/>
                @endif
                <p>{!! $blog->blog_text !!}</p>
                @include('partials.list-category-pills')
                <br>
            </div>
        </div>
    </div><!-- /grey -->

@endsection

@section('scripts')
    @include('partials.edit-delete-script')
@endsection