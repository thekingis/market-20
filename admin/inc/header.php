<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light border-bottom border-secondary" style="z-index: 900 !important;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="https://admin.market-20.com/dashboard/">
            <img src="https://market-20.com/svgs/market-20-black.svg" style="width:100px !important" class="d-inline-block align-text-center">
            Admin
        </a>
        <button class="navbar-toggler" type="button" style="padding: 5px;" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="font-size: 0.8em;"></span>
        </button>
        <div class="w-100 bg-dark scrollbar height-max-450">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto align-text-center d-lg-none">
                    <?php
                        $activeClassX = $rolePath == 'dashboard' ? 'sidebar-link-active' : 'sidebar-link-inactive';
                        $liElement = '
                            <li class="sidebar-link '.$activeClassX.'">
                                <a href="http://admin.market-20.com/dashboard/" deactivated="false">Dashboard</a>
                            </li>';
                        $spotIndex = 0;
                        while($roleSql = mysqli_fetch_array($roleQuery)){
                            $id = $roleSql['id'];
                            $role = $roleSql['role'];
                            $urlPath = $roleSql['urlPath'];
                            $currentPath = '/'.$rolePath.'/';
                            $isActivePath = $urlPath == $currentPath;
                            $deactivated = $roleSql['deactivated'];
                            $url = 'http://admin.market-20.com'.$urlPath;
                            $canSpot = (int) $id == 3 || (int) $id == 4;
                            $queueCount = getQueueCount($spotIndex, $canSpot);
                            $activeClass = $isActivePath ? 'sidebar-link-active' : 'sidebar-link-inactive';

                            $liElement .= '<li class="sidebar-link '.$activeClass.'">';
                            $liElement .= '<a href="'.$url.'" deactivated="'.$deactivated.'">';
                            $liElement .= $role;
                            $liElement .= $queueCount == 0 ? '' : '<span class="position-absolute end-0 me-2 translate-middle-x badge rounded-circle bg-danger text-white">'.$queueCount.'</span>';
                            $liElement .= '</a>';
                            $liElement .= '</li>';
                            if($canSpot)
                                $spotIndex++;
                        }
                        echo $liElement;
                    ?>
                    <div class="border-top border-info">
                        <ul class="p-0 m-0">
                            <?php
                                $activeClassY = $rolePath == 'change-password' ? 'sidebar-link-active' : 'sidebar-link-inactive';
                            ?>
                            <li class="sidebar-link <?php echo $activeClassY; ?>">
                                <a href="http://admin.market-20.com/change-password/" deactivated="false"><i class="bi bi-sliders me-2"></i>Change Password</a>
                            </li>
                            <li class="sidebar-link sidebar-link-inactive">
                                <a href="http://admin.market-20.com/logout/" deactivated="false"><i class="bi bi-box-arrow-left me-2"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>