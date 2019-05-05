@extends('template.body')

@section('contents')

    <div class="container">
        <div class="item">
            <p class="starbutton">
                <a href="#" class="btn btn-lg btn-secondary">เริ่มอัดเสียง</a>
            </p>
            <p class="pausebutton">
                <a href="#" class="btn btn-lg btn-secondary">หยุดชั่วคราว</a>
            </p>
            <p class="stopbutton">
                <a href="#" class="btn btn-lg btn-secondary">หยุดอัดเสียง</a>
            </p>
            <p class="exbutton">
                <a href="#" class="btn btn-lg btn-secondary">ฟังเสียงตัวอย่าง</a>
            </p>
        </div>
    </div>

    <div class="upload">
        <button class="btn rounded-0 fixed-bottom w-100 text-center button-primary pt-30 pb-15">
            <span>อัพโหลดเสียง</span>
        </button>
    </div>



    @endsection

