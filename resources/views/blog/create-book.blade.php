@extends('template.body')

@section('contents')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">cover</th>
            <th scope="col">name</th>
            <th scope="col">category</th>
            <th scope="col">publisher</th>
            <th scope="col">author</th>
            <th scope="col">created</th>
            <th scope="col">action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($data as $key => $item)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$item->name}}</td>
                <td><c alt="" width="80" height="80"></td>
                <td>{{$item->category->name}}</td>
                <td>{{$item->publisher->name}}</td>
                <td>{{$item->author->name}}</td>
                <td>{{$item->created_at}}</td>
                <td>
                    <button class="btn-sm btn btn-success" href="{{url('view-edit-form').'?id='.$item->id}}"> edit
                    </button>
                    {{--                <button class="btn-sm btn btn-success" onclick="{{url('view-edit-form').'?id='.$item->id}}"> edit </button>--}}
{{--                    <button class="btn-sm btn btn-danger" onclick="confirmDelete({{$item->id}})">delete</button>--}}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="row">
        {{$data->render()}}

    </div>
@endsection
{{--<script>--}}
{{--    function confirmDelete(id) {--}}
{{--        if (confirm('do you want to delete ?')) {--}}
{{--            window.location.href = "{{route('delete.book')}}" + '?id=' + id--}}
{{--        } else {--}}
{{--            return false;--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
