@section('title', 'List Of Types')

@extends('admin.layouts.app')

@section('content')
	<div class="container-fluid">
		 <!-- Page  -->
+
		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3" style="display: flex; justify-content: space-between; align-items: center">
				<h1 class="m-0 font-weight-bold text-primary">List Of Types</h1>
				<a href="{{route('type.create')}}" class="btn btn-success btn-lg" >ADD NEW</a>

			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Slug</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Slug</th>
								<th>Status</th>
								<th></th>
							</tr>
						</tfoot>
						<tbody>
							@foreach ($types as $item)
							<tr>
								<td class="type_id">{{$item->id}}</td>
                                <td><a href="" class="btn btn-infor btn-sm view_data" style="background: blanchedalmond">{{$item->name}}</a></td>
								<td>{{ $item->slug }}</td>
								
								<td class="text-center">
									@if ($item->status == 1)
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
											<a class="dropdown-item" href="{{route('type.edit',$item->id)}}">Edit</a>
											<a href="#" class="dropdown-item" id="btn-delete" onclick="deleteData({{$item->id}})">Delete</a>
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
		function deleteData(id){
			var url = '{{route("type.destroy","ID")}}';
			// Test
			var newUrl = url.replace("ID",id);
			if(confirm("Are you sure you want to delete")) {
				$.ajax({
					url: newUrl,
					type: 'delete',
					data: {},
					dataType: 'json',
					headers: {
					'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
					},
					success: function (response) {
						if (response['status']) {
							
							toastMixin.fire({
								title: 'Delete Success',
								icon: 'success'
                        	});
							setTimeout(() => {
								window.location.href = "{{route('admin.type')}}";
							}, 1000);
						}
					}
				})
			}
    	}
	$(document).ready(function() {
		// Delete
		$('.view_data').click(function(e) {
			e.preventDefault();
			var type_id = $(this).closest('tr').find('.type_id').text();
			$.ajax({
				method: "GET",
				url: "{{ route('type.show', 'type_id') }}".replace('type_id', type_id),
				success: function (data) {
					console.log(data);
					var box = '<ul>';
// Duyệt qua từng cuốn sách trong dữ liệu
				box += '<li>' +
								'<strong>Name:</strong> ' + data.name + '<br>' +
								'<strong>Slug:</strong> ' + data.slug + '<br>' +
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