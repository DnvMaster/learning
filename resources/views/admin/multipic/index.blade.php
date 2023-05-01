@extends('admin.admin_master')

@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Изображение</div>
                        <div class="card-group">
                            @foreach($images as $multi)
                                <div class="col-md-3 mt-5">
                                    <img src="{{ asset($multi->image) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">Добавить Изображение</div>
                        <div class="card-body">


                            <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Изображение</label>
                                    <input type="file" name="image[]" class="form-control-file" id="exampleInputEmail1" aria-describedby="emailHelp" multiple="">

                                    @error('image')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror

                                </div>




                                <button type="submit" class="btn btn-primary">Добавить изображение</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
