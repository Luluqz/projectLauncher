@extends('layouts.app')

@section('content')
<div class="container createProject">

    @if(Session::has('message'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        </div>
    </div>
    @endif

    <div class="jumbotron text-center">
        Lancez-vous et créez votre projet ! <br>
        Il vous suffit de suivre les étapes ci-dessous <br>
        Vous pourrez ensuite retrouver votre projet et suivre son avancement dans votre back-end !
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Créer un projet</div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('/home/create/addProject') }}">
                        {{ csrf_field() }}
                        {{ Form::hidden('user_id', Auth::user()->id) }}
                        {{ Form::hidden('end', '', array('id' => 'end')) }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">Titre du projet</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                            <label for="desc" class="col-md-2 control-label">Description</label>

                            <div class="col-md-10">
                                <textarea style="resize:vertical;" id="desc" class="form-control" name="desc" value="{{ old('desc') }}" required></textarea>

                                @if ($errors->has('desc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                            <label for="cost" class="col-md-2 control-label">Objectif financier</label>

                            <div class="col-md-10">
                                <input id="cost" type="number" class="form-control" name="cost" value="{{ old('cost') }}" required>

                                @if ($errors->has('cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('endline') ? ' has-error' : '' }}">
                            <label for="endline" class="col-md-2 control-label">Durée de la campagne</label>

                            <div class="col-md-10">
                                <div id="endline" class="" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                    <span></span> <b class="caret"></b>
                                </div>

                                @if ($errors->has('endline'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('endline') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-2 control-label">Categorie du projet</label>
                            
                            <div class="col-md-10" data-toggle="buttons">
                                @foreach ($categories as $key => $category)
                                    <label class="btn btn-info">
                                        <input type="radio" name="category" id="{{ $category->name }}" autocomplete="off" value="{{ $key+1 }}" required> {{ $category->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
                            <label for="tag" class="col-md-2 control-label">Tag(s)</label>

                            <div class="col-md-10">
                                <input type="text" name="tags" id="tags">

                                @if ($errors->has('tag'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tag') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bigImg') ? ' has-error' : '' }}">
                            <label for="bigImg" class="col-md-2 control-label">Image principale</label>

                            <div class="col-md-10">
                                <div class="input-group image-preview">
                                    <input type="text" class="form-control image-preview-filename" disabled="disabled" required> <!-- don't give a name === doesn't send on POST/GET -->
                                    <span class="input-group-btn">
                                        <!-- image-preview-clear button -->
                                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                            <span class="glyphicon glyphicon-remove"></span> Clear
                                        </button>
                                        <!-- image-preview-input -->
                                        <div class="btn btn-default image-preview-input">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                            <span class="image-preview-input-title">Parcourir</span>
                                            <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                                        </div>
                                    </span>
                                </div><!-- /input-group image-preview [TO HERE]--> 

                                @if ($errors->has('bigImg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bigImg') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-check"></i> Créer !
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js-stack')
    <script src="{{ URL::asset('assets/js/summernote.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script src="{{ URL::asset('assets/js/selectize.min.js') }}"></script>
    <!-- <script src="{{ URL::asset('assets/js/createProject.js') }}"></script> -->
    <script type="text/javascript">
    $( document ).ready(function() {
        $(function() {
        
            var start = moment();
            var end = moment();
        
            function cb(start, end) {
                $('#endline span').html(start.format('DD/MM/YYYY'));
                $('#end').val(start.format('YYYY-MM-DD'));
            }
        
            $('#endline').daterangepicker({
                "showCustomRangeLabel": false,
                "autoApply": true,
                startDate: start,
                endDate: end,
                "alwaysShowCalendars": false,
                ranges: {
                   'Une semaine': [moment().add(7, 'days'), moment()],
                   'Deux semaines': [moment().add(14, 'days'), moment()],
                   'Trois semaines': [moment().add(21, 'days'), moment()],
                   'Un mois': [moment().add(29, 'days'), moment()],
                   'Cinq semaines': [moment().add(36, 'days'), moment()],
                   'Six semaines': [moment().add(43, 'days'), moment()],
                   'Sept semaines': [moment().add(50, 'days'), moment()],
                   'Deux mois': [moment().add(60, 'days'), moment()]
                }
            }, cb);
        
            cb(start, end);

            // var end_project = $('#endline').data('daterangepicker');

            // $('#endline').on('hideCalendar.daterangepicker', function(ev, picker){
            //     $('#end').val(end);
            // });
            
        });
        $('#tags').selectize({
            plugins: ['remove_button'],
            delimiter: ',',
            persist: false,
            valueField: 'tag',
            labelField: 'tag',
            searchField: 'tag',
            options: tags,
            create: function(input) {
                return {
                    tag: input
                }
            }
        });
        $('#desc').summernote({
          height:300,
        });
    });
    </script>
    <script>
    var tags = [
        @foreach ($tags as $tag)
        {tag: "{{$tag}}" },
        @endforeach
    ];
    </script>
@endpush

@push('css-stack')
    <link href="{{ URL::asset('assets/css/summernote.css') }}" type='text/css' rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link href="{{ URL::asset('assets/css/selectize.bootstrap3.css') }}" type='text/css' rel="stylesheet">
@endpush