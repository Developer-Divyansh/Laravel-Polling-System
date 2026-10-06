@extends('layouts.mainapp')

@section('content')

<!-- banner -->
<section class="banner_main">
    <div class="container-fluid">
        <div class="row d_flex">
            <div class="col-xl-6 col-lg-6 col-md-6 ">
                <div class="text-bg">
                    <h1>D - Polls</h1>
                    <span> Platform for Growing Genration... <br>
                        Explore Yourself With Us</span>
                    <strong>Go Check for new polls....</strong>
                    <a href="#">Polls</a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 padding_lert2">

                <div class="text-img">
                    <figure><img src="images/pc.png" alt="Go Vote" /></figure>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end banner -->
<!-- about -->
<div class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="titlepage">
                    <h2>Polling</h2>
                    <span class="text-danger">
                        <div onload=display_ct();>  </div>
                        <div> Clock </div>
                        <span id='ct'></span>
                    </span>
                    <br>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="ccol-md-10 offset-md-1">
                <div class="about_box" border="2px" style="width: 170%;">
                    <hr />
                    <div class="container">

                        <div class="row ">
                            <div class="col-md-12 col-md-offset-4">

                                <div>

                                    <button type="button" name="button" onclick="check()" ; class="btn btn-success btn-sm">Check Available Poll</button>

                                </div>

                                <br>

                                <div id="data">

                                </div>

                                <hr />
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

<!-- testimonial -->
<div class="testimonial" style="padding: 90px 0 0px 0;">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Last Polls and Results</h2>
                     <p>Check Few Last Polls</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div id="myCarousel" class="carousel slide testimonial_Carousel " data-ride="carousel">
                     <ol class="carousel-indicators">
                     @foreach($banner_poll as $index=>$m)
                              <li data-target="#myCarousel" data-slide-to="{{$index}}" class="@if($index == 0) 'carousel-item active'  @else 'carousel-item'  @endif "></li>
                              @endforeach
                     </ol>
                     <div class="carousel-inner">
                     @foreach($banner_poll as $k=>$m)
                              <div @if($k==0) class="carousel-item active" ; @else class="carousel-item " ; @endif>
                                 <div class="container">
                                    <div class="carousel-caption ">
                                       <div class="row">
                                          <div class="col-xl-4 col-lg-4 col-md-12 margin_boot">
                                             <div class="test_box1">
                                                <h3>Correct Answer :-</h3>
                                                <h4> {{$m->correct_op}} </h4>
                                             </div>
                                          </div>
                                          <div class="col-xl-8 col-lg-8 col-md-12">
                                             <div class="test_box">
                                                <i><img src="images/te1.png" alt="#" /></i>
                                                <p> {{$m->question}} </p>
                                                
                                                <p>1. {{$m->op1}}   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp;  2. {{$m->op2}}</p>   
                                                
                                                <p>3. {{$m->op3}}    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp;  4. {{$m->op4}}</p>   
                                                
                                                <i class="flot_right"><img src="images/te2.png" alt="#" /></i>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                     <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>

                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end testimonial -->

<!-- **************** Script For Live Clock *********************** -->

<script type="text/javascript">
    function display_c() {
        var refresh = 1000; // Refresh rate in milli seconds
        mytime = setTimeout('display_ct()', refresh)
    }

    function display_ct() {
        var x = new Date().toLocaleString()
        document.getElementById('ct').innerHTML = x;
        display_c();
    }
</script>
</head>


<body onload=display_ct();>

    <!-- end about -->

<!-- **************** Poll Area *********************** -->

    <script>
        function check() {
            // var baseurl="{{url('insert_result')}}";
            $.ajax({
                type: "GET",
                url: "{{url('check_poll')}}",
                success: function(active_poll) {

                    // console.log(active_poll);

                    if (active_poll.length !== 0) {
                        var text = $('#demo').html();
                        $("#data").html(


                            '<div class="user-poll-section">' +
                            '<div class="panel panel-default">' +
                            '<div class="panel-heading">' +
                            '<strong>Question : </strong> ' + active_poll.question + ' ?' +
                            '</div>' +
                            '<hr />' +
                            '<form id="pollform">' +
                            '@csrf' +
                            '<div class="panel-body">' +
                            '<input type="hidden" name="question" id="question" value="' + active_poll.question + '">' +
                            '<div class="radio">' +

                            '<label>' +
                            '<input type="radio" name="answer" value="' + active_poll.op1 + '">' +
                            '<strong>A. </strong>' + active_poll['op1'] + '.' +
                            '</label>' +
                            '<br>' +
                            '<label>' +
                            '<input type="radio" name="answer" value="' + active_poll.op2 + '">' +
                            '<strong>B. </strong>' + active_poll.op2 + '.' +
                            '</label>' +
                            '<br>' +
                            '<label>' +
                            '<input type="radio" name="answer" value="' + active_poll.op3 + '">' +
                            '<strong>C. </strong>' + active_poll.op3 + '.' +
                            '</label>' +
                            '<br>' +
                            '<label>' +
                            '<input type="radio" name="answer" value="' + active_poll.op4 + '">' +
                            '<strong>C. </strong>' + active_poll.op4 + '.' +
                            '</label>' +
                            '</div>' +
                            '<hr />' +
                            '</div>' +
                            '<input type="hidden" name="correct_op" id="correct_op" value="' + active_poll.correct_op + '">' +
                            '<input type="hidden" name="poll_id" id="poll_id" value="' + active_poll.id + '">' +
                            '<div class="panel-footer">' +
                            '<button type="button" name="submit" onclick="datago()" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-bell"></span> Mark Your Answere</button>' +
                            '</div>' +

                            '</form>' +
                            '</div>' +
                            '<p id="demo">' +
                            text +
                            '</p>' +
                            '</div>'

                        );
                    }

                    if (active_poll.length == 0) {
                        $("#data").html('No Poll is Running Yet..!');
                    }
                    setTimeout(check, 8000);
                },
            });
        }

        function datago() {
            var question = $("#question").val();
            var answer = $("input[name='answer']:checked").val();
            var correct_op = $("#correct_op").val();
            var poll_id = $("#poll_id").val();
            // alert(question + '-----' + answer + '-----' + correct_op + '-' + poll_id);

            $.ajax({
                type: 'POST',
                url: "{{url('insert_result')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'question': question,
                    'answer': answer,
                    'correct_op': correct_op,
                    'poll_id': poll_id
                },

                success: function(r) {
                    alert(r);
                },
                complete: function() {
                    document.getElementById("demo").innerHTML = 'Your Marked Answer - ' + answer;
                }
            });

        }
    </script>


@endsection