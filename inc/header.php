<header class="theme-dark bg-bgPrimary fixed top-0 w-full z-50">
        
        <div class="desktop-nav h-full wrap items-center justify-between hidden lg:flex bg-bgPrimary">
            <a class="logo h-32 flex-1" href="/">
                <?php include $home.'/svgs/market-20.svg'; ?>
            </a>
            <nav class="flex h-full items-center">
                <div class="user flex h-[40px] pl-[40px] items-center border-l">
                    <?php
                    if(!loggedin()){
                        ?>
                        <a class="text-light me-3" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                        <a data-eventlabel="navbar" href="/sign-up/" class="signup theme-light tertiaryButton-small w-128">Get started</a>
                        <?php
                    }
                    ?>
                </div>
            </nav>
        </div>

        <div class="mobile-nav bg-bgPrimary block lg:hidden">
            <nav class="flex h-full px-16 justify-between items-center relative">
                <div class="logo pointer-events-none z-10 h-16">
                    <a href="/" class="pointer-events-auto d-inline">
                        <?php include $home.'/svgs/market-20.svg'; ?>
                    </a>
                </div>

                <div class="flex items-center">
                <?php
                if(!loggedin()){
                    ?>
                    <a class="p-8 rounded-full" aria-label="Log in" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <img src="https://lp.stash.com/wp-content/themes/landing-pages/images/global/login.svg" alt="Login" height="15" width="15">
                    </a>
                    <a href="/sign-up/" class="signup mobile-nav-signup mx-16 tertiaryButton-small theme-light text-12 px-[13px] py-[6px]">Sign up</a>
                    <button id="hamburger" aria-label="Menu Toggle"></button>
                        <?php
                }
                ?>
                </div>
            </nav>
        </div>
    </header>