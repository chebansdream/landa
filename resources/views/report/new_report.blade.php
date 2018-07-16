@extends('template')
@section('page_content')
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Report Data</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('add_report')}}">
                        @csrf
                        <div class="form-body">
                            <h3 class="card-title">Report Details</h3>
                            <hr>
                            <div class="row p-t-20">
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
                                        <input type="text" name="land_agent" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Change Land Agent</label>
                                        <input type="text" name="change_land_agent" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Status</label>
                                        <select class="form-control" name="status">
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
                                        <select class="form-control" name="opposition">
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
                                        <input type="date" name="status_date" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Note</label>
                                        <textarea rows="6" name="notes" class="form-control" placeholder=""></textarea>
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
                                        <input type="text" name="primary_contact" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Zip Code</label>
                                        <input type="text" name="zip" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Additional Contact</label>
                                        <input type="text" name="additional" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                            <button type="button" class="btn btn-inverse">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
@endsection
@section('custom_script')
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
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
@endsection