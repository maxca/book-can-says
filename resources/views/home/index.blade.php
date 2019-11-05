<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <title>BooK Can Say</title>
</head>

<body>
<div class="home">
    <main role="main" class="inner cover">
        <div class="cover-heading">
            <img alt="ยินดีต้อนรับเข้าสู่เBook can say" src="<?php echo asset('img/logo_bg_white.svg'); ?>" width="300"
                 height="300" alt="Book can says">

            <p class="role">
            <div class="row c">
                <div class="col">
                    <a href="/view-blind">
                        <button alt="สำหรับผู้ที่ต้องการฟังหนังสือเสียง" type="button" class="btn btn-dark circle">ผู้ฟัง</button>
                        </button>
                    </a>

                </div>
                <div class="col">
                    <a href="/view-book">
                        <button alt="สำหรับจิตอาสา" type="button" class="btn btn-dark circle">จิตอาสา</button>
                        </button>

                    </a>
                </div>
            </div>

            </p>

        </div>
    </main>
</div>


<style>
    .home {
        margin: 0 auto;
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        text-align: center;
        font-family: Kanit;
        font-size: 18px;
    }

    .circle {
        border-radius: 100%;
        width: 120px;
        height: 120px;
        font-size: 20px;

    }

    /*.c {*/
        /*justify-content: center;*/
    /*}*/

</style>


</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<div class="container">
    @yield('contents')

</div>

</body>

</html>
