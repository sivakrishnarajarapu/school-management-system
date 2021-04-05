@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">User List</h3>
                  <a href="{{route('user.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add User</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th widht="5%">SL</th>
                                <th>Role</th>
								<th>Name</th>
								<th>Email</th>
								<th widht="25%">Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($allData as $key => $user)
							<tr>
								<td>{{ $key+1 }}</td>
                                <td>{{$user->user_type}}</td>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td>
            <a href="{{ route('user.edit',$user->id) }}" class="btn btn-info">Edit</a>
            <a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                </td>
							</tr>
                            @endforeach
                        </tbody>
						<tfoot>
							
						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			  <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Hover Export Data Table</h3>
				  <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
						<thead>
							<tr>
								<th>Name</th>
								<th>Position</th>
								<th>Office</th>
								<th>Age</th>
								<th>Start date</th>
								<th>Salary</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Tiger Nixon</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
								<td>2011/04/25</td>
								<td>$320,800</td>
							</tr>
							
						</tbody>				  
						<tfoot>
							
						</tfoot>
					</table>
					</div>              
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->          
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>


@endsection