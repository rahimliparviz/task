@extends('layouts.app')

@section('content')

    <input type="hidden" id="url" value="{{route('markas')}}">

   <div class="row mb-2">
      <div class="col-md-12">
          <div class="dropdown  pull-right show">
            <h3 class="mb-1">Car Models</h3>
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Select a car model
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

               @foreach($models as $model)
                  <a class="dropdown-item model-item" data-id="{{$model->id}}" href="#">{{$model->name}}</a>
               @endforeach
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
          <hr>
        <h3 class="mb-1 modelName">No car model selected.</h3>
          <div class="cars">
            <div class="row">
              <div style="display: none" id="loading">
                  <div class="loading-window">
                      <div class="car">
                          <div class="strike"></div>
                          <div class="strike strike2"></div>
                          <div class="strike strike3"></div>
                          <div class="strike strike4"></div>
                          <div class="strike strike5"></div>
                          <div class="car-detail spoiler"></div>
                          <div class="car-detail back"></div>
                          <div class="car-detail center"></div>
                          <div class="car-detail center1"></div>
                          <div class="car-detail front"></div>
                          <div class="car-detail wheel"></div>
                          <div class="car-detail wheel wheel2"></div>
                      </div>

                      <div class="text">
                          <span>Loading</span><span class = "dots">...</span>
                      </div>
                  </div>

              </div>
              </div>

          </div>
      </div>
   </div>
@endsection