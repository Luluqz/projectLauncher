@extends('layouts.app')

@section('content')
<div class="container category">

    <div class="row cat-list">
      <div class="col-md-12" style="padding-bottom:55px;">
        <select class="cs-select cs-skin-underline">
          @foreach ($categories as $cat)
              <option value="{{ $cat->id }}" data-link="{{ $cat->id }}">
                  {{ $cat->name }}
              </option>
          @endforeach
        </select>
      </div>
    </div>

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
                            {!! link_to_route('projectdetails', 'Voir le projet', ['id' => $top1->id]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="background-image:url('http://lorempixel.com/900/700/')">
                    <div class="img-project">
                        <div class="ribbon"><span>TOP</span></div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row last-projects">
        @foreach ($projects as $key => $project)
            <div class="col-md-6 col-sm-2">
                <div class="shadow">
                    <div class="img-project" style="background-image:url('http://lorempixel.com/600/400/')">
                        @if ($project->toTop == 1)
                            <div class="ribbon"><span>TOP</span></div>
                        @endif
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
                        <div class="link">{!! link_to_route('projectdetails', 'Voir le projet', ['id' => $project->id]) !!}</div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

    </div>
</div>
@endsection

@push('js-stack')
<script src="{{ URL::asset('assets/js/classie.js') }}"></script>
<script src="{{ URL::asset('assets/js/selectFx.js') }}"></script>
<script>
    (function() {
        [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {    
            new SelectFx(el);
        } );
    })();
</script>
<script type="text/javascript">
    $('.cs-placeholder').html('{{ $category->name }}');
</script>
@endpush

@push('css-stack')
<link href="{{ URL::asset('assets/css/circle.css') }}" type='text/css' rel="stylesheet">
<link href="{{ URL::asset('assets/css/select.css') }}" type='text/css' rel="stylesheet">
@endpush
