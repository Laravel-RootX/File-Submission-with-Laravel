@extends('layouts.backend')

@section('title', 'List of Files')

@section('content_header', 'List of Files')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    @include('files.partial.addButton')
                </div>

                <div class="widget-body">
                    <div class="widget-main">

                        <div class="row">
                            <div class="col-sm-12">
                                @if(!empty($files))
                                    <div class="group">

                                        <div>
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th width="45%">Document Name</th>
                                                    <th width="15%">Upload Date Time</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @if($files)
                                                    @foreach($files as $file)
                                                        <tr>
                                                            <td>{{ $file->title }}</td>
                                                            <td>{{ $file->created_at }}</td>
                                                            <td>
                                                                <a href="{{url('/storage/' . $file->uploaded_file)}}"
                                                                   download="{{ $file->uploaded_file }}"
                                                                   class="btn btn-xs btn-success mb-2">
                                                                    <i class="ace-icon fa fa-download bigger-130"></i>
                                                                    Download
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="3">Nothing Found</td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <h1>No Files Found...</h1>
                                @endif
                            </div><!-- ./span -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- page specific plugin scripts -->
    <script src="{{ asset('/assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('/assets/js/jquery.ui.touch-punch.min.js')}}"></script>
    <script>
        //jquery accordion
        $("#accordion").accordion({
            collapsible: true,
            heightStyle: "content",
            animate: 250,
            header: ".accordion-header"
        }).sortable({
            axis: "y",
            handle: ".accordion-header",
            stop: function (event, ui) {
                // IE doesn't register the blur when sorting
                // so trigger focusout handlers to remove .ui-state-focus
                ui.item.children(".accordion-header").triggerHandler("focusout");
            }
        });


    </script>
@endsection
