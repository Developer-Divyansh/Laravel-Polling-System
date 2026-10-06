@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Polls Results</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Results</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="widget-title smaller">Results</h4>
                        </div>

                        <div class="card-body">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Votter's_id</th>
                                        <th>Question</th>
                                        <th>User_Answer</th>
                                        <th>Correct_Answere</th>
                                        <th>Poll_id</th>
                                </thead>
                                <tbody> @foreach($Result as $l)
                                    <tr>
                                        <td>
                                            <a>
                                                {{$l->user_id}}
                                            </a>
                                        </td>
                                        <td>
                                            {{$l->question}}
                                        </td>
                                        <td>
                                            {{$l->answer}}
                                        </td>
                                        <td>
                                            <strong>{{$l->correct_op}}</strong>
                                        </td>
                                        <td>
                                            {{$l->poll_id}}
                                        </td>
                                        
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
