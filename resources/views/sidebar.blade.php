<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/docs/dist/img/gaben.jpg") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{!! Auth::user()->name !!}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
          <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Dashboard</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="#"><span>Home</span></a></li>
            <li><a href="#"><span>Nieuws</span></a></li>
            @if (Auth::user()->rank_id == 2)
            <li class="header">Beheer</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="/medewerkers"><span>Medewerkers</span></a></li>
            <li><a href="/medewerker-toevoegen"><span>Medewerker Toevoegen</span></a></li>
            <li><a href="/afdelingen"><span>Afdelingen</span></a></li>
            <li><a href="/afdeling-toevoegen"><span>Afdeling Toevoegen</span></a></li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
