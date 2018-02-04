@include('mails.inclusions.mail-header', ['title'=>$title])

@yield('content')

@include('mails.inclusions.mail-footer')