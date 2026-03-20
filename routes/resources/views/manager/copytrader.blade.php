@include('manager.header')
@include('manager.navbar')

<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">
	@if (session('error'))
	<div class="alert box-bdr-red alert-dismissible fade show text-red" role="alert">
		<b>Error!</b>{{ session('error') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@elseif (session('status'))
	<div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
		<b>Success!</b> {{ session('status') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@endif
	<!-- Main header starts -->

</div>
<!-- Row end -->

<!-- Row start -->
<div class="main-panel">
	<div class="content-wrapper">


		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header">Create Trader</div>

						<div class="card-body">
							@if(session('message'))
							<div class="alert alert-success">
								{{ session('message') }}
							</div>
							@endif

							<form action="{{ route('save.trader') }}" method="post" enctype="multipart/form-data">
								@csrf

								<div class="mb-3 mt-5">
									<label for="name">Name:</label>
									<input type="text" name="name" class="form-control" required>
								</div>

								<div class="mb-3 mt-5">
									<label for="copier">Copier:</label>
									<input type="text" name="copier" class="form-control" required>
								</div>

								<div class="mb-3 mt-5">
									<label for="gains">Gains:</label>
									<input type="text" name="gains" class="form-control" required>
								</div>
								
									<div class="mb-3 mt-5">
									<label for="risk">Risk:</label>
									<input type="text" name="risk" class="form-control" required>
								</div>
									<div class="mb-3 mt-5">
									<label for="loss">Loss:</label>
									<input type="text" name="loss" class="form-control" required>
								</div>
									<div class="mb-3 mt-5">
									<label for="commision">Commision:</label>
									<input type="text" name="commission" class="form-control" required>
								</div>

								<div class="mb-3 mt-5">
									<label for="total_transaction">Total Transactions:</label>
									<input type="text" name="total_transactions" class="form-control" required>
								</div>

								<div class="mb-3 mt-5">
									<label for="image">Image:</label>
									<input type="file" name="image" class="form-control-file">
								</div>

								<button type="submit" class="btn btn-primary">Save Trader</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="row gx-3">
			<div class="col-sm-12 col-12">
				<!-- Card start -->
				<div class="card">
					<div class="card-header">
						<div class="card-title">Copy Traders History</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="highlightRowColumn" class="table custom-table">
								<thead>
									<tr>

										<th>Name</th>
										<th>Copier</th>
										<th>Gains</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									@foreach($traders as $trader)

									<tr>


										{{-- <td><img src="{{asset('uploads/trader/'.$trader->image)}}" width="60%">
										</td> --}}
										<td>{{$trader->name}}</td>
										<td>{{$trader->copier}}</td>
										<td>{{$trader->gains}}</td>
										<td><a href="{{url('edit-trader/'.$trader->id)}}"><span
													class="badge shade-blue">EDIT TRADER</span></a></td>
										<td><a href="{{url('delete-trader/'.$trader->id)}}"
												onclick="confirm('Are you sure you want to delete this trader?')"><span
													class="badge shade-red">DELETE TRADER</span></a></td>

									</tr>
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Card end -->




				<!-- Card end -->

				<!-- Card end -->
			</div>
		</div>
	</div>
	<!-- Content wrapper scroll end -->

	@include('manager.footer')