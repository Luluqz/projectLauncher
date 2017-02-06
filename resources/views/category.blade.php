@extends('layouts.app')

@section('content')
<div class="container-fluid">

        @if (count($top1) > 0)
        <div class="row">
            <div class="col-md-12" style="border:1px solid #e7e7e7; padding:15px;">
                TOP 1 : {{ $top1->id }} <br>
            </div>
        </div>
        @endif

        <div class="row">
        @if (count($topProjects) > 0)
            @foreach ($topProjects as $key => $topProject)
                @if($topProject->id != $top1->id)
                    <div class="col-md-6" style="border:1px solid #e7e7e7; padding:15px;">
                        TOP 2 : {{ $topProject->id }} <br>
                    </div>
                @endif
            @endforeach
        @endif

        @if (count($projects) > 0)
            @foreach ($projects as $key => $project)                
                @if ($project->toTop === 0)
                    <div class="col-md-6" style="border:1px solid #e7e7e7; padding:15px;">
                        NOTOP : {{ $project->id }}
                    </div>
                @endif
            @endforeach
        @endif
        </div>
    </div>
</div>
@endsection
