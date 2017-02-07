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

        <div class="sort">
            SORTING <br>
            <a href="#sortBy=id" data-option-value="id" class="">id</a>
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
<script src="{{ URL::asset('assets/js/isotope.pkgd.min.js') }}"></script>
<script type="text/javascript">
    $('.category .all').isotope({
      // options
      itemSelector : '.grid-item',
      layoutMode : 'fitRows',
      getSortData : {
          id : function( $elem ) {
            console.log($elem);
            return parseInt( $($elem).find('.id').text(), 10 );
          },
      }
    });
</script>
@endpush
