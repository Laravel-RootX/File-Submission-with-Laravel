<div id="sidebar" class="sidebar responsive ace-save-state">
    <ul class="nav nav-list">
        <li class="">
            <a href="{{ url('dashboard') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li> 
         <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-file"></i>
                    <span class="menu-text"> File </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                        <li class="">
                            <a href="{{ url('files') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Files List
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="{{ url('files/create') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Add File
                            </a>

                            <b class="arrow"></b>
                        </li>
                </ul>
            </li>
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
           data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
