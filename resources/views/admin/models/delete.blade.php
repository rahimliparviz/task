@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="create-admin">
                        <div class="question">Are you sure you want to delete this car model?</div>
                        <h1>{{ $model->name }}</h1>
                        <form method="POST" action="{{ route('destroyModel',['id'=>$model->id]) }}">
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