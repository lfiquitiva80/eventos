<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>

            <li class="active"><a href="{{ url('eventos_general') }}"><i class='fa fa-coffee'></i> <span>Eventos General</span></a></li>
            <li class="active"><a href="{{ url('participantesevento') }}"><i class='fa fa-certificate'></i> <span>Participantes Evento</span></a></li>
            <li class="active"><a href="{{ url('plantilla') }}"><i class='fa fa-industry'></i> <span>Plantilla</span></a></li>

            <li class="active"><a href="{{ url('inicio') }}"><i class='fa fa-rocket'></i> <span>Eventos Internos</span></a></li>


            <li class="active"><a href="{{ url('funcionarios') }}"><i class='fa fa-users'></i> <span>Funcionarios</span></a></li>

            <li class="active"><a href="{{ url('area_tematica') }}"><i class='fa fa-university'></i> <span>Area Temática</span></a></li>
            <li class="active"><a href="{{ url('municipios') }}"><i class='fa fa-map-o'></i> <span>Municipios</span></a></li>
            <li class="active"><a href="{{ url('departamento') }}"><i class='fa fa-map-pin'></i> <span>Departamentos</span></a></li>
            <li class="active"><a href="{{ url('paises') }}"><i class='fa fa-map'></i> <span>Paises</span></a></li>
         >
            
            


            <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>
            <li class="treeview">

                <a href="{{ url('eventos_general') }}"><i class='fa fa-link'></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ $url = route('xlsparticipantesall') }}">Excel de Eventos</a></li>
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
