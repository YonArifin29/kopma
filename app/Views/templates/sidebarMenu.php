<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <?php
        switch ($jenisLogin) {
            case '1':
                echo $this->include('templates/sidebarMenuAdmin');
                break;
            case '2':
                echo $this->include('templates/sidebarMenuPenjual');
                break;
            default:
                "";
                break;
        }
        ?>
    </ul>
</nav>