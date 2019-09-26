@extends('template.body')
@section('contents')

    <div class="container">
<div class="card">

        <div class="row mt-2">

            <div class="col-1"></div>
            <div class="col-1 mt-5 ">
                <div class="row mb-3 border-bottom">
                <h5 class="title" align="left">ลำดับ</h5>
                </div>

                <div class="row mb-5 p-2 border-bottom">
                <label class="text-left">
                    1.
                </label>
                </div>
            </div>

            <div class="col-6 mt-5">
                <div class="row mb-3 border-bottom">
                <h5 class="title" align="left">ชื่อตอน</h5>
                </div>

                <div class="row mb-5 p-2 border-bottom">
                <label class="text-left">
                        X1 Choseungyoun
                    </label>
                </div>
            </div>

            <div class="col-3 mt-5">
                <div class="row mb-3 border-bottom">
                <h5 class="" align="left">Action</h5>
                </div>

                <div class="row mb-3 border-bottom">
                <div class="pb-2 mb-1 ">
                    <button class="btn btn-outline-success" type="button">เผยแพร่</button>
                    <button class="btn btn-outline-primary" type="button">ห้ามผยแพร่</button>
                </div>

            </div>
        </div>
        </div>
        </div>
    <div class="col-1"></div>


</div>

@endsection