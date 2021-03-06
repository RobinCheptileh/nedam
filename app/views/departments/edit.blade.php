@extends('layouts.hr')
@section('content')

<div class="row">
	<div class="col-lg-12">
  <h3>Update Department</h3>

<hr>
</div>	
</div>


<div class="row">
	<div class="col-lg-5">

    
		
		 @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif

		 <form method="POST" action="{{{ URL::to('departments/update/'.$department->id) }}}" accept-charset="UTF-8">
   
    <fieldset>
        <div class="form-group">
            <label for="username">Department Code <span style="color:red">*</span> </label>
            <input class="form-control" placeholder="" type="text" name="code" id="code" value="{{ $department->codes }}">
        </div>


        <div class="form-group">
            <label for="username">Department Name <span style="color:red">*</span></label>
            <input class="form-control" placeholder="" type="text" name="name" id="name" value="{{ $department->department_name }}">
        </div>

        
        <div class="form-actions form-group">
        
          <button type="submit" class="btn btn-primary btn-sm">Update Department</button>
        </div>

    </fieldset>
</form>
		

  </div>

</div>
























@stop