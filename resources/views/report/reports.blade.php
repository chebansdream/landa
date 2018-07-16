@extends('template')
            @section('page_content')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">All Report Data</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Reports</li>
                    </ol>
                </div>
                <div class="col-md-6 col-4 align-self-center">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                    <button class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> Create</button>
                    <div class="dropdown pull-right m-r-10 hidden-sm-down">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> January 2017 </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> <a class="dropdown-item" href="#">February 2017</a> <a class="dropdown-item" href="#">March 2017</a> <a class="dropdown-item" href="#">April 2017</a> </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Filter Report</h4>
                            <h6 class="card-subtitle">Filter report data by Owner Group and Address</h6>
                            <form method="post" action="{{url('filter_report')}}">
                                @csrf
                                <div class="form-body">
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Owner Group</label>
                                                <input type="text" id="owner" name="f_owner" class="form-control" list="owner_list" style="text-transform:uppercase">
                                                <datalist id="owner_list">
                                                    @foreach($owner_list as $one_list)
                                                        <option value="{{$one_list->owner_group}}">
                                                    @endforeach
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Address</label>
                                                <input type="text" id="owner" name="f_address" class="form-control" list="address_list" placeholder="example: 10 W ANDERSON RD , LINWOOD ,MI ,48634">
                                                <datalist id="address_list">
                                                    @foreach($address_list as $one_list)
                                                        <option value="{{$one_list->address}}">
                                                    @endforeach
                                                </datalist>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Filter</button>
                                    <a href="{{url('view_reports')}}" class="btn btn-inverse">All Reports</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Report Data</h4>
                            <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                            <div class="table-responsive m-t-40">
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Owner Group</th>
                                        <th>Priority</th>
                                        <th>Parcels</th>
                                        <th>Total Acerage</th>
                                        <th>Land Agent</th>
                                        <th>Change Land Agent</th>
                                        <th>Status</th>
                                        <th>Opposition</th>
                                        <th>Status Date</th>
                                        <th style="display: none;">Notes</th>
                                        <th>Primary Contact</th>
                                        <th style="display: none;">Address</th>
                                        <th style="display: none;">City</th>
                                        <th style="display: none;">State</th>
                                        <th style="display: none;">Zipcode</th>
                                        <th style="display: none;">Phone</th>
                                        <th style="display: none;">Additional</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>Owner Group</th>
                                        <th>Priority</th>
                                        <th>Parcels</th>
                                        <th>Total Acerage</th>
                                        <th>Land Agent</th>
                                        <th>Change Land Agent</th>
                                        <th>Status</th>
                                        <th>Opposition</th>
                                        <th>Status Date</th>
                                        <th style="display: none;">Notes</th>
                                        <th>Primary Contact</th>
                                        <th style="display: none;">Address</th>
                                        <th style="display: none;">City</th>
                                        <th style="display: none;">State</th>
                                        <th style="display: none;">Zipcode</th>
                                        <th style="display: none;">Phone</th>
                                        <th style="display: none;">Additional</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($all_reports as $one_report)
                                        <tr>
                                            <td></td>
                                            <td>{{$one_report->owner_group}}</td>
                                            <td>{{$one_report->priority}}</td>
                                            <td>{{$one_report->parcels}}</td>
                                            <td>{{$one_report->total_acerage}}</td>
                                            <td>{{$one_report->land_agent}}</td>
                                            <td>{{$one_report->change_land_agent}}</td>
                                            <td>{{$one_report->status}}</td>
                                            <td>{{$one_report->opposition}}</td>
                                            <td>{{$one_report->status_date}}</td>
                                            <td style="display: none;" >{{$one_report->notes}}</td>
                                            <td>{{$one_report->primary_contact}}</td>
                                            <td style="display: none;">{{$one_report->address}}</td>
                                            <td style="display: none;">{{$one_report->city}}</td>
                                            <td style="display: none;">{{$one_report->state}}</td>
                                            <td style="display: none;">{{$one_report->zip}}</td>
                                            <td style="display: none;">{{$one_report->phone}}</td>
                                            <td style="display: none;">{{$one_report->additional}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->





            @endsection
            <!-- ============================================================== -->

<!-- ============================================================== -->
<!-- ============================================================== -->
@section('custom_script')
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('js/custom.min.js')}}"></script>
<!-- This is data table -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
{{--<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}


<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<script>
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; width:50%;">'+
                '<tr>'+
                '<td>Address</td>'+
                '<td>'+d[12] + ' , ' + d[13] + ' , ' + d[14] + ' , ' + d[15] +'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Note</td>'+
                '<td>'+d[10]+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Phone</td>'+
                '<td>'+d[16]+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Additional</td>'+
                '<td>'+d[17]+'</td>'+
                '</tr>'+
                '</table>';
    }

    $(document).ready(function() {
        var table = $('#example23').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "columns": [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                null,null,null,null,
                null,null,null,null,
                null,null,null,null,
                null,null,null,null,null
            ],
            columnDefs: [
                { width: 200, targets: 1 }
            ],
            fixedColumns: true
        } );

        // Add event listener for opening and closing details
        $('#example23 tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );
    } );

</script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
@endsection
