@extends('admin.admin_master')
@section('admin')

    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!--   ------------ Add Brand Page -------- -->
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Brand </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                {{-- {{ route('brand.store') }}    --}}
                                <form method="post" action="#" enctype="multipart/form-data" id="form-data">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Brand Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_en" class="form-control" id="name_en">
                                            <small id="brand_name_en_error" class="form-text text-danger"></small>

                                            @error('brand_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Brand Name Hindi <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_hin" class="form-control" id="name_hindi">
                                            <small id="brand_name_hin_error" class="form-text text-danger"></small>

                                            @error('brand_name_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>Brand Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="brand_image" class="form-control" id="brand_image">
                                            <small id="brand_image_error" class="form-text text-danger"></small>

                                            @error('brand_image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New" id="submit-data">
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>


            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function () {
            $('#submit-data').on('click',function(e) {
                e.preventDefault();
                var formData = new FormData($('#form-data')[0]);
                $.ajax({
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    url : '{{route('brand.store')}}',
                    success: function(data) {
                        if(data.status == 200) {
                            toastr.success('Brand Created Successfully');
                            $('#name_en').val('');
                            $('#name_hindi').val('');
                            $('#brand_image').val('');
                        }
                    },
                    error: function (reject) {
                        console.log(reject);
                        var response = $.parseJSON(reject.responseText);
                        console.log(response);
                        $.each(response.errors , function (key , value) {
                            $('#' + key+'_error').text(value);
                        });
                    }
                });
            });
        });
    </script>
@endsection
