


@extends('backend.layout.app')
@section('content')
<div class="container">
    <br><h2 style="text-align: center">Logo Table</h2>
    <div style="text-align: right">
        <a href="{{ route('logo.form') }}" class="btn btn-info" style="margin-right: 10px;">+ Add Logo</a>
    </div><br><br>
    <div class="col-10 mx-auto">
        <div class="card">
          <div class="table-responsive">
            <table
    class="table table-vcenter table-mobile-md card-table">
              <thead>
                <tr>
                    <th>Sl</th>
                    <th>Image</th>
                  <th class="w-1">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($logos as $logo)


                <tr>
                    <tr>
                        <td data-label="Name" >{{ $logo->id }}</td>
                        <td data-label="Title" ><img height="100px" width="100px" src="{{ url('/public/uploads',$logo->image) }}" alt="logo"> </td>

                  <td>
                    <div class="btn-list flex-nowrap">
                     
                      <div class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                          Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="{{ route('logo.delete',$logo->id) }}">
                            Delete
                          </a>
                          
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>


                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

</div>

@endsection