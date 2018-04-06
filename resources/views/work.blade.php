@extends('layouts.app')

@section('content')

    <!-- +++++ Welcome Section +++++ -->
    <h2>Portfolio</h2>

    <div class="container container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="well">
                    <div class="row pull-right">
                        <h5>December 2017</h5>
                    </div>
                    <div class="row">
                        <h2>Coding Blog</h2>
                    </div>
                    <figure>
                        <img class="img-responsive" src="images/blog-images/Rob_Anthony_-_Web_Developer.jpg"/>
                        <figcaption>A blog to record coding developments</figcaption>
                        <h4>Technology used</h4>
                        <ul class="list-group">
                            <li class="list-group-item">ASP.NET MVC</li>
                            <li class="list-group-item">MS SQL database</li>
                            <li class="list-group-item">C#</li>
                            <li class="list-group-item">jQuery</li>
                            <li class="list-group-item">HTML</li>
                            <li class="list-group-item">CSS</li>
                            <li class="list-group-item">Bootstrap</li>
                        </ul>
                    </figure>
                </div>
            </div>

            <div class="col-md-6">
                <div class="well">
                    <div class="row pull-right">
                        <h5>September 2017</h5>
                    </div>
                    <div class="row">
                        <h2>Lesson Timer</h2>
                    </div>
                    <figure>
                        <img class="img-responsive" src="images/blog-images/LessonTimer.jpg"/>
                        <figcaption>A Windows Forms App to time lessons and activities for teachers</figcaption>
                        <h4>Technology used</h4>
                        <ul class="list-group">
                            <li class="list-group-item">ASP.NET</li>
                            <li class="list-group-item">C#</li>
                            <li class="list-group-item">Windows Forms</li>
                        </ul>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="well">
                    <div class="row pull-right">
                        <h5>July 2016</h5>
                    </div>
                    <div class="row">
                        <h2>Algebra Worksheet Generator</h2>
                    </div>
                    <figure>
                        <img class="img-responsive" src="images/blog-images/Algebra Sheet.jpg"/>
                        <figcaption>An Excel spreadsheet producing random questions as a starter or a worksheet.
                            Generates answers and formats algebra correctly.
                        </figcaption>
                        <h4>Technology used</h4>
                        <ul class="list-group">
                            <li class="list-group-item">Excel</li>
                            <li class="list-group-item">Excel VBA</li>
                        </ul>
                    </figure>
                </div>
            </div>

            <div class="col-md-6">
                <div class="well">
                    <div class="row pull-right">
                        <h5>June 2015</h5>
                    </div>
                    <div class="row">
                        <h2>Writing Blog</h2>
                    </div>
                    <figure>
                        <img class="img-responsive" src="images/blog-images/Writer_Blog.jpg"/>
                        <figcaption>A blog for a local writer</figcaption>
                        <h4>Technology used</h4>
                        <ul class="list-group">
                            <li class="list-group-item">WordPress</li>
                        </ul>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="well">
                    <div class="row pull-right">
                        <h5>April 2007</h5>
                    </div>
                    <div class="row">
                        <h2>Info4Families</h2>
                    </div>
                    <figure>
                        <img class="img-responsive" src="images/blog-images/Info4Families.jpg"/>
                        <figcaption>A website to provide information about activities in Norfolk for families.
                        </figcaption>
                        <h4>Technology used</h4>
                        <ul class="list-group">
                            <li class="list-group-item">php</li>
                            <li class="list-group-item">SQL</li>
                            <li class="list-group-item">HTML</li>
                        </ul>
                    </figure>
                </div>
            </div>
        </div>
    </div>
@endsection
