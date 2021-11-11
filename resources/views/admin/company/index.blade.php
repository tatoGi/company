@extends('dashboard')

@section('company')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<div class="py-12" style="margin-left:20%; margin-top:7%;">
       <div class="container">
           <div class="row">
            <h2>Home Company</h2>
        <a href="{{route('add.company')}}"><button class="btn btn-info">Add About</button> </a>

              <div class="col-md-12">
              @if( session('success'))



              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" arial-label="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                @endif


              <div class="card-header">
                All About Company

              

           <table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">company name</th>
      <th scope="col">company image</th>
      <th scope="col">company about</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

      @php($i = 1)

    @foreach($Companies as $company)
    <tr>
      <th scope="row">
        {{ $i++ }}
       
      </th>
      <td>{{ $company->company_name	  }} </td>
      <td><img src="{{asset($company->image) }}" style="width:70px; height:40px;" alt=""> </td>
      <td>{{ $company->company_about }} </td>
      <td>{{ $company->company_region }} </td>
      
     
     <td> 
    <td> 
      <a href="{{ url('company/edit/'.$company->id) }}" class="btn btn-info">Edit</a>
      <a href="{{ url('company/delete/'.$company->id) }}" class="btn btn bg-danger">Delate</a>
    </td>
    </tr>
    @endforeach

  </tbody>
  
</table>


@yield('add.company')

           </div>
       </div>
     
        </div>
       </div>

       </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection