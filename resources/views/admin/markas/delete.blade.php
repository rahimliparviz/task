@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="create-admin">
                        <div class="question">Are you sure you want to delete this car ?</div>

                        <div class="row">
                            <div class="col-md-6"><h1>{{ $car->name }}</h1></div>
                            <div class="col-md-6"><img  src="{{asset($car->image_path)}}" alt=""></div>
                        </div>
                        <form method="POST" action="{{ route('destroyMarka',['id'=>$car->id]) }}">
                            {{ csrf_field() }}

                            <div class="submit delete">
                                <input type="submit" value="delete">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection