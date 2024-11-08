<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{ asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Liberty+</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Agendamentos/Consultas -->
                <li class="nav-item">
                    <a href="{{ route('consultas.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>Agendamentos/Consultas</p>
                    </a>
                </li>

                <!-- Especialidades -->
                <li class="nav-item">
                    <a href="{{ route('especialidades.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-stethoscope"></i>
                        <p>Especialidades</p>
                    </a>
                </li>

                <!-- Médicos -->
                <li class="nav-item">
                    <a href="{{ route('medicos.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>Médicos</p>
                    </a>
                </li>

                <!-- Pacientes -->
                <li class="nav-item">
                    <a href="{{ route('pacientes.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Pacientes</p>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="nav-link p-0">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block text-left">
                            <i class="nav-icon fas fa-sign-out-alt"></i> <!-- Ícone de logout -->
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
                
            </ul>
        </nav>
    </div>
</aside>
