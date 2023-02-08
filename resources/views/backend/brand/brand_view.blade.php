@extends('admin.admin_master')
@section('admin')

    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand List <span
                                    class="badge badge-pill badge-danger"> {{ count($brands) }} </span></h3>

                            <a href="{{ route('add.brand.form') }}" style="float: right;"
                               class="btn btn-rounded btn-success mb-5"> Add Brand</a>
                        </div>


                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Brand En</th>
                                        <th>Brand Hin</th>
                                        <th>Image</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $item)
                                        <tr>
                                            <td>{{ $item->brand_name_en }}</td>
                                            <td>{{ $item->brand_name_hin }}</td>
                                            <td><img src="{{ asset($item->brand_image) }}"
                                                     style="width: 70px; height: 40px;"></td>
                                            <td>
                                                <a href="{{ route('brand.edit',$item->id) }}" class="btn btn-info"
                                                   title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                                <a href="{{ route('brand.delete',$item->id) }}" class="btn btn-danger"
                                                   title="Delete Data" id="delete">
                                                    <i class="fa fa-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
