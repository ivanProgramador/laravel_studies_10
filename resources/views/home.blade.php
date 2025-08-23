<x-layouts.main-layout>
   <div class="container">
       <div class="row" >
            <div class="col" >
                <ul class="display 6">
                  @guest
                       <li><a href="{{ route('login')}}">Login</a></li>
                  @else 
                    @can('user_is_admin')
                         <li><a href="{{ route('only_admin') }}">Só administradores</a></li>
                    @endcan

                    @can('user_is_user')
                          <li><a href="{{ route('only_user') }}">Só usuarios</a></li>
                    @endcan
                  @endguest
                    
                  
                </ul> 
                  
            </div>
       </div>
   </div>
</x-layouts.main-layout>

