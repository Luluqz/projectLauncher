@extends('layouts.app')

@section('content')
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
             
             <code></code>

        </div>
    </div>
</div>
@endsection
