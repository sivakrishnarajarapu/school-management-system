@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Update Student Year</h4>
              <a href="{{route('student.year.view')}}" style="float:right;" class="btn btn-rounded btn-info mb-5">Back</a>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('student.year.update', $editData->id) }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">	


<div class="row">
	<div class="col-md-12" >
    <div class="form-group">
            <h5>Year Name <span class="text-danger">*</span></h5>
            <div class="controls">
        <input type="text" name="name" class="form-control" value="{{$editData->name}}">  
            </div>	 
    </div>
    
	</div> <!-- End Col Md-6 -->
    
</div> <!-- End Row --> 
							 
						<div class="text-xs-right">
	 <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
 
	  
	  </div>
  </div>


@endsection
