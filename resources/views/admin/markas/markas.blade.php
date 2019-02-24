@extends('layouts.admin')

@section('content')
    @if(!isset($modelId))
    <script>document.getElementById('markas').classList.add("active");
        @endif

    </script>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Markas</h4>
                   @if(isset($modelId))
                        <div class="create-admin">
                            <a href="{{ route('createMarka',['modelId'=>$modelId]) }}">
                                <button>Add new car </button>
                            </a>
                        </div>
                   @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                 Image
                            </th>
                            <th>
                                Name
                            </th>

                            <th>
                                Description
                            </th>

                            <th>
                                Model
                            </th>

                            <th class="text-right">
                                Actions
                            </th>
                            </thead>
                            <tbody class="newstable">
                        @if(count($markas) == 0)
                            There are not any car yet.
                            @else
                            @foreach($markas as $marka)
                                <tr>
                                    <td>
                                        <img src="{{ asset($marka->image_path) }}" alt="">
                                    </td>
                                    <td>
                                        {{ $marka->name }}
                                    </td>

                                    <td>
                                        {{ $marka->short_info }}
                                    </td>
                                    <td>
                                        {{ $marka->model() }}
                                    </td>
                                    <td class="text-right icon-holder" style="padding-right: 0;">
                                        <div class="width-6">
                                            <a class="edit" href="{{ route('editMarka', [$marka->id]) }}">
                                                <i class="now-ui-icons ui-2_settings-90"></i>
                                            </a>
                                            <a class="edit" href="{{ route('deleteMarka', [$marka->id]) }}">
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