@extends('layouts.app')

@section('content')
<div class="container login account">
    <div class="row">
        <div class="col-md-12">
            <h1><span>Mon Compte</span></h1>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Mon profil</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">Prénom</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ Auth::user()->firstname }}">

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">Ville</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ Auth::user()->city }}">

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('CP') ? ' has-error' : '' }}">
                            <label for="CP" class="col-md-4 control-label">Code Postal</label>

                            <div class="col-md-6">
                                <input id="CP" type="text" class="form-control" name="CP" value="{{ Auth::user()->CP }}">

                                @if ($errors->has('CP'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('CP') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Adresse</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Téléphone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-check"></i> Mettre à jour
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 activities">
            <div class="panel panel-default">
                <div class="panel-heading">Mes activités</div>
                <div class="panel-body">
                    @if($user->role == 1)
                        <h3>Mes Projets</h3>
                        <div class="panel-group" id="accordion" role="tablist">
                            @foreach ($projects as $k => $project)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading-{{ $project->id }}">
                                    <h4 class="panel-title">
                                        <a role="button" aria-expanded="false" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $project->id }}" aria-controls="collapse-{{ $project->id }}">
                                            {{ $project->title }} <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapse-{{ $project->id }}" role="tabpanel" aria-labelledby="heading-{{ $project->id }}">
                                    <div class="panel-body">
                                        <div class="prog">
                                            Avancement : 
                                            @if(!is_null($currentAmount[$k]))
                                                {{ $currentAmount[$k] }}€ récoltés sur {{ $project->project_cost }}€
                                            @else
                                                Pas de financement pour l'instant
                                            @endif
                                        </div>
                                        <div class="investors">
                                            @foreach($project_contracts[$k] as $c)
                                                {{ $c->amount }}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
