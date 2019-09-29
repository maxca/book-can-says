@extends('template.body')

@section('contents')
    <div class="container">
        <form action="{{url('/edit-book')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}


            <div class="form-group">
                <label for="exampleInputEmail1">Book name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Enter book name" value="{{$data->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Publisher</label>
                @foreach($data->publisher as $publisher)
                <input name="publisher_name" type="text" class="form-control" id="exampleInputPassword1"
                       placeholder="Publisher"
                       value="{{$publisher->name}}">
                @endforeach
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Author</label>
                @foreach($data->authors as $author)
                <input name="author_name" type="text" class="form-control" id="exampleInputPassword1"
                       placeholder="author"
                       value="{{$author->name}}">
                @endforeach
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect2">Category</label>
                <select name="category" class="form-control" id="exampleFormControlSelect2">
                    <option value="ท่องเที่ยว">ท่องเที่ยว</option>
                    <option value="เกษตร">เกษตร</option>
                    <option value="กีฬา">กีฬา</option>
                    <option value="อาหาร">อาหาร</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Total page</label>
                <input name="total_page" type="number" class="form-control" placeholder="total page" value="{{$data->total_page}}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Total chapter</label>
                <input name="total_page" type="number" class="form-control" placeholder="total chapter"
                       value="{{$data->total_chapter}}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                          rows="3">{{$data->description}}</textarea>
            </div>


            <div class="form-check">
                <input name="status" class="form-check-input" type="radio" id="exampleRadios1" value="active" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input name="status" class="form-check-input" type="radio" id="exampleRadios2" value="inactive">
                <label class="form-check-label" for="exampleRadios2">
                    Inactive
                </label>
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">ใส่รูปภาพ</label>
                <input type="file" name="cover_image" class="form-control-file" id="exampleFormControlFile1"
                       value="{{old('cover_image')}}">
                @if($data->has('cover_image'))
                    <div class="alert alert-danger">{{$data->first('cover_image')}}</div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection