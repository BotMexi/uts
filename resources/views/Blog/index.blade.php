@extends('layouts.helper')

@section('modal-button')
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-outline-info " data-toggle="modal" data-target="#myModal">Tambah
                Berita
            </button>
        </li>
    </ul>
@endsection

@section('content')
    {{--container--}}
    <div class="container">
        <div class="row">
            @foreach($data as $d)
                <div class="card col-md-12" style="width: 18rem; background-color: transparent;">
                    <div class="card-body" style="background-color: rgba(0,0,0,0.5); color: white">
                        <h5 class="card-title" style="color: white">{{ $d->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-secondary">{{ $d->author }} || {{ $d->datetime }}</h6>
                        <p class="text-justify text-white">{!! Str::limit($d->content,500) !!}</p>
                        {{--                        <div class="container">--}}
                        <div class="row">
                            <div class="col-auto mr-auto">
                                <a class="btn btn-block" style="color: lime" href="{{route('blog.show', $d->title)}}">Baca
                                    selengkapnya</a>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-warning d-inline " href="{{route('blog.edit', $d->title)}}">Edit</a>
                                <form class="d-inline" action="{{route('blog.destroy',$d->title)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger " type="submit" id="submit">Hapus</button>
                                </form>
                            </div>
                        </div>
                        {{--                        </div>--}}
                        {{--                    <a href="{{route('blog.destroy', $d->title)}}" class="card-link">Hapus</a>--}}
                    </div>
                    <br>
                </div>
            @endforeach
        </div>
    </div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content bg">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                {{-- Create Form --}}
                <form action="{{route('blog.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label class="col-form-label">Judul</label>
                        <input class="form-control" type="text" name="title">
                    </div>
                    <div class="modal-body">
                        <label class="col-form-label">Penulis</label>
                        <input class="form-control" type="text" name="author">
                    </div>
                    <div class="modal-body">
                        <label class="col-form-label">Konten</label>
                        <textarea id="summernote" name="content"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#summernote').summernote({
                placeholder: 'write here...'
            });
        });
    </script>

@endsection

