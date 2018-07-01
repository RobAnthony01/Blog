@extends('layouts.app')

@section('content')

    <!-- +++++ Welcome Section +++++ -->
    <div id="ww">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                    <img src="Images/Rob_Anthony_400x400.jpg" width="200" class="img-circle" alt="Rob Anthony" />
                    <h1>About Rob Anthony</h1>
                    <p>Having successfully taught Mathematics for a number of years, Rob is turning his hand to his other passion - programming.</p>
                    <p></p>

                </div><!-- /col-lg-8 -->
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /ww -->
    <!-- +++++ Information Section +++++ -->
    <div class="container pt">
        <div class="row mt">
            <div class="col-lg-12">
                <h4>His-story</h4>
            </div>
        </div>
        <div class="row mt">
            <div class="col-lg-6">
                <p>Rob taught himself to program a computer, aged 10, after finding 'The Basic Handbook' in the local library. However, it wasn't until three years later he actually found out whether the programs worked when he got access to a computer! (They did)</p>
                <p>After playing around with a Sinclair ZX81, a Sharp MZ-80k and the original BBC Micro, he went on to take a degree in Maths and Computing at UEA in Norwich. </p>
            </div><!-- /colg-lg-6 -->
            <div class="col-lg-6">
                <p>After graduating, he trained to be a teacher and enjoyed a career teaching Maths.</p>
                <p>When his son started to take an interest in coding, he also got the bug again and has been enthusiastically learning new languages, new skills and applying his previous knowledge to current problems.</p>
            </div><!-- /col-lg-6 -->
        </div><!-- /row -->
        <div id="app">
            <certificates></certificates>
        </div>
    </div><!-- /container -->
@endsection
