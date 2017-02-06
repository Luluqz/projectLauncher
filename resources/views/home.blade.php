@extends('layouts.app')

@section('content')
<div class="container">
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
                <i class="fa fa-superpowers" aria-hidden="true"></i><h4>TOP PROJECT</h4>
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
                                    <div class="img-project" style="background-image:url('http://lorempixel.com/600/400/')"></div>
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

<!--     <div class="row">
        <div class="col-md-12">
            @foreach ($categories as $key => $cat)
                <a href="home/category/{{ $cat->id }}" data-thumb="{{ $cat->name }}"> {{ $cat->name }} </a> <br>
            @endforeach
        </div>
    </div> -->
</div>
<div class="container">
    <div class="row last-projects">
        @foreach ($projects as $key => $project)
            <div class="col-md-4 col-sm-2">
                <div class="img-project" style="background-image:url('http://lorempixel.com/600/400/')">
                    <span class="catName">{{ $category[$key]->name }}</span>
                </div>
                <div class="desc-project">
                    <h6><span>{{ $project->title }}</span></h6>
                    <div class="author">
                        {{ $user[$key]->firstname }} {{ $user[$key]->name }}
                    </div>
                    <p>{{ str_limit($project->description, 300) }}</p>
                    <div class="prog">
                        <div class="amount">
                        PROGRESS : {{ $currentAmount[$key] }} / {{ $project->project_cost }}
                            <div class="currentAmount">
                                {{ $perc[$key] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!--     <div class="row">
        @foreach ($projects as $key => $project)
        <div class="col-md-4" style='margin-bottom:20px;'>
            <div class="border" style="border:1px solid #e7e7e7; padding:15px;">
                ID : {{ $project->id }} <br>
                TITLE : {{ $project->title }} <br>
                CATEGORY : {{ $category[$key]->name }} <br> 
                CREATOR : {{ $user[$key]->name }} <br> 
                PROGRESS : {{ $currentAmount[$key] }} / {{ $project->project_cost }}<br>
                DETAILS : <a href="home/project/{{ $project->id }}">See project</a>
            </div>
        </div>
        @endforeach
    </div> -->

</div>
@endsection

@push('js-stack')
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>@endpush

@push('css-stack')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
@endpush

