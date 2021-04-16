
<header class="px-3 py-2 bg-dark text-white viewport-header">

  <div class="container justify-content-md-center">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start ">

      @guest
      <a  href="/" class="d-flex align-items-right col-8  text-white text-decoration-none ">
        <img src="{{url('css/img/icon.ico')}}" class="rounded-circle z-depth-0"  height="50">
      </a>
      @else
      <a  href="/logged" class="d-flex align-items-right col-2  text-white text-decoration-none ">
        <img src="{{url('css/img/icon.ico')}} " class="rounded-circle z-depth-0"  height="50">
      </a>
      @endguest

      
        @guest
        
          
            
            @else
            <div class="centercontent col-2 " >
            <a href="/logged" class="nav-link text-white"  >
            <ion-icon class="bi d-block mx-auto mb-1 "  width="24" height="24" name="home-outline"></ion-icon>
            Vista General
          </a>
         </div>
        <div class="centercontent col-2 ">
          <a  href="{{route('proyectos.index') }}" class="nav-link text-white ">
            <ion-icon  class="bi d-block mx-auto mb-1" width="24" height="24" name="folder-outline"></ion-icon>
            Proyectos
          </a>
        </div>
        <div class="centercontent col-2 ">
          <a href="{{route('tareas.index') }}" class="nav-link text-white ">
            <ion-icon class="bi d-block mx-auto mb-1" width="24" height="24" name="clipboard-outline"></ion-icon>
            Tareas
          </a>
        </div>
        @endguest
        @guest
         <div class=" col-2">
          <a  href="{{route('register') }}" class="nav-link text-white ">
         <button type="button" class="btn buttonsregister" ><ion-icon name="add-circle-outline" style="transform: translate(0%, 10%);"></ion-icon> Sign-up</button>
       </a>
        </div>
         <div class="col-2">
          <a  href="{{route('login') }}"class="nav-link text-white ">
            <button type="button" class="btn  buttonslogin" ><ion-icon name="log-in-outline"  style="transform: translate(0%, 10%);" ></ion-icon> Login</button>
          </a>
        </div>
        
        @else
          </ul>
        <div class="dropdown col-2 centercontent" style="text-align: right;">
  <button class="btn buttonslogin dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" style="border-radius: 20px;">
    {{ Auth::user()->name }}
  </button>
  
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
   
  </ul>
</div>

    
        @endguest
       
     
      
    </div>
  </div>
</header>
