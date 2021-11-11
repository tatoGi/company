
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Company page</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<div class="col-lg-12">

<div class="card card-default">
	<div class="card-header card-header-border-bottom">
		<h2>Create Company</h2>
	</div>
	<div class="card-body">
	<form action="{{ route('store.company') }}" method="POST" enctype="multipart/form-data">

 
@csrf
			<div class="form-group">
				<label for="exampleFormControlInput1">company name</label>
				<input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Company Name">
				
			</div>
		
			
		
			<div class="form-group">
				<label for="exampleFormControlTextarea1">company about</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="About">
				</textarea>
			</div>
			<div class="form-group">
				<label for="exampleFormControlFile1">company Image</label>
				<input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
			</div>
			<div class="form-footer pt-4 pt-5 mt-4 border-top">
				<button type="submit" class="btn btn-primary btn-default">Submit</button>
				
			</div>
		</form>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
								


