@include('includes.header')
@include('includes.topmenu')

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8" class="page-header" style="text-align: center">
            @if($_REQUEST['t'] === null)
                <h1>{{$_REQUEST['c']}}</h1>
            @else
                <h1>{{$_REQUEST['t']}}</h1>
            @endif
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-3">
            <a href="{{$buttonLinks['link2']}}"
               class="btn btn-info"
               role="button">
               WATCH!
            </a>
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-3">
            <a href="{{$buttonLinks['link1']}}"
               class="btn btn-info"
               role="button">
                BET!
            </a>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>

@include('includes.footer')
