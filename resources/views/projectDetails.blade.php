@extends('layouts.app')

@section('content')

<div class="container project-details">
    <div class="row">
        <div class="col-md-12">
            <h1><span>{{ $project->title }}</span></h1>
            <div class="author"><i class="fa fa-user" aria-hidden="true"></i> {{ $user->firstname }} {{ $user->name }}</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 stats">
            <i class="fa fa-eur" aria-hidden="true"></i> Fonds récoltés<br>
            <strong>{{ $currentAmount }} €</strong>
        </div>
        <div class="col-md-3 stats">
            <i class="fa fa-handshake-o" aria-hidden="true"></i> Financements<br>
            <strong>{{ $financements }}</strong>
        </div>
        <div class="col-md-3 stats">
            <i class="fa fa-calendar" aria-hidden="true"></i> Jours restants<br>
            {{ $daysLeft }}
        </div>
        <div class="col-md-3 link">
            <a href="">Financer le projet</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="prog">
                <div class="amount">
                    <span>{{ number_format($perc,0) }}%</span>
                    <div class="currentAmount" style="width:{{ $perc  }}%;">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row visuel">
        <div class="col-md-8">
            <div class="img-project" style="background-image:url('http://lorempixel.com/900/600/')"></div>
        </div>
        <div class="col-md-4 desc">
            <h4><span>En bref</span></h4>
            <p>{{ str_limit($project->description, 350) }}</p>
        </div>
    </div>
    <div class="row onglets">
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs row" role="tablist">
                <li role="presentation" class="active col-md-3"><a href="#presentation" aria-controls="presentation" role="tab" data-toggle="tab"><i class="fa fa-info-circle" aria-hidden="true"></i> description</a></li>
                <li role="presentation" class="col-md-3"><a href="#financements" aria-controls="financements" role="tab" data-toggle="tab"><i class="fa fa-handshake-o" aria-hidden="true"></i> financements</a></li>
                <li role="presentation" class="col-md-3"><a href="#commentaires" aria-controls="commentaires" role="tab" data-toggle="tab"><i class="fa fa-comments-o" aria-hidden="true"></i> commentaires</a></li>
                <li role="presentation" class="col-md-3"><a href="#social-media" aria-controls="social-media" role="tab" data-toggle="tab"><i class="fa fa-facebook-official" aria-hidden="true"></i> <i class="fa fa-google-plus" aria-hidden="true"></i> <i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="presentation">
                    <h4><span> {{ $project->title }} </span></h4>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="img-project" style="background-image:url('http://lorempixel.com/600/400/')"></div>
                            <div class="desc">
                                {{ $project->description }}
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="financements">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Prénom / Nom</th>
                                    <th>Montant</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="commentaires">...</div>
                <div role="tabpanel" class="tab-pane" id="social-media">...</div>
            </div>
        </div>
    </div>
</div>

{{ $listContracts }} <br><br>

@foreach ($listContracts as $key => $contract)
    {{ $contract->amount }} // 
         @foreach ($investors as $k => $investor)
            Nom : {{ $investor[0]->name }} / ID :  {{ $investor[0]->id }}  <br>
         @endforeach
     <br>
@endforeach

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            ID : {{ $project->id }} <br>
            CREATOR : {{ $user->name }} {{ $user->firstname }}<br>
            CATEGORY : {{ $category->name }} <br><br>
            PROGRESS : {{ $currentAmount }} / {{ $project->project_cost }}  <br>
            INVESTORS : 
             @foreach ($investors as $key => $investor)
                Nom : {{ $investor[0]->name }} / ID :  {{ $investor[0]->id }}  <br>
             @endforeach

        </div>
    </div>
</div>
@endsection
