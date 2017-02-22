@extends('layouts.app')

@section('content')
<div class="container login account">

    @if(Session::has('message'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <h1><span>Mon Compte</span></h1>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Mon profil</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/home/modifAccount') }}">
                        {{ csrf_field() }}
                        {{ Form::hidden('user_id', $user->id , array('id' => 'user_id')) }}

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

<!-- Modal -->
<div class="modal fade" id="modal-editProject{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">{{ $project->title }}</h3>
            </div>
            <div class="modal-body">
                Vous souhaitez contribuer à ce projet à hauteur de : <br><br>
                {!! Form::open(['route' => 'modifProject']) !!}

                {{ Form::hidden('project_id', $project->id) }}
                {{ Form::textarea('description', $project->description, ['class' => 'description']) }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                {{ Form::submit('Editer', array('class' => 'btn btn-primary')) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-editTop{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">{{ $project->title }}</h3>
            </div>
            <div class="modal-body">
                @if ($project->toTop == 0)
                    Vous souhaitez mettre votre projet en avant ? <br>
                    Pour 10euros, vous avez la possibilité de mettre en avant votre projet sur le site LauncherProject<br><br>
                    {!! Form::open(['route' => 'modifTop']) !!}

                    {{ Form::hidden('project_id', $project->id) }}
                    {{ Form::hidden('toTop', '1') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    {{ Form::submit('Payer', array('class' => 'btn btn-primary')) }}
                </div>
                {!! Form::close() !!}
                @else
                    Votre projet est déjà mis en avant !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    {{ Form::submit('Payer', array('class' => 'btn btn-primary')) }}
                </div>
                @endif
        </div>
    </div>
</div>
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
                                        <div class="investors">
                                            <table class="table table-hover table-{{ $project->id }}">
                                                <thead>
                                                    <tr>
                                                        <th>Investisseur</th>
                                                        <th>Montant</th>
                                                        <th>Email</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($project_contracts[$k] as $key => $c)
                                                    <tr>
                                                        <td><?php echo $investors[$k][$key]->firstname; ?> <?php echo $investors[$k][$key]->name; ?></td>
                                                        <td>{{ $c->amount }}€</td>
                                                        <td><?php echo $investors[$k][$key]->email; ?></td>
                                                        <td></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="prog jumbotron">
                                            @if(!is_null($currentAmount[$k]))
                                                <table class="table-hover text-center" style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Total</th>
                                                            <th class="text-center">Objectif final</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $currentAmount[$k] }}€</td>
                                                            <td>{{ $project->project_cost }}€</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            @else
                                                Pas de financement pour l'instant
                                            @endif
                                        </div>
                                        <div class="">
                                            <div class="col-md-6 text-center">
                                                {!! link_to_route('projectdetails', 'Voir le projet', ['id' => $project->id], ['class' => 'btn btn-primary']) !!}
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-editProject{{ $project->id }}">Editer le projet</a>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-editTop{{ $project->id }}">Mettre en avant</a>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <a href="" class="btn btn-primary btn-export{{ $project->id }}">Exporter les données</a>


<script>
    $(".btn-export{{ $project->id }}").click(function(){
      $(".table-{{ $project->id }}").table2excel({
        // exclude CSS class
        exclude: ".noExl",
        name: "Worksheet Name",
        filename: "SomeFile" //do not include extension
      }); 
    });
</script>

                                            </div>
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

@push('js-stack')
    <script src="{{ URL::asset('assets/js/jquery.table2excel.min.js') }}"></script>
@endpush

@endsection
