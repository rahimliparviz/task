@extends('layouts.admin')
@section('css')
    <style>
        input[type=file]:before {
            color: white !important;
        }
    </style>
@endsection

@section('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_upload_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#inputFile").change(function () {
            readURL(this);
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Edit car info</h5>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('updateMarka',['id'=>$car->id]) }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4 px-10">
                                <div class="form-group">
                                    <label for="type">Name</label>
                                    <input id="name" name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $car->name }}">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-8 px-10">
                                <div class="form-group">
                                    <label for="type">Short info</label>
                                    <input id="name" name="info" type="text" class="form-control {{ $errors->has('info') ? 'is-invalid' : '' }}" value="{{ $car->short_info }}">
                                    @if ($errors->has('info'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('info') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 px-10">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="sel1">Change car model</label>
                                        <select class="form-control" name="model" id="sel1">
                                            @foreach($models as $model)
                                                <option value="{{$model->id}}" @if($model->id == $car->model_id) selected  @endif>{{$model->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 px-10">
                                <div class="form-group">
                                    <label for="value">Image</label>
                                    <input style="background: #f96332" id="inputFile" name="image" type="file" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image') }}">
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 px-10">
                                <div class="form-group">

                                    <img class="pull-right" id="image_upload_preview" src="{{ asset($car->image_path) }}" alt="your image" />
                                </div>
                            </div>
                        </div>


                        </div>

                        <div class="submit">
                            <input type="submit" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection