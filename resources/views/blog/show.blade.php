@extends('layouts.app')

@section('content')
    @include('partials.editdeletemodal')
    @include('partials.erroralert')
    <div id="grey">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-md-offset-2">
                @include("partials.editdeletebuttons")
                <br>
                <h1>{{ $blog->title }}</h1>
                @if (!empty($blog->image))
                    <img src="..\Images\BlogImages\{{$blog->image}}" alt="{{$blog->alt_text}}"
                         class="img-responsive center-block"/>
                @endif
                <p>{!! $blog->blog_text !!}</p>
                @include('partials.listcategorypills')
                <br>
            </div>
        </div>
    </div><!-- /grey -->

@endsection

@section('scripts')
@include('partials.editdeleteScript')
@endsection