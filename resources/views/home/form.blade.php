@extends('template.body')

@section('contents')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{url('/create-book')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{request('id')}}">
                        <label for="exampleInputEmail1">ชื่อหนังสือ</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp"
                               placeholder="กรอกชื่อหนังสือ" value="{{old('name')}}">
                        @if($errors->has('name'))
                            <div class="alert alert-danger">{{$errors->first('name')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">ผู้แต่ง</label>
                        <input name="author_name" type="text" class="form-control" id="exampleInputPassword1"
                               placeholder="กรอกชื่อผู้แต่ง"
                               value="{{old('author_name')}}">

                        @if($errors->has('author_name'))
                            <div class="alert alert-danger">{{$errors->first('author_name')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">สำนักพิมพ์</label>
                        <input name="publisher_name" type="text" class="form-control" id="exampleInputPassword1"
                               placeholder="กรอกชื่อสำนักพิมพ์"
                               value="{{old('publisher_name')}}">
                        @if($errors->has('publisher_name'))
                            <div class="alert alert-danger">{{$errors->first('publisher_name')}}</div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlSelect2">ประเภทหนังสือ</label>
                        <select name="category" class="form-control" id="exampleFormControlSelect2"
                                value="{{old('category')}}">
                            @foreach ($bookcat_array as $data)
                                <option value="{{ $data->id }}" >{{ $data->name }}</option>
                            @endforeach


                        </select>
                        @if($errors->has('category'))
                            <div class="alert alert-danger">{{$errors->first('category')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">จำนวนบท</label>
                        <input name="total_chapter" type="text" class="form-control"
                               value="{{old('total_chapter')}}" placeholder="กรอกจำนวนบท">
                        @if($errors->has('total_chapter'))
                            <div class="alert alert-danger">{{$errors->first('total_chapter')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">จำนวนหน้าหนังสือ</label>
                        <input name="total_page" type="text" class="form-control" value="{{old('total_page')}}"
                               placeholder="กรอกจำนวนหน้าหนังสือ">
                        @if($errors->has('total_page'))
                            <div class="alert alert-danger">{{$errors->first('total_page')}}</div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">เรื่องย่อ</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                                  rows="3">{{old('description')}}</textarea>
                        @if($errors->has('กรอกเรื่องย่อ'))
                            <div class="alert alert-danger">{{$errors->first('description')}}</div>
                        @endif
                    </div>


                    {{--<div class="form-check">--}}
                    {{--<input  name="status" class="form-check-input" type="radio"  id="exampleRadios1" value="active" checked>--}}
                    {{--<label class="form-check-label" for="exampleRadios1">--}}
                    {{--Active--}}
                    {{--</label>--}}
                    {{--</div>--}}
                    {{--<div class="form-check">--}}
                    {{--<input name="status" class="form-check-input" type="radio"  id="exampleRadios2" value="inactive">--}}
                    {{--<label class="form-check-label" for="exampleRadios2">--}}
                    {{--Inactive--}}
                    {{--</label>--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <label for="exampleFormControlFile1">ใส่รูปภาพหน้าปก</label>
                        <input type="file" name="cover_image" class="form-control-file" id="exampleFormControlFile1"
                               value="{{old('cover_image')}}">
                        @if($errors->has('cover_image'))
                            <div class="alert alert-danger">{{$errors->first('cover_image')}}</div>
                        @endif
                    </div>
                    @if(auth()->user()->role == 'admin')
                        <div class="form-group">
                            <label for="exampleFormControlFile1">เพิ่มไฟล์หนังสือ (เฉพาะไฟล์ประเภท PDF)</label>
                            <input type="file" name="pdf" class="form-control-file" id="pdf"
                                   value="{{old('pdf')}}">
                            @if($errors->has('pdf'))
                                <div class="alert alert-danger">{{$errors->first('pdf')}}</div>
                            @endif
                        </div>
                    @endif

                    <button type="submit" class="btn btn-dark">สร้างหนังสือ</button>


                </form>

            </div>
        </div>


    </div>


@endsection

<style>
    .card{
        margin-top: 30px;
    }
</style>