@extends('layouts.app')

@section('content')
    @include('partials.edit-delete-modal')
    <div class="container">
        @if (auth::check())
            <div class="row">
                <a href="blog/create" class="btn btn-default">Create new</a>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-9 col-xs-12">
                @if (!empty($filter))
                    <div class="row centered">
                        <h2>Blogs with a category of {{$filter}}</h2>
                        <a href="home" class="m-4 btn btn-default">Clear filter</a>
                    </div>
                @endif
                @foreach ($blogs as $blog)
                    <div class="greywhite">
                        @include("partials.edit-delete-buttons")
                        <h3>{{$blog->title}}</h3>
                        <img src="images\blog-images\{{$blog->image}}" alt="{{$blog->alt_text}}" align="left"
                             class="img-responsive" height="100">
                        {!! html_entity_decode(str_limit($blog->blog_text,420,'...')) !!}
                        @include ('partials.list-category-pills')
                        @if(strlen($blog->blog_text) > 420)
                            <div class="pull-right"><a href="{{url('blog/' . $blog->id)}}">Continue reading...</a></div>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="col-sm-3 hidden-xs">
                <h3>Blogs by date</h3>
                <ul class="list-group">
                    @foreach ($blogs_by_date as $dates)
                        <li class="list-group-item">{{$dates->year}}
                            <ul class="list-group">
                                <li class="list-group-item">{{$dates->month}} <span
                                            class="badge badge-pill badge-info">{{$dates->blogs->count()}}</span>
                                    <ul class="toggle">
                                        @foreach ($dates->blogs as $blog)
                                            <li class="blog-link"><a
                                                        href="{{url('blog/' . $blog->id)}}">{{$blog->title}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endforeach
                </ul>
                <h3>Blogs by category</h3>
                @foreach ($categories_with_count as $category)
                    @if($category->published_blogs_count > 0)
                        <span class="badge badge-pill badge-info"><a
                                    href="{{url('home?category=' . $category->name)}}">{{$category->name}} {{$category->published_blogs_count}}</a></span>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    @include('partials.edit-delete-script')
@endsection