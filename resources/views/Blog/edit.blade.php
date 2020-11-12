@extends('layouts.helper')

@section('modal-button')

@endsection

@section('content')

{{--<body style="background-color:#404040; color : white">--}}
<div class="container" style="background-color: rgba(0,0,0,0.5); color: white">
    <h2>Ubah data</h2>
    {{--    <h3></h3>--}}
    <form action="{{route('blog.update',$data->title)}}" method="post">
        @method('put')
        @csrf
        <div class="form-group" style="opacity: 1">
            <label for="recipient-name" class="col-form-label">title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$data->title}}">
        </div>
        <div class="form-group" style="opacity: 1">
            <label for="message-text" class="col-form-label">author:</label>
            <input type="text" class="form-control" id="author" name="author" value="{{$data->author}}">
        </div>
        <div class="form-group">
            <label for="message-text" class="col-form-label">content:</label>
            <textarea id="summernote" name="content">{{$data->content}}</textarea>
        </div>
        <div class="modal-body">
            <input type="submit" name="" value="submit" class="btn btn-primary">
        </div>
    </form>
</div>

<script>
    // $('#myModal').on('shown.bs.modal', function() {
    $('#summernote').summernote();
    // })
</script>

@endsection
