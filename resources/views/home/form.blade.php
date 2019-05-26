@extends('template.body')

@section('contents')
    <div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{url('/create-book')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="hidden" name="id" value="{{request('id')}}">
                    <label for="exampleInputEmail1">Book name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Enter book name" value="{{old('name')}}">

                    @if($errors->has('name'))
                        <div class="alert alert-danger">{{$errors->first('name')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Publisher</label>
                    <input name="publisher_name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Publisher"
                           value="{{old('publisher_name')}}" >
                    @if($errors->has('publisher_name'))
                        <div class="alert alert-danger">{{$errors->first('publisher_name')}}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Author</label>
                    <input name="author_name" type="text" class="form-control" id="exampleInputPassword1" placeholder="author"
                           value="{{old('author_name')}}">

                    @if($errors->has('author_name'))
                        <div class="alert alert-danger">{{$errors->first('author_name')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Category</label>
                    <select name="category"  class="form-control" id="exampleFormControlSelect2" value="{{old('category')}}">
                        <option value="ท่องเที่ยว">ท่องเที่ยว</option>
                        <option value="เกษตร">เกษตร</option>
                        <option value="กีฬา">กีฬา</option>
                        <option value="อาหาร">อาหาร</option>

                    </select>
                    @if($errors->has('category'))
                        <div class="alert alert-danger">{{$errors->first('category')}}</div>
                    @endif
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">Total page</label>
                    <input name="total_page" type="text" class="form-control" value="{{old('total_page')}}"placeholder="total page" >
                    @if($errors->has('total_page'))
                        <div class="alert alert-danger">{{$errors->first('total_page')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Total </label>
                    <input name="total_chapter" type="text" class="form-control"
                           value="{{old('total_chapter')}}" placeholder="total chapter" >
                    @if($errors->has('total_chapter'))
                        <div class="alert alert-danger">{{$errors->first('total_chapter')}}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">
                {{old('description')}}
            </textarea>
                    @if($errors->has('description'))
                        <div class="alert alert-danger">{{$errors->first('description')}}</div>
                    @endif
                </div>


                <div class="form-check">
                    <input  name="status" class="form-check-input" type="radio"  id="exampleRadios1" value="active" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Active
                    </label>
                </div>
                <div class="form-check">
                    <input name="status" class="form-check-input" type="radio"  id="exampleRadios2" value="inactive">
                    <label class="form-check-label" for="exampleRadios2">
                        Inactive
                    </label>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">ใส่รูปภาพ</label>
                    <input type="file" name="cover_image" class="form-control-file" id="exampleFormControlFile1" value="{{old('cover_image')}}">
                    @if($errors->has('cover_image'))
                        <div class="alert alert-danger">{{$errors->first('cover_image')}}</div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">สร้างหนังสือ</button>
                <a href ="/view-new-record">
                <button type="submit" class="btn btn-primary">อัดเสียง</button>
                </a>
            </form>
        </div>
    </div>

    </div>


@endsection
