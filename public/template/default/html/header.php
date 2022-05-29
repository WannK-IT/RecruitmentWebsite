<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand" href="<?= URL::addLink($this->arrParam['module'], 'index', 'index')?>">
                <span><i class="fas fa-cubes fa-lg mr-3" style="color: #ff6219;"></i>&nbsp;<b>JobHT</b></span>
            </a>

            <!-- Toggle hide navbar when resize -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Navbar -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ms-2">
                        <a class="nav-link" style="color: #2bb5cf" href="#"><i class="fa-solid fa-briefcase"></i>&nbsp;Ngành nghề</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link" href="#"><i class="fa-solid fa-building"></i>&nbsp;Công ty</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link" href="#"><i class="fa-solid fa-user-tie"></i>&nbsp;Tạo CV</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link" href="#"><i class="fa-solid fa-newspaper"></i>&nbsp;Blog</a>
                    </li>
                </ul>

                <!-- Right Navbar -->
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item me-1">
                            <a class="nav-link" href="#">Đăng nhập</a>
                        </li>

                        <li class="nav-item dropdown me-1">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                VI
                            </a>
                            <ul class="dropdown-menu" style="min-width: 6rem" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">VI</a></li>
                                <li><a class="dropdown-item" href="#">EN</a></li>
                            </ul>
                        </li>

                        <li class="nav-item me-1 rounded" style="background-color: #2bb5cf">
                            <a class="nav-link text-white" href="#">Nhà tuyển dụng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>