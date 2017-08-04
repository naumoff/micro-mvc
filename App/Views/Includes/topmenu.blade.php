<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">{{\App\Config::APP_NAME}}</a>
        </div>
        <ul class="nav navbar-nav">
            @foreach($menuLinks AS $link)
                @if($link == $_REQUEST['c'])
                    <li><a href="/?c={{$link}}" style="color: red;">{{$link}}</a></li>
                @else
                    <li><a href="/?c={{$link}}">{{$link}}</a></li>
                @endif
            @endforeach
         </ul>
    </div>
</nav>