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

    <title>BooK Can Say</title>
</head>

<body>
<div class="home">
    <main role="main" class="inner cover">
        <div class="cover-heading">
            <img src="<?php echo asset('img/logo.svg'); ?>" width="300" height="300" alt="Book can says">

            <p class="lead">หนังสือเป็นเพื่อนที่เงียบและมั่นคงมากที่สุด เป็นที่ปรึกษาที่เข้าถึงได้ง่ายและรอบรู้ที่สุด
                และเป็นครูที่อดทนที่สุด </p>
            <p class="role">

                <a href="/view-blind">
                    <button type="button" class="button">สำหรับผู้ฟัง</button></button>
                </a>


                <a href="/view-book">
                        <button type="button" class="button">จิตอาสา</button></button>

                    </a>



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
        background-image: url("https://images.unsplash.com/photo-1467245891624-dff3e966bcca?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80");
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        text-align: center;
        font-family: sans-serif;
        font-size: 18px;
    }

    .button {

        /*color: black;*/
        /*border: 2px solid #555555;*/
        /*padding: 16px 32px;*/
        /*text-align: center;*/
        /*text-decoration: none;*/
        /*display: inline-block;*/
        /*font-size: 22px;*/
        /*margin: 4px 2px;*/
        /*-webkit-transition-duration: 0.4s;*/
        /*!* Safari *!*/
        /*transition-duration: 0.4s;*/
        /*cursor: pointer;*/

        box-shadow: 2px 4px 0 2px rgba(0,0,0,0.1);
        border: .4em solid #DCDCDC;
        font-size: 1em;
        line-height: 1.1em;
        color: #000000;
        background-color: #ffffff;
        margin: auto;
        border-radius: 50%;
        height: 7em;
        width: 7em;
        position: relative;
        opacity:0.8;

    }

    .button:hover {
        color:#ffffff;
        background-color: #CFCFCF;
        text-decoration: none;
        border-color: #DCDCDC;

    }
    .button:visited {
        color:#ffffff;
        background-color: #CFCFCF;
        text-decoration: none;

    }
    .button-link-greater-than {
        font-size: 1em;
    }
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
