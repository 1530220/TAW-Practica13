  <aside class="main-sidebar">

    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../media/system/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrador</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


    
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        
        <li><a href="?index.php"><i class="fa fa-th"></i> <span>Inicio</span></a></li>


        <li class="treeview">
          <a href="#"><i class="fa fa-soccer-ball-o"></i> <span>Deportes</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?action=listaDeporte"><i class="fa fa-list-ol"></i>Ver Deportes</a></li>
            <li><a href="?action=agregarDeporte"><i class="fa fa-plus-square"></i>Agregar Deporte</a></li>
          </ul>
        </li>
        

        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Equipos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?action=listaEquipo"><i class="fa fa-list-ol"></i>Ver Equipos</a></li>
            <!-- Se redirecciona al index con GET correspondinte para que el modelo incluya lo que tenga que incluir -->
            <li><a href="?action=agregarEquipo"><i class="fa fa-plus-square"></i>Registrar Equipo</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#"><i class="fa fa-user"></i> <span>Jugadores</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?action=verJugadores"><i class="fa fa-list-ol"></i>Ver Jugadores</a></li>
            <li><a href="?action=registrarJugador_deporte"><i class="fa fa-plus-square"></i>Registrar Jugador</a></li>
          </ul>
        </li>
      
        
      </ul>
      
    </section>
    
  </aside>


