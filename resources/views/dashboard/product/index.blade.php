@extends('dashboard.layout.app')
@section('title', 'Product')
@section('content')
@push('custom_css')
@include('dashboard.layout.includes.data_table_css')
@endpush
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-1">
                <div class="">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <ion-icon name="home-outline"></ion-icon>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="d-flex justify-content-between index_title">
                <h6 class="mb-0">Product List</h6>
                <a data-toggle="modal" data-bs-target="#createModal" data-bs-toggle="modal" class="btn btn-primary">Add New</a>
            </div>

            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data_table" class="table table-striped table-bordered" style="width: 100%">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th>SL</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Product Name</th>
                                    <th>Weight</th>
                                    <th>Age</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Product Code</th>
                                    <th>Description</th>
                                    <th class="no-sort" width="60px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>
    @can('admin-user-add')
        @include('dashboard.product.create')
    @endcan
    @push('custom_scripts')
    @include('dashboard.layout.includes.data_table_js')
    <script>
        $(function() {
            $('#data_table').DataTable({
                processing: true,
                serverSide: true,
                deferRender: true,
                ordering: true,
                scrollX: true,
                scrollY: 400,
                ajax: "{{ route('admin.product.index') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'sub_category_name',
                        name: 'sub_category_name'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'weight',
                        name: 'weight'
                    },
                    {
                        data: 'age',
                        name: 'age'
                    },
                    {
                        data: 'size',
                        name: 'size'
                    },
                    {
                        data: 'color',
                        name: 'color'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'discount',
                        name: 'discount'
                    },
                    {
                        data: 'product_code',
                        name: 'product_code'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                scroller: {
                    loadingIndicator: true
                }
            });
        });

        $('#category_uuid').change(function () {
        $.ajax({
            url:'{{route("admin.getSubCategory")}}',
            method:'get',
            data:{
                category_uuid : $(this).val(),
            },
            success: function (res) {
                if (res.status == 'success') {
                    $('#sub_category').html(res.html);
                }
            }
        });
     })
    </script>
    @endpush
@endsection
