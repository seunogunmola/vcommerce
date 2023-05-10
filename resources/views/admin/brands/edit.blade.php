@extends('admin.main')
@section('title',$title)
@section('content')
<div class="page-content">
    <h6 class="mb-0 text-uppercase">{{ $title }}</h6>
    <hr/>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ms-auto">
            <a href="{{ route('admin.brand.all') }}" class="btn btn-primary"> All Brands <i
                    class="bx bx-file"></i> </a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.brand.update',$brand->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Brand Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="brand_name" class="form-control" value="{{ old('brand_name',$brand->brand_name) }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Brand Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" name="brand_image" id="image"  class="form-control">
                                        <br>
                                        @php
                                            if(!empty($brand->brand_image)){
                                                $image = $brand->brand_image;
                                            }
                                            else{
                                                $image = 'upload/admin/thumbnails/noimage.jpg';
                                            }
                                        @endphp
                                        <img id="showImage"  src="{{ asset($image) }}" alt="Admin" class=" p-1" width="110">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Update Changes" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>    
    
</div>
@endsection
