@section('title', 'Create New Type') 

@extends('admin.layouts.app')

@section('content')
	<div class="container-fluid">
		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h1 class="m-0 font-weight-bold text-primary">Create New Type</h1>
			</div>
		</div>
        <div class="p-2">
            <form class="user" action="" id="typeForm" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nameType">Name:</label>
                        <input type="text" class="form-control form-control-user" name="name" id="nameType" >
                        <p></p>
                    </div>
                    <div class="col-sm-6">
                        <label for="nameType">Slug:</label>
                        <input type="text" class="form-control form-control-user" name="slug" id="slugType" >
                        <p></p>
                    </div>
                </div>
                <label for="">Status:</label>
                <div class="form-group ">
                    <div class="col-sm-2 p-2 card">
                        <input type="hidden" name="status" id="typeStatus" value="0">
                        <button type="button" class="btn btn-secondary btn-toggle" id="btn-toggle-status" data-toggle="button" aria-pressed="false" autocomplete="off">
                          <div class="handle"></div>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Create Type</button>
            </form>
        </div>
	</div>

@endsection

@section('customeJS')
<script>
    $(document).ready(function() {
        $('#btn-toggle-status').on('click', function() {
            var inputValue = $(this).hasClass('active') ? 0 : 1;
            $("#typeStatus").val(inputValue);
        });

        $("#nameType").keyup(function() {
            let text = $(this).val();
            text = text.toLowerCase();
            text = text.replace(/[^a-zA-Z0-9]+/g, '-');
            text = text.trim(); 
            text = text.replace(/--+/g, '-'); 
            $("#slugType").val(text);
        });

        $("#typeForm").submit(function (event) {
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled',true);
            $.ajax({
                url: '{{ route('type.store') }}', // Replace with your route
                type: 'POST',
                data: element.serializeArray(),
                dataType: 'json',
                success: function (response) {
                    $("button[type=submit]").prop('disabled',false);
                    if(response['status'] == true){
                        $('#nameType').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $('#slugType').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        console.log(response);
                        
                        toastMixin.fire({
                            title: 'Add Type Success',
                            icon: 'success'
                        });

                        window.location.href="{{route('admin.type')}}"
                    }else{
                        var errors = response['errors']
                        if(errors['name']){
                            $('#nameType').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['name']);
                        }else{
                            $('#nameType').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }

                        if(errors['slug']){
                            $('#slugType ').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['slug']);
                        }else{
                            $('#slugType').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }
                        toastMixin.fire({
                                title: `Error`,
                                icon: 'error'
                        });
                       
                    }
                }
            })
        })
    });
</script>   
@endsection