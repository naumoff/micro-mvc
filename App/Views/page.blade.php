@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                @if($data['title'] == false)
                    <h1 style="text-align: center">default title</h1>
                @else
                    <h1 style="text-align: center">{{$data['title']}}</h1>
                @endif
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <a href="{{$buttonLinks['bet']}}"
                   class="btn btn-info"
                   role="button">
                    BET
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{$buttonLinks['watch']}}"
                   class="btn btn-info"
                   role="button">
                    WATCH
                </a>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>

    @if($data['advertiser'] !== null)
        @includeIf("advertiser_content.".$data['advertiser'])
    @endif
@endsection