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
						<div class="card-header">Edit Trader</div>

						<div class="card-body">
							@if(session('message'))
							<div class="alert alert-success">
								{{ session('message') }}
							</div>
							@endif


							<form action="{{ route('update.trader',$editTrader->id) }}" method="post"
								enctype="multipart/form-data">
								@csrf

								<div class="mb-3 mt-5">
									<label for="name">Name:</label>
									<input type="text" name="name" class="form-control" value="{{$editTrader->name}}">
								</div>

								<div class="mb-3 mt-5">
									<label for="copier">Copier:</label>
									<input type="text" name="copier" class="form-control"
										value="{{$editTrader->copier}}">
								</div>

								<div class="mb-3 mt-5">
									<label for="gains">Gains:</label>
									<input type="text" name="gains" class="form-control" value="{{$editTrader->gains}}">
								</div>
								
									<div class="mb-3 mt-5">
									<label for="gains">Risk:</label>
									<input type="text" name="risk" class="form-control"  value="{{$editTrader->risk}}">
								</div>
									<div class="mb-3 mt-5">
									<label for="gains">Loss:</label>
									<input type="text" name="loss" class="form-control" value="{{$editTrader->loss}}">
								</div>
								
								<div class="mb-3 mt-5">
									<label for="gains">Commision:</label>
									<input type="text" name="commission" class="form-control" value="{{$editTrader->commission}}">
								</div>

								<div class="mb-3 mt-5">
									<label for="total_transaction">Total Transactions:</label>
									<input type="text" name="total_transactions" class="form-control"
										value="{{$editTrader->total_transactions}}">
								</div>

								<div class="mb-3 mt-5">
									<label for="image">Image:</label>
									<input type="file" name="image" value="{{$editTrader->image}}"
										class="form-control-file">
									<img src="{{asset('uploads/trader/'.$editTrader->image)}}" width="60px"
										height="60px" />
								</div>

								<button type="submit" class="btn btn-primary">Update Trader</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>








		<!-- Card end -->

		<!-- Card end -->
	</div>
</div>
</div>
<!-- Content wrapper scroll end -->

@include('manager.footer')