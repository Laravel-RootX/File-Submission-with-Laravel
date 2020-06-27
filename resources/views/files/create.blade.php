@extends('layouts.backend')

@section('title', 'Add Tax Files')

@section('content_header', 'Add Tax Return Related Document')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    @include('files.partial.listButton')
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <form action="{{url('/files')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="alert alert-info"><i class="fa fa-chevron-right"></i>&nbsp;Only jpg, jpeg,
                                png, pdf, doc or docx files are allowed for upload.<br>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="all_files[]" value="single_file">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label">Single File </label>
                                            </div>
                                            <br>
                                            <div class="form-inline font-weight-bold">
                                                <input type="text" name="single_file" class=" form-control"
                                                       placeholder="Document Name">
                                                <input type="file" name="single_file" id="single_file"
                                                       class="form-control"
                                                       accept=".jpeg ,.jpeg,.png,.pdf,.doc,.docx"/>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <input type="hidden" name="all_files[]" value="multiple_file">
                                    <div class="control-group">
                                        <div class="widget-main">
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label">Multiple File </label>
                                            </div>
                                            <br>
                                            <div class="form-inline font-weight-bold">
                                                &nbsp;<input type="text" name="multiple_file_title[]"
                                                             class="form-control"
                                                             placeholder="Document Name">
                                                <input type="file" name="multiple_file[]"
                                                       id="multiple_file"
                                                       class="form-control"
                                                       accept=".jpeg ,.jpeg,.png,.pdf,.doc,.docx"/>

                                                <button type="button" class="btn btn-info btn-sm add_file"
                                                        slug="multiple_file">
                                                    <i class="ace-icon fa fa-plus bigger-110"></i>
                                                    Add more
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-sm btn-success"> Submit
                                        <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $("body").on('click', '.add_file', function (e) {
                e.preventDefault();
                let slug = $(this).attr('slug');
                let input_field = '<div class="control-group">';
                input_field += '<div class="widget-main">';
                input_field += '<div class="form-inline font-weight-bold">';
                input_field += '<div class="form-group">';
                input_field += '<input type="text" name="' + slug + '_title[]" class="form-control" placeholder="Document Name">';
                input_field += '</div> &nbsp;';

                input_field += '<input type="file" name="' + slug + '[]" id="' + slug + '" class="form-control" accept=".jpeg ,.jpeg,.png,.pdf,.doc,.docx"/> ';
                input_field += '<button class="btn btn-danger btn-sm remove_file" type="button"><i class="ace-icon fa fa-trash bigger-100"></i> Remove </button>';

                input_field += '</div></div></div>';

                $(this).parent().parent().parent().append(input_field);
            });

            $("body").on('click', '.remove_file', function (e) {
                e.preventDefault();
                $(this).parent().parent().parent().remove();
            });

        });
    </script>
@endsection
