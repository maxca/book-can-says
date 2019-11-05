@extends('template.body')

@section('contents')
    <div class="container">
        <form action="{{url('/edit-book')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

        <input name="id" type="hidden" value="{{$data->id}}"/>
            @php

                $authorName = implode(",", $data->authors->pluck('name')->toArray());
                $publishName = implode(",", $data->publisher->pluck('name')->toArray());
            @endphp


            <div class="form-group">
                <label for="exampleInputEmail1">ชื่อหนังสือ</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       value="{{$data->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">สำนักพิมพ์</label>
                    <input name="publisher_name" type="text" class="form-control" id="exampleInputPassword1"
                           value="{{$publishName}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">ผู้แต่ง</label>

                <input name="author_name" type="text" class="form-control" id="exampleInputPassword1"
                       value="{{$authorName}}">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect2">หมวดหมู่หนังสือ</label>
                <select name="category" class="form-control" id="exampleFormControlSelect2"
                        value="{{old('category')}}">
                    @foreach ($bookcat_array as $data)
                        <option value="{{ $data->id }}" >{{ $data->name }}</option>
                    @endforeach
                </select>

            </div>


            {{--<div class="form-group">--}}
                {{--<label for="exampleInputPassword1">Total page</label>--}}

                {{--<input name="total_page" type="number" class="form-control" placeholder="total page" value="{{$data->total_page}}">--}}
                {{--{{dd($data->total_page)}}--}}

            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--<label for="exampleInputPassword1">Total chapter</label>--}}
                {{--<input name="total_page" type="number" class="form-control" placeholder="total chapter"--}}
                       {{--value="{{$data->total_chapter}}">--}}
                {{--{{dd($data->total_chapter)}}--}}
            {{--</div>--}}

            <div class="form-group">
                <label for="exampleInputPassword1">เรื่องย่อหนังสือ</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                          rows="3">{{$data->description}}</textarea>
            </div>
            {{--{{dd($data->description)}}--}}


            <div class="form-check">
                <input name="status" class="form-check-input" type="hidden" id="exampleRadios1" value="active" checked>
                {{--<label class="form-check-label" for="exampleRadios1">--}}
                    {{--Active--}}
                {{--</label>--}}
            </div>
            <div class="form-check">
                <input name="status" class="form-check-input" type="hidden" id="exampleRadios2" value="inactive">
                {{--<label class="form-check-label" for="exampleRadios2">--}}
                    {{--Inactive--}}
                {{--</label>--}}
            </div>



            <button type="submit" class="btn btn-dark">แก้ไขข้อมูลหนังสือ</button>
        </form>
    </div>
@endsection

