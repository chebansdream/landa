@extends('template')
            @section('page_content')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">All Report Data</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
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
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row p-t-20">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Projects</label>
                                                <select class="form-control" name="my_projects" id="my_projects">
                                                    <option value=""></option>
                                                    @foreach($project_list as $one_list)
                                                        @if(isset($project_id) && $project_id == $one_list->_id)
                                                            <option value="{{$one_list->_id}}" selected>{{$one_list->title}}</option>
                                                        @else
                                                            <option value="{{$one_list->_id}}">{{$one_list->title}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Owner Group</label>
                                                @if(isset($f_owner))
                                                    <input type="text" id="f_owner" name="f_owner" class="form-control" list="owner_list" style="text-transform:uppercase" value="{{$f_owner}}">
                                                @else
                                                    <input type="text" id="f_owner" name="f_owner" class="form-control" list="owner_list" style="text-transform:uppercase" value="">
                                                @endif
                                                <datalist id="owner_list">
                                                    @foreach($owner_list as $one_list)
                                                        <option value="{{$one_list->owner_group}}">
                                                    @endforeach
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Address</label>
                                                @if(isset($f_owner))
                                                    <input type="text" id="f_address" name="f_address" class="form-control" list="address_list" placeholder="example: 10 W ANDERSON RD , LINWOOD ,MI ,48634" value="{{$f_address}}">
                                                @else
                                                    <input type="text" id="f_address" name="f_address" class="form-control" list="address_list" placeholder="example: 10 W ANDERSON RD , LINWOOD ,MI ,48634" value="">
                                                @endif
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
                                        <th>Project</th>
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
                                        <th style="display: none;">Primary Contact</th>
                                        <th style="display: none;">Address</th>
                                        <th style="display: none;">City</th>
                                        <th style="display: none;">State</th>
                                        <th style="display: none;">Zipcode</th>
                                        <th style="display: none;">Phone</th>
                                        <th style="display: none;">Additional</th>
                                        <th style="display: none;">id</th>
                                        <th style="display: none;">p_id</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>Project</th>
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
                                        <th style="display: none;">Primary Contact</th>
                                        <th style="display: none;">Address</th>
                                        <th style="display: none;">City</th>
                                        <th style="display: none;">State</th>
                                        <th style="display: none;">Zipcode</th>
                                        <th style="display: none;">Phone</th>
                                        <th style="display: none;">Additional</th>
                                        <th style="display: none;">id</th>
                                        <th style="display: none;">p_id</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($all_reports as $one_report)
                                        <tr>
                                            <td></td>
                                            <td>{{$one_report->title}}</td>
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
                                            <td style="display: none;" >{{$one_report->primary_contact}}</td>
                                            <td style="display: none;">{{$one_report->address}}</td>
                                            <td style="display: none;">{{$one_report->city}}</td>
                                            <td style="display: none;">{{$one_report->state}}</td>
                                            <td style="display: none;">{{$one_report->zip}}</td>
                                            <td style="display: none;">{{$one_report->phone}}</td>
                                            <td style="display: none;">{{$one_report->additional}}</td>
                                            <td style="display: none;">{{$one_report->_id}}</td>
                                            <td style="display: none;">{{$one_report->project_id}}</td>
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

            <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit Report</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{url('edit_report')}}">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <h3 class="card-title">Report Details</h3>
                                    <hr>
                                    <div class="row p-t-20">
                                        <input type="hidden" id="report_id" name="report_id">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Projects</label>
                                                <select class="form-control" name="project_id" id="project_id">
                                                    <option value=""></option>
                                                    @foreach($all_projects as $one_item)
                                                    <option value="{{$one_item->_id}}">{{$one_item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" id="report_id" name="report_id">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Owner Group</label>
                                                <input type="text" id="owner" name="owner_group" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Priority</label>
                                                <input type="text" id="priority" name="priority" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Parcels</label>
                                                <input type="number" id="parcels" name="parcels" class="form-control" placeholder="0">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Total Acerage</label>
                                                <input type="text" id="acerage" name="total_acerage" class="form-control" placeholder="0.00">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Land Agent</label>
                                                <input type="text" id="land_agent" name="land_agent" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Change Land Agent</label>
                                                <input type="text" id="change_land_agent" name="change_land_agent" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Status</label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value=""></option>
                                                    <option value="Targeted">Targeted</option>
                                                    <option value="Owner Declined">Owner Declined</option>
                                                    <option value="Potential Local Official">Potential Local Official</option>
                                                    <option value="Negotiating with Owner">Negotiating with Owner</option>
                                                    <option value="Returned Signed">Returned Signed</option>
                                                    <option value="Verbal Commitment">Verbal Commitment</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Opposition</label>
                                                <select class="form-control" name="opposition" id="opposition">
                                                    <option value=""></option>
                                                    <option value="Field Integrity">Field Integrity</option>
                                                    <option value="Financial">Financial</option>
                                                    <option value="Wildlife">Wildlife</option>
                                                    <option value="Crop Damages">Crop Damages</option>
                                                    <option value="Title Encumbrance">Title Encumbrance</option>
                                                    <option value="Flicker">Flicker</option>
                                                    <option value="Sound">Sound</option>
                                                    <option value="Ordinance">Ordinance</option>
                                                    <option value="Red Lights">Red Lights</option>
                                                    <option value="View Shed">View Shed</option>
                                                    <option value="Recreational">Recreational</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Status Date</label>
                                                <input type="date" name="status_date" id="status_date" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Note</label>
                                                <textarea rows="6" name="notes" id="notes" class="form-control" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <h3 class="box-title m-t-40">Contact Info</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <label>Primary Contact</label>
                                                <input type="text" id="primary_contact" name="primary_contact" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" id="address" name="address" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" id="city" name="city" class="form-control">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" id="state" name="state" class="form-control">
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Zip Code</label>
                                                <input type="text" id="zip" name="zip" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" id="phone" name="phone" class="form-control">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Additional Contact</label>
                                                <input type="text" id="additional" name="additional" class="form-control">
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <button type="button" class="btn btn-inverse" onclick="closeModal();">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>



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
                '<td>Primary Contact</td>'+
                '<td>'+d[12]+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Address</td>'+
                '<td>'+d[13] + ' , ' + d[14] + ' , ' + d[15] + ' , ' + d[16] +'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Note</td>'+
                '<td>'+d[9]+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Phone</td>'+
                '<td>'+d[17]+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Additional</td>'+
                '<td>'+d[18]+'</td>'+
                '</tr>'+
                '</table>';
    }

    $(document).ready(function() {
        var table = $('#example23').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'print'
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
                null,null,null,null,
                null,null,null,null
            ],
            columnDefs: [
                { width: 200, targets: 1 }
            ],
            fixedColumns: true
        } );

        // Add event listener for opening and closing details
        $('#example23 tbody').on('click', 'td', function () {
            if($(this).hasClass('details-control')){
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
            }else{
                var datas = $(this).parent().find('td');
                $('#project_id').val(datas[20].textContent);
                $('#owner').val(datas[2].textContent);
                $('#priority').val(datas[3].textContent);
                $('#parcels').val(datas[4].textContent);
                $('#acerage').val(datas[5].textContent);
                $('#land_agent').val(datas[6].textContent);
                $('#change_land_agent').val(datas[7].textContent);
                $('#status').val(datas[8].textContent);
                $('#opposition').val(datas[9].textContent);
                $('#status_date').val(datas[10].textContent);
                $('#notes').val(datas[11].textContent);
                $('#primary_contact').val(datas[12].textContent);
                $('#address').val(datas[13].textContent);
                $('#city').val(datas[14].textContent);
                $('#state').val(datas[15].textContent);
                $('#zip').val(datas[16].textContent);
                $('#phone').val(datas[17].textContent);
                $('#additional').val(datas[18].textContent);
                $('#report_id').val(datas[19].textContent);

                $('#editModal').modal('show');
            }

        } );

    } );
    function closeModal(){
        $('#editModal').modal('hide');
    }
</script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
@endsection
