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
                <li role="presentation" class="active col-md-3"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                <li role="presentation" class="col-md-3"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                <li role="presentation" class="col-md-3"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                <li role="presentation" class="col-md-3"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">zefzefzef</div>
                <div role="tabpanel" class="tab-pane" id="profile">...</div>
                <div role="tabpanel" class="tab-pane" id="messages">...</div>
                <div role="tabpanel" class="tab-pane" id="settings">...</div>
            </div>
        </div>
    </div>
</div>

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
