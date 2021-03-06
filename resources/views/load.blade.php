<div id="load" style="position: relative;">
@foreach ($projects as $key => $project)
    <div class="col-md-4 col-sm-6">
        <div class="shadow">
            <div class="img-project" style="background-image:url('http://lorempixel.com/600/400/')">
                <span class="catName"><i class="fa fa-flag-o" aria-hidden="true"></i>{{ $category[$key]->name }}</span>
                @if ($project->toTop == 1)
                <div class="ribbon"><span>TOP</span></div>
                @endif
            </div>
            <div class="desc-project">
                <h6><span>{{ str_limit($project->title, 40) }}</span></h6>
                <div class="author">
                    <i class="fa fa-user" aria-hidden="true"></i> {{ $user[$key]->firstname }} {{ $user[$key]->name }}
                </div>
                <p>{!! str_limit($project->description, 150) !!}</p>
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
{{ $projects->links() }}