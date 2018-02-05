@extends('mail')

@section ('content')
    <h2>Registration Confirmation!</h2>
    <p>Dear {{$user}},</p>
    <p>You have requested registration on <b>{{$application}}</b>!</p>
    <p>To finish registration process you need to confirm your email address <b>{{$email}}</b> by clicking on the following link:</p>
    <a href="{{$link}}">Registration confirmation link</a>
    <br>
    <p>Yours sincerely,</p>
    <p><b>{{$application}}</b></p>
@endsection