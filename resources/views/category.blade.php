@extends('layouts.app')

@section('content')
<div class="container category">

    <div class="row cat-list">
      <div class="col-md-12">
        <ul>
          @foreach ($categories as $cat)
          <li>
            <a href="" class=" @if($cat->id == $top1->category_id) active @endif ">
              {{ $cat->name }}
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>

    <h2><span>{{ $category->name }}</span></h2>

        @if (count($top1) > 0)
        <div class="row rowtop">
            <div class="shadow">
                <div class="col-md-6">
                    <h4><i class="fa fa-superpowers" aria-hidden="true"></i> <span>{{ $top1->title }}</span></h4>
                    <div class="author">par <i class="fa fa-user" aria-hidden="true"></i> {{ $user1->firstname }} {{ $user1->name }} </div>
                    <div class="desc">
                      {{ str_limit($top1->description, 450)}}
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="c100 p{{ number_format($perc1,0) }} yellow">
                              <span>{{ number_format($perc1,0) }}%</span>
                              <div class="slice">
                                <div class="bar"></div>
                                <div class="fill"></div>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-4 stats"><i class="fa fa-eur" aria-hidden="true"></i> Fonds récoltés<br><strong>{{ $currentAmount1 }}€</strong></div>
                        <div class="col-md-4 stats"><i class="fa fa-calendar" aria-hidden="true"></i> Jours restants<br><strong>{{ $daysLeft1 }}</strong></div>
                        <!-- <div class="col-md-3"><a href="">Voir le projet</a></div> -->
                    </div>
                    <div class="row link">
                        <div class="col-md-12">
                            <a href="">Voir le projet</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="background-image:url('http://lorempixel.com/900/700/')">
                    <div class="img-project"></div>
                </div>
            </div>
        </div>
        @endif

        <div class="row last-projects">
        @foreach ($projects as $key => $project)
            <div class="col-md-6 col-sm-2">
                <div class="shadow">
                    <div class="img-project" style="background-image:url('http://lorempixel.com/600/400/')">
                        <span class="catName"><i class="fa fa-flag-o" aria-hidden="true"></i></span>
                    </div>
                    <div class="desc-project">
                        <h6><span>{{ str_limit($project->title, 40) }}</span></h6>
                        <div class="author">
                            <i class="fa fa-user" aria-hidden="true"></i> {{ $user[$key]->firstname }} {{ $user[$key]->name }}
                        </div>
                        <p>{{ str_limit($project->description, 200) }}</p>
                        <div class="prog">
                            <div class="amount">
                                <span>{{ number_format($perc[$key],0) }}%</span>
                                <div class="currentAmount" style="width:{{ $perc[$key] }}%;">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="link"><a href="">Voir le projet</a></div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

        <div class="row all">
            @if (count($projects) > 0)
                @foreach ($projects as $key => $project)                
                    <div class="col-md-6 grid-item" style="border:1px solid #e7e7e7; padding:15px;">
                        <span class="id">{{ $project->id }} </span> <br>
                        <span class="top">TOP : {{ $project->toTop }}</span>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection

@push('js-stack')

@endpush

@push('css-stack')
<link href="{{ URL::asset('assets/css/circle.css') }}" type='text/css' rel="stylesheet">
@endpush
