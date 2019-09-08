@include('template.header')
<div id="spinner"></div>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/index">
        <img src="<?php echo asset('img/logo.svg'); ?>" width="40" height="40" alt="Book can says">

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/view-book">หนังสือน่าอ่าน <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ประเภทหนังสือ
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">สังคม</a>
                    <a class="dropdown-item" href="#">การเมือง</a>
                    <a class="dropdown-item" href="#">นิยาย</a>
                    <a class="dropdown-item" href="#">เทคโนโลยี</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/view-form-create-book">สร้างหนังสือ</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">กิจกรรม</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="ค้นหา" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ค้นหา</button>
        </form>
    </div>
</nav>

<div id="app">
    @yield('contents')

</div>


</body>
@include('template.footer')
