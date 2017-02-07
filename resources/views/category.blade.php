@extends('layouts.app')

@section('content')
<div class="container category">

        @if (count($top1) > 0)
        <div class="row rowtop">
            <div class="col-md-12" style="border:1px solid #e7e7e7; padding:15px;">
                TOP 1 : {{ $top1->id }} <br>
            </div>
        </div>
        @endif

        <div class="last-projects">
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
                    </div>
                </div>
            </div>
        @endforeach
        </div>

        <div class="sort">
            SORTING <br>
            <a href="#sortBy=id" data-sortBy="id" class="">id</a>
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
