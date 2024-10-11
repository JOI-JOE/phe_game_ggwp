@section('title', 'List Of Users')

@extends('admin.layouts.app')

@section('content')
	<div class="container-fluid">
		 <!-- Page  -->

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3" style="display: flex; justify-content: space-between; align-items: center">
				<h1 class="m-0 font-weight-bold text-primary">List Of Users</h1>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Avatar</th>
								<th>Active</th>
								<th></th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Avatar</th>
								<th>Active</th>
								<th></th>
							</tr>
						</tfoot>
						<tbody>
							@foreach ($data as $item)
							<tr>
								<td class="product_id">{{$item->id}}</td>
                                <td><a href="" class="btn btn-infor btn-sm view_data" style="background: blanchedalmond">{{$item->name}}</a></td>
								<td>{{ $item->email }}</td>
								@if ($item->role == 2)
									<td><p class="btn btn-infor btn-sm view_data" style="background: rgb(13, 188, 251)">Admin</p></td>
								@else
									<td><p class="btn btn-infor btn-sm view_data" style="background: rgb(34, 196, 255)">User</p></td>
								@endif

								@if ($item->avatar)
                                	<td><img src="{{ Storage::url('product/' . $productImage->src) }}" alt="{{ $item->name }}" width="100"></td>
								@else
                                	<td><small>No Photo</small></td>
								@endif
								
								<td class="text-center">
									@if ($item->active == 1)
										<a href="#" class="btn btn-success btn-circle btn-sm">
											<i class="fas fa-check"></i>
										</a>
									@else
										<a href="#" class="btn btn-danger btn-circle btn-sm">
											<i class="fas fa-info-circle"></i>
										</a>
									@endif
								</td>
								<td>
									<div class="dropdown d-flex justify-content-center">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            ...
                                        </button>
                                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton" style="">
											<a class="dropdown-item" href="{{route('user.edit',$item->id)}}">Edit</a>
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

	{{-- Model --}}
	<div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="bookModalLabel">Detail Books </h5>
			{{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
			</div>
			<div class="modal-body">
			<div class="view_book_data">

			</div>
			</div>
		</div>
		</div>
	</div>
@endsection

@section('customeJS')
<script>
	$(document).ready(function() {
		// Delete
		$('.view_data').click(function(e) {
			e.preventDefault();
			var product_id = $(this).closest('tr').find('.product_id').text();
			$.ajax({
				method: "GET",
				url: "{{ route('product.show', 'product_id') }}".replace('product_id', product_id),
				success: function (data) {
					console.log(data);
					var box = '<ul>';
				box += '<li>' +
								'<strong>Name:</strong> ' + data.name + '<br>' +
								'<strong>Slug:</strong> ' + data.handle + '<br>' +
								'<strong>Price:</strong> ' + data.price + '<br>' +
								'<strong>Description:</strong> ' + data.description + '<br>' +
								'<strong>Created_at:</strong> ' + data.created_at + '<br>' +
								'<strong>Updated_at:</strong> ' + data.updated_at + '<br>' +
				+
				'</li>';

				box += '</ul>';
					$('.view_book_data').html(box);
					$('#bookModalLabel').html( 'Detail:'+' '+ data.name);
					$('#bookModal').modal('show');
				}
			});
		})
	});
</script>
@endsection