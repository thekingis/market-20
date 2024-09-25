<div class="position-fixed d-none d-lg-block bg-dark p-1 bottom-0" style="height:calc(100% - 55px);width: 17rem;">
    <div class="scrollbar" style="height:calc(100% - 95px);">
        <ul class="p-0 m-0">
            <?php
                echo $liElement;
            ?>
        </ul>
    </div>
    <div id="sidebar-footer" class="sidebar-footer p-1 border-top border-secondary">
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
</div>