<nav class="navbar navbar-expand col-12 mt-3 " id="myDIV">
    <ul class="nav nav-tabs">
        @if ($navs)
        @foreach ($navs as $item)
        <li class="nav-item @if($item->parent_id!=0) dropdown @endif">
            @if ($item->parent_id!=0)
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <a class="nav-link dropdown-toggle navBTN" href="{{$item->url}}" id="navbarDropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{$item->name}}
                </a>
                @if (App\Http\Controllers\Controller::getParents($item->id)!=null)
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach ( App\Http\Controllers\Controller::getParents($item->id) as $par)
                    @if ($par->sub_parent_id!=0)
                    <li class="dropdown-submenu dropright">
                        <a class="dropdown-item dropdown-toggle {{ '/'.Request::path()==$par->url ? 'active' : '' }} " href="{{$par->url}}">{{$par->name}}</a>
                        @if (App\Http\Controllers\Controller::getSubParentName($par->id) )
                        <ul class="dropdown-menu ">
                            @foreach (App\Http\Controllers\Controller::getSubParentName($par->id) as $par )
                            <li><a class="dropdown-item " href="{{$par->sub_url}}">{{$par->sub_name}}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @else
                    <li><a class="dropdown-item " href="{{$par->url}}">{{$par->name}}</a></li>
                    @endif
                    @endforeach
                </ul>
                @endif

            </div>
            @else
            {{-- @if($item->id==1) active @endif --}}
        <a class="nav-link @if($item->id==1)  {{ Request::path()==$item->url ? 'active' : ''}} @else {{'/'.Request::path()==$item->url ? 'active' : ''}} @endif  " href="{{$item->url}}">{{$item->name}}</a>
            @endif
        </li>
        @endforeach

        @endif
    </ul>

</nav>

@section('js')
<script>
    var header = document.getElementById("myDIV");
    var btns = header.getElementsByClassName("navBTN");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
      });
    }
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
    if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
    }
    $(this).next('.dropdown-menu').toggleClass('show');
    return false;
});
</script>

@endsection
