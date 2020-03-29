@extends('layouts.app')

@section('content')
    <div style="position: relative;top: 80px;" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post New Picture</div>

                    <div class="card-body">
                        <form method="post" action="/posts" enctype="multipart/form-data">
                            @csrf

                            <div style="position: relative; right: 50px;" class="form-group row">
                                <label style="position: relative; right: 9px;" for="image" class="col-md-4 col-form-label text-md-right">Post a Picture</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" 
                                    style="border:0px;position: relative;right: -70px;"class="form-control @error('image') is-invalid @enderror" name="image"  >

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div style="position: relative; right: 50px;" class="form-group row">
                                <label for="caption" class="col-md-4 col-form-label text-md-right">Picture Caption</label>

                                <div class="col-md-6">
                                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                                    @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div style="position: relative;left: 50px;" class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Post
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
