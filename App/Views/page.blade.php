@extends('master')

@section('content')
    @if($data['advertiser'] !== null)
        @includeIf("advertiser_content.".$data['advertiser'])
    @endif
@endsection