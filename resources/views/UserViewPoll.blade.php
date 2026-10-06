@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Polls Display List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Polls</li>
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
                            <h4 class="widget-title smaller">My Polls List</h4>
                        </div>


                        <div class="card-body">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>My_Answer</th>
                                        <th>Correct_Answere</th>
                                    </tr>
                                </thead>
                                <tbody> @foreach($Poll as $l)
                                    <tr>
                                        <td>
                                            <a>
                                                {{$l->question}}
                                            </a>
                                        </td>
                                        <td>
                                            {{$l->answer}}
                                        </td>
                                        <td>
                                            <strong>{{$l->correct_op}}</strong> 
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