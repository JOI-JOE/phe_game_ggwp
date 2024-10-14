@section('title', 'Create New Product') 

@extends('admin.layouts.app')

@section('content')
	<div class="container-fluid">
		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h1 class="m-0 font-weight-bold text-primary">Create New Product</h1>
			</div>
		</div>
        <div class="p-2">
            <form  action="" id="productForm" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control form-control-user" name="name" id="name" >
                        <p></p>
                       
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="handle">Handle:</label>
                        <input type="text" class="form-control form-control-user" name="handle" id="handle" >
                        <p></p>
                        
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="page_title">Page_Title:</label>
                        <input type="text" class="form-control form-control-user" name="page_title" id="page_title" >
                        <p></p>
                        
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="published_at">Published_at:</label>
                        <input type="text" class="form-control form-control-user" name="published_at" id="published_at" autocomplete="off">
                        <p></p>
                    </div>

                    <div class="col-sm-6  mb-3">
                        <label for="price">Price:</label>
                        <input type="number" min="0" class="form-control form-control-user" name="price" id="price" autocomplete="off">
                        <p></p>
                    </div>
                
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-3">
                        <label for="price" class="m-2">Type:</label>
                        <select 
                            name="type_id" placeholder="Select type"
                            id="type-select"
                            data-search="false" data-silent-initial-value-set="true">
                            @if($types->isNotEmpty())
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                                    <option value="">Khác</option>
                            @endif
                        </select>
                    </div>

                    <div class="form-group ">
                        <div class=" p-2 ">
                            <label for="">Status:</label>
                            <input type="hidden" name="not_allow_promotion" id="typeStatus" value="0">
                            <button type="button" class="btn btn-secondary btn-toggle" id="btn-toggle-status" data-toggle="button" aria-pressed="false" autocomplete="off">
                              <div class="handle"></div>
                            </button>
                        </div>
                    </div>
                </div>
              

                <div class="row">
                    <div class="col-lg-6">
                        <input type="file" 
                            class="feature_image"
                            name="feature_image"
                            multiple
                            data-max-file-size="3MB"
                            data-max-files="1" />
                    </div>
                </div>
                <div class="wrapper">
                    <label for="description">Description:</label>
                    <textarea spellcheck="false" name="description" id="description" placeholder="Type something here..."></textarea>
                    <p style="color: red"></p>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block mt-4">Create product</button>
            </form>
        </div>
	</div>

@endsection

@section('customeJS')
{{-- Select --}}
<script>
VirtualSelect.init({
    ele: '#type-select',
    search: true,
    showOptionsOnlyOnSearch: true,
});
</script>
{{-- Upload file  --}}
<script>
    
    FilePond.registerPlugin(FilePondPluginImagePreview);
    const inputElement = document.querySelector('input[type="file"]');
    const pond = FilePond.create(inputElement);
    FilePond.setOptions({
        server: {
            process: '{{ route('upload_image') }}',
            revert: '{{route('delete_image')}}',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });


</script>

<script>
    const textarea = document.querySelector("textarea");
    textarea.addEventListener("keyup", e =>{
        textarea.style.height = "63px";
        let scHeight = e.target.scrollHeight;
        textarea.style.height = `${scHeight}px`;
    });
</script>   

<script>
$(document).ready(function() {

    $('#name').change(function (){
        element = $(this);
        $("button[type=submit]").prop('disabled',true);
        $.ajax({
            url: '{{ route('getSlug') }}', // Replace with your route
            type: 'get',
            data: {title:element.val()},
            dataType: 'json',
            success: function (response) {
                $("button[type=submit]").prop('disabled',false);
                if(response['status'] == true){
                    $('#handle').val(response['handle'])
                    console.log(response);
                }
            }
        })
    });

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

    $("#productForm").submit(function (event) {
        event.preventDefault();
        var element = $(this);
        $("button[type=submit]").prop('disabled',true);
        $.ajax({
            url: '{{ route('product.store') }}', // Replace with your route
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
                         title: 'Add Product Success',
                         icon: 'success'
                     });

                     window.location.href="{{route('product.list')}}"
                 }else{
                     var errors = response['errors']
                     if(errors['name']){
                         $('#name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['name']);
                     }else{
                         $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                     }

                     if(errors['handle']){
                         $('#handle ').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['handle']);
                     }else{
                         $('#handle').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                     }

                     if(errors['page_title']){
                         $('#page_title ').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['page_title']);
                     }else{
                         $('#page_title').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                     }


                     if(errors['published_at']){
                         $('#published_at ').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['published_at']);
                     }else{
                         $('#published_at').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                     }

                     if(errors['price']){
                         $('#price ').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['price']);
                     }else{
                         $('#price').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                     }

                     if(errors['description']){
                         $('#description ').siblings('p').html(errors['description']);
                     }else{
                         $('#description').siblings('p').html("");
                     }
                    //  toastMixin.fire({
                    //          title: `Error`,
                    //          icon: 'error'
                    //  });
                 }
                console.log(response['data'])
            }
        })
    })
});
</script>
@endsection