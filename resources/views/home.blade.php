@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('message'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        </div>
    </div>
    @endif

    <div class="row homeSlider">
        <div class="col-md-12 slide">
            <div class="content">
                <strong>PROJECT LAUNCHER</strong>, la plateforme communautaire de<br>
                financement participatif qui va faire décoller vos projets !
                <a class="" href="">Démarrer un projet</a>
            </div>
        </div>
        <div class="col-md-12 slide">
            <div class="content">
                HOOH
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="row catSlider-wrapper">

        <div class="col-md-2">
            <div class="dots-container">
                <i class="fa fa-superpowers" aria-hidden="true"></i><h4>TOP PROJETS</h4>
            </div>
        </div>

        <div class="col-md-10">
            <div class="catSlider">

                    @foreach ($topHome as $k => $v)
                    <div class="catSliderContent" data-thumb="{{ $categories[$k]->name }}">
                        @if(!is_null($topHome[$k]))
                            <h5><span>{{ $topHome[$k]->title }}</span>
                               <a class="link-cat" href="home/category/{{ $categories[$topHome[$k]->category_id-1]->id }}"><strong>{{ $categories[$topHome[$k]->category_id-1]->name }}</strong> : voir la catégorie</a>
                            </h5>

                            <div class="author">par <i class="fa fa-user" aria-hidden="true"></i> {{ $topUser[$k]->firstname }} {{ $topUser[$k]->name }}</div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="img-project" style="background-image:url('http://lorempixel.com/600/400/')"><div class="ribbon"><span>TOP</span></div></div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="desc">
                                        {{ str_limit($topHome[$k]->description, 450) }}
                                    </div>
                                    <div class="prog">
                                        <div class="amount">
                                            <span>{{ number_format($percentage[$k],0) }}%</span>
                                            <div class="currentAmount" style="width:{{ $percentage[$k] }}%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 stats">
                                    <i class="fa fa-eur" aria-hidden="true"></i> Fonds récoltés <br>
                                    <strong>{{ $topCurrentAmount[$k] }}€</strong>
                                </div>
                                <div class="col-sm-3 stats">
                                    <i class="fa fa-handshake-o" aria-hidden="true"></i> Financements <br>
                                    <strong>{{ $totalContracts[$k] }}</strong>
                                </div>
                                <div class="col-sm-3 stats">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> Jours restants<br>
                                    <strong>{{ $daysLeft[$k] }}</strong>
                                </div>
                                <div class="col-sm-3 stats">
                                    <a href="home/project/{{ $topHome[$k]->id }}">voir le projet</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    @endforeach
            </div>
        </div>
    </div>

</div>
<div class="container">

    <hr>

    <div class="row titre-last-projects" id="last-projects">
        <div class="col-md-12">
            <h4><i class="fa fa-calendar-check-o" aria-hidden="true"></i><span>DERNIERS PROJETS</span></h4>
        </div>
    </div>     

    <div class="last-projects row">@include('load')</div>
    
</div>

</div>
@endsection

@push('js-stack')
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.homeSlider').slick({
        prevArrow : '<button type="button" class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow : '<button type="button" class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
    });

    $('.catSlider').slick({
        dots: true,
        appendDots: $(".dots-container"),
        vertical: true,
        arrows:false,
        customPaging : function(slider, i) {
            var thumb = $(slider.$slides[i]).data('thumb');  
            return '<a>'+thumb+'</a>';
        },
    });

    $('.dots-container li').on('click', function(){
        $('.dots-container li').removeClass('active');
        $(this).addClass('active');
    });
});
</script>
<script type="text/javascript">

$(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();
        console.log('click');

        var url = $(this).attr('href');  
        getProjects(url);
        window.history.pushState("", "", url);

        $('html, body').animate({
            scrollTop: $("#load").offset().top
        }, 500);

    });

    function getProjects(url) {
        $.ajax({
            url : url  
        }).done(function (data) {
            $('.last-projects').html(data);  
        }).fail(function () {
            alert('Articles could not be loaded.');
        });

    }
});

</script>
@endpush

@push('css-stack')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
@endpush

