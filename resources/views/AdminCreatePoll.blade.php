@extends('layouts.app')

@section('content')
<div class="content-wrapper" align="center">


    <div class="col-md-8" align="left">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Poll Form</h3>
            </div>

            <form action="{{ url('insertpoll') }}" method="post" id="formid" enctype="multipart/form-data" data-parsley-validate>
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Question</label>
                        <input type="text" class="form-control" id="question" name="question" placeholder="Enter Question">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Options</label>
                        <div class="row">
                        <div class="col-3">
                            <input type="text" id="op1" name="op1" placeholder="First Option">
                        </div>
                        <div class="col-3">
                            <input type="text" id="op2" name="op2" placeholder="Second Option">
                        </div>

                        <div class="col-3">
                            <input type="text" id="op3" name="op3" placeholder="Third Option">
                        </div>
                        <div class="col-3">
                            <input type="text" id="op4" name="op4" placeholder="Fourth Option">
                        </div>
                        </div>
                        </div>
                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">Answere</label>
                        <input type="text" class="form-control" id="correct_op" name="correct_op" placeholder="Correct Option">
                    </div>

                    <div class="form-group">
                        <label>Start Date and Time:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" name="start_dt" id="start_dt" class="form-control datetimepicker-input" data-target="#reservationdate" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>End Date and time:</label>
                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                            <input type="text" name="end_dt" id="end_dt" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                            <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <br>
                    {{ '"'.date("m/d/Y h:i A").'"' }}
                </div>
            </form>
            </div>
        </div>
    </div>
    @endsection

    @section('script')

    <!-- From admin LTE -->




    <script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>

    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>



    <script type="text/javascript">
        $(function() {
            $('#reservationdate').datetimepicker();
        });

        $(function() {
            $('#reservationdatetime').datetimepicker();
        });
    </script>

    @endsection