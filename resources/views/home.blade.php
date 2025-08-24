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
                <h3>Teste das  gates </h3> 
                <hr>
                   @can('user_is_admin') 
                       <p>somente admienistradores podem ver 
                   @endcan

                   @can('user_is_user') 
                       <p>somente usuarios comuns podem ver 
                   @endcan

                   @can('user_is_admin') 
                       <p>somente admienistradores podem ver<p>
                   @else 
                       <p> outra menagem caso não seja 
                   @endcan


                  @cannot('user_is_user')
                     <p> se for usuario comum não pode ver 
                  @endcannot

                  @canany(['user_is_admin','user_is_user'])
                       <p>usuarios e administradores podem ver, mas se tiver uma gate que não esteja no array 
                          não vai aparecer..<p>    
                  @endcanany
                  
            </div>
            
            <h3>Teste das coleções de permissão </h3>
            <hr>
            @can('user_can_insert')
                    <p>usuario pode inserir</p>
            @endcan

             @can('user_can_delete')
                    <p>usuario pode deletar</p>
             @endcan

              


       </div>
   </div>
</x-layouts.main-layout>

