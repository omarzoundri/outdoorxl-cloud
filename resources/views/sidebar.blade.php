

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
                <p class="authname">{!! Auth::user()->name !!}</p>
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


        <div id="links"> 
            <ul class="sidebar-menu">
                <li class="header">Dashboard</li>
                <li><a href="/myschedule"><span>Mijn Rooster</span></a></li>
                <li><a href="/nieuws"><span>Nieuws</span></a></li>
                @if (Auth::user()->rank_id == 2)
                <li><a href="/nieuws-toevoegen"><span>Nieuws Toevoegen</span></a></li>

                <li class="header">Beheer</li>
                <li><a href="/medewerkers"><span>Medewerkers</span></a></li>
                <li><a href="/medewerker-toevoegen"><span>Medewerker Toevoegen</span></a></li>
                <li><a href="/afdelingen"><span>Afdelingen</span></a></li>
                <li><a href="/afdeling-toevoegen"><span>Afdeling Toevoegen</span></a></li>
                @endif
                <li class="header">Planning</li>
                <li><a href="/beschikbaarheid"><span>Beschikbaarheid</span></a></li>
                @if (Auth::user()->rank_id == 2)
                <li><a href="/medewerkers-inplannen"><span>Medewerkers inplannen</span></a></li>
                @endif

                <li class="header">Dag Uren</li>
                <li><a href="/dagelijkseuren"><span>Dag Uren Invoeren</span></a></li>

                <li class="header">Profiel</li>
                <li><a href="/editprofile/{!! Auth::user()->id !!}"><span>Profiel wijzigen</span></a></li>

                <li class="header"><a href="/auth/logout">Log uit</a></li>
            </ul><!-- /.sidebar-menu -->
        </div>

        <ul class="sidebar-menu">
            <li class="header">Dashboard</li>
            <li id="myschedule"><a href="/myschedule">Mijn Rooster</a></li>
            <li id="nieuws"><a href="/nieuws"><span>Nieuws</span></a></li>
            @if (Auth::user()->rank_id == 2)
            <li id="nieuws-toevoegen"><a href="/nieuws-toevoegen"><span>Nieuws Toevoegen</span></a></li>

            <li class="header">Beheer</li>
            <li id="dagelijkse-rooster"><a href="/dagelijkse-rooster"><span>Rooster</span></a></li>
            <li id="medewerkers"><a href="/medewerkers"><span>Medewerkers</span></a></li>
            <li id="medewerker-toevoegen"><a href="/medewerker-toevoegen"><span>Medewerker Toevoegen</span></a></li>
            <li id="afdelingen"><a href="/afdelingen"><span>Afdelingen</span></a></li>
            <li id="afdeling-toevoegen"><a href="/afdeling-toevoegen"><span>Afdeling Toevoegen</span></a></li>
            @endif
            <li class="header">Planning</li>
            <li id="beschikbaarheid"><a href="/beschikbaarheid"><span>Beschikbaarheid</span></a></li>
            @if (Auth::user()->rank_id == 2)
            <li id="medewerkers-inplannen"><a href="/medewerkers-inplannen"><span>Medewerkers inplannen</span></a></li>
            @endif

            <li class="header">Dag Uren</li>
            <li id="dagelijkseuren"><a href="/dagelijkseuren"><span>Dag Uren Invoeren</span></a></li>

            <li class="header">Profiel</li>
            <li id="editprofile"><a href="/editprofile"><span>Profiel wijzigen</span></a></li>

            <li class="header"><a href="/auth/logout">Log uit</a></li>
        </ul><!-- /.sidebar-menu -->
        <script>
        jQuery.noConflict()( function(){
            var $ = jQuery;
            var path = window.location.pathname;
            $('ul.sidebar-menu li').each(function() {
                if( path === "/" + this.id){ 
                    $(this).addClass('active'); 
                } else if( path === "/" ) {
                    $('#home').addClass('active'); 
                }
            }); 
        });
        </script>

    </section>
    <!-- /.sidebar -->
</aside>


