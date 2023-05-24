<style>
  .nav-link{
    color: white !important; 
  }
</style>
<nav class="navbar navbar-expand-lg bg-danger navbar-dark mainmenu" >
 <div class="container">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @foreach ($list_menu as $rowmenu)
                 
        <x-menu-item :menu="$rowmenu"/>
        @endforeach
    
       
      </ul>
      
    </div>
  </div>
 </div>
</nav>