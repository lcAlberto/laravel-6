@auth()
    @if(current_user()->farm_id)
        @include('layouts.navbars.navs.auth')
    @else
        @include('layouts.navbars.navs.newFarm')
    @endif
@endauth

@guest()
    @include('layouts.navbars.navs.guest')
@endguest