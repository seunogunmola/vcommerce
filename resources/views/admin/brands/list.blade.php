@extends('admin.main')
@section('title',$title)
@section('content')
<div class="page-content">
    <h6 class="mb-0 text-uppercase">{{ $title }}</h6>
    <hr/>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ms-auto">
            <a href="{{ route('admin.brand.create') }}" class="btn btn-primary"> Add Brand <i
                    class="bx bx-plus"></i> </a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            @if(count($brands))
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Brand Image</th>
                            <th>Brand Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $index=>$brand )
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td style="width:100px;"><img src="{{ asset($brand->brand_image) }}" alt="{{ $brand->brand_name }} Logo" style="width:50px;"></td>
                            <td>{{ $brand->brand_name }}</td>
                            <td>
                                <a href="{{ route('admin.brand.edit',$brand->id) }}" class="btn btn-sm btn-info"> Edit </a>
                                <a href="{{ route('admin.brand.delete',$brand->id) }}" class="btn btn-sm btn-danger" id="delete"> Delete </a>
                            </td>
                        </tr>                            
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Brand Image</th>
                            <th>Brand Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
                @else
                <div class="alert alert-danger" type="alert">No Brand Created Yet</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
