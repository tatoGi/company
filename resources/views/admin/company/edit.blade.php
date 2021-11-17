<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Edit company <b> </b>
            
        </b>
        </h2>
    </x-slot>

    @if( session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" arial-label="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                @endif

    <div class="py-12">
       <div class="container">
           <div class="row">

       
       <div class="col-md-8">
       <div class="card text-center">



  <div class="card-header">
    Edit Company
  </div>
  <div class="card-body">
  <form action="{{ url('company/update/'.$companies->id) }}" method="POST" enctype="multipart/form-data">

    @csrf
    <input type="hidden" name="old_image" value="{{ $companies->company_image }}">
  <div class="mb-3">
    <label for="exampleInputEmail1">Update Company Name</label>
    <input type="text" name="company_name" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $companies->company_name  }}">
    
    @error('Company_name')

    <span class="text-danger"> {{ $message }} </span>
    @enderror


  </div>

  


  <div class="mb-3">
    <label for="exampleInputEmail1">Update Company Image</label>
    <input type="file" name="company_image"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$companies->company_image  }}">
    
    @error('Company_image')

    <span class="text-danger"> {{ $message }} </span>
    @enderror


  </div>

    <div class="from-group">
        <img src="{{ asset($companies->company_image) }}" style="width: 400px; height:200px;">

    </div>


  <button type="submit" class="btn btn-primary">Update Company</button>

</form>
  </div>
</div>
        </div>
       </div>

       </div>
              </div>
            
</x-app-layout>