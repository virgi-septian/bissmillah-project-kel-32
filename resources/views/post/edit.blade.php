@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary bg-graytext-light">
                    <div class="card-header mb-3 border-bottom border-1">Data Posts </div>

                    <div class="card-body">
                        <form action="{{ route('post.update', $post->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{ $post->title }}"
                                    class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Content</label>
                                <textarea type="text"name="content" class="form-control @error('content') is-invalid @enderror">{{ $post->content }}
                                </textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <center>
                                <div class="btn-group mt-4 pt-5" role="group" aria-label="Basic mixed styles example">
                                    <button type="submit" name="save" class="btn btn-primary">Simpan </button>
                                    <a href="{{ route('post.index') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection