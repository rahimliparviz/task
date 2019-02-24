@extends('layouts.admin')

@section('content')
 <script>document.getElementById('models').classList.add("active");</script>


     <div class="row">
  <div class="col-md-12">
   <div class="card">
    <div class="card-header">
     <h4 class="card-title">All Models</h4>
     <div class="create-admin">
      <a href="{{ route('createModel') }}">
       <button>Add a new model</button>
      </a>
     </div>
    </div>
    <div class="card-body">
     <div class="table-responsive">
      <table class="table">
       <thead class=" text-primary">
       <th>
        Name
       </th>

       <th class="text-right">
        Actions
       </th>
       </thead>
       <tbody class="newstable">
    @if(count($models) == 0)
     <tr>There are not any car model yet.</tr>
     @else
     @foreach($models as $model)
      <tr>
       <td>
        {{ $model->name}}
       </td>

       <td class="text-right icon-holder" style="padding-right: 0;">
        <div class="width-6">
         <a class="edit" href="{{ route('modelMarkas', [$model->id]) }}">
          <i style="color: #1be611" class="fas fa-car"></i>
         </a>

         <a class="edit" href="{{ route('editModel', [$model->id]) }}">
          <i class="now-ui-icons ui-2_settings-90"></i>
         </a>
         <a class="edit" href="{{ route('deleteModel', [$model->id]) }}">
          <i class="far fa-trash-alt"></i>
         </a>
        </div>
       </td>
      </tr>
     @endforeach
       @endif
       </tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
 </div>






@endsection