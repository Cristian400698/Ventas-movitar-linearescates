<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
    <div class="logo">
        <a href="/home" class="simple-text logo-normal"><img style="width:50px" src="{{ asset('img/logo-mini.png') }}"
                alt="">
            {{ __('GESTOR DE VENTAS') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            
                <li class="nav-item{{ $activePage == 'porta' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('inicio.index') }}">
                        <i class="material-icons">add_ic_call</i>
                        <p>{{ __('Portabilidad') }}</p>
                    </a>
                </li>

                <li class="nav-item{{ $activePage == 'tenten' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('iniciotenten.index') }}">
                        <i class="material-icons">signal_cellular_alt</i>
                        <p>{{ __('Ten Ten') }}</p>
                    </a>
                </li>

                <li class="nav-item{{ $activePage == 'RedesSociales' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('inicioredes.index') }}">
                        <i class="material-icons">wifi</i>
                        <p>{{ __('Redes Sociales') }}</p>
                    </a>
                </li>

                <li class="nav-item{{ $activePage == 'linearescate' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('linearescate.index') }}">
                        <i class="material-icons">support</i>
                        <p>{{ __('Linea de rescate') }}</p>
                    </a>
                </li>

                <li class="nav-item{{ $activePage == 'marketing' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('marketing.index') }}">
                        <i class="material-icons">storefront</i>
                        <p>{{ __('Marketing') }}</p>
                    </a>
                </li>

                <li class="nav-item{{ $activePage == 'comunidad' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('iniciocomunidad.index') }}">
                        <i class="material-icons">groups</i>
                        <p>{{ __('Comunidad Empresarial') }}</p>
                    </a>
                </li>
            
            
                <li class="nav-item{{ $activePage == 'Upgrade' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('inicioupgrade.index') }}">
                        <i class="material-icons">upgrade </i>
                        <p>{{ __('Upgrade') }}</p>
                    </a>
                </li>
            
                <li class="nav-item{{ $activePage == 'Prepost' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('inicioprepost.index') }}">
                        <i class="material-icons">av_timer</i>
                        <p>{{ __('Prepost') }}</p>
                    </a>
                </li>
            
                <li class="nav-item{{ $activePage == 'Fija' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('iniciofija.index') }}">
                        <i class="material-icons">phone</i>
                        <p>{{ __('Fija') }}</p>
                    </a>
                </li>
            
                <li class="nav-item{{ $activePage == 'linea nueva' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('lineanueva.create') }}">
                        <i class="material-icons">perm_phone_msg</i>
                        <p>{{ __('Linea nueva') }}</p>
                    </a>
                </li>
            
                <li class="nav-item{{ $activePage == 'phoenix' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('phoenix.create') }}">
                        <i class="material-icons">phone_iphone</i>
                        <p>{{ __('Phoenix') }}</p>
                    </a>
                </li>
            
                <li class="nav-item{{ $activePage == 'rechazos' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('rechazos.create') }}">
                        <i class="material-icons">sentiment_very_dissatisfied</i>
                        <p>{{ __('Rechazos') }}</p>
                    </a>
                </li>
            
                <li class="nav-item{{ $activePage == 'cobertura' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('cobertura.index') }}">
                        <i class="material-icons">map</i>
                        <p>{{ __('Cobertura') }}</p>
                    </a>
                </li>
            
            <li class="nav-item{{ $activePage == 'altoriesgo' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('altoriesgo.index') }}">
                    <i class="material-icons">warning_amber</i>
                    <p>{{ __('Alto Riesgo') }}</p>
                </a>
            </li>
            
                <li class="nav-item{{ $activePage == 'Plan' ? ' active' : '' }}">
                    <a class="nav-link" href="{{route('planes.index')}}">
                        <i class="material-icons">post_add</i>
                        <p>{{ __('Agregar Nuevo Plan') }}</p>
                    </a>
                </li>

                <!--INICIO INFORME -->
                <li class="nav-item{{ $activePage == 'informe' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('informe.index')}}">
                      <i class="material-icons">analytics</i>
                      <p>{{ __('Informe Ventas') }}</p>
                  </a>
              </li>
                <!-- FIN INFORME -->
           
              {{-- Supervisor --}}
              
              <li class="nav-item{{ $activePage == 'supervisor' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('superpersonal.index')}}">
                      <i class="material-icons">transcribe</i>
                      <p>{{ __('Control Personal') }}</p>
                  </a>
              </li>
          
                <hr>
                <li class="nav-item{{ $activePage == 'Historial' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('historial.index') }}">
                        <i class="material-icons">history</i>
                        <p>{{ __('Historial') }}</p>
                    </a>
                </li>
            
                <hr>
                <li class="nav-item{{ $activePage == 'usuarios' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('users') }}">
                        <i class="material-icons">people</i>
                        <p>{{ __('Usuarios') }}</p>
                    </a>
                </li>
            
           
                <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('roles.index') }}">
                        <i class="material-icons">supervisor_account</i>
                        <p>{{ __('Roles') }}</p>
                    </a>
                </li>
            
          
                <li class="nav-item{{ $activePage == 'Permissions' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('permissions.index') }}">
                        <i class="material-icons">bubble_chart</i>
                        <p>{{ __('Permisos') }}</p>
                    </a>
                </li>
            
        </ul>
    </div>
</div>
