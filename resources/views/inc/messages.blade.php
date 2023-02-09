@if(count($errors) > 0)
@foreach($errors->all() as $error)
<!-- <div class="alert alert-danger" role="alert">
           {{$error}}
       </div> -->
<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
    <strong>Warning!</strong> {{$error}}
</div>
@endforeach
@endif

@if(session('success'))
<!-- <div class="alert alert-success">
           {{session('success')}}
       </div> -->
<div class="pt-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-green overflow-hidden shadow-xl sm:rounded-lg">
            <div class="px-4 py-4 sm:px-6 bg-green-200">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{session('success')}}
                </h3>
            </div>
        </div>
    </div>
</div>
@endif

@if(session('error'))
<!-- <div class="alert alert-danger">
           {{session('error')}}
       </div> -->
<div class="pt-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-green overflow-hidden shadow-xl sm:rounded-lg">
            <div class="px-4 py-4 sm:px-6 bg-red-200">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{session('error')}}
                </h3>
            </div>
        </div>
    </div>
</div>
@endif