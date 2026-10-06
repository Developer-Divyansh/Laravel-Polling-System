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
                            <h4 class="widget-title smaller">Polls List
                                <div style="float: right;">
                                <a href="{{ url('pollcreate') }}" type="button" class="btn btn-primary btn-sm pull-right" title="Add New Poll">
                                    <i class="fa fa-plus"></i> Create New Poll
                                </a>
                                </div>
                            </h4>
                        </div>


                        <div class="card-body">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>op1</th>
                                        <th>op2</th>
                                        <th>op3</th>
                                        <th>op4</th>
                                        <th>Answer</th>
                                        <th>Start_dt</th>
                                        <th>End_dt</th>
                                        <th>Status for display on Banner</th>
                                        <th class="no-sort text-center">Action</th>
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
                                            {{$l->op1}}
                                        </td>
                                        <td>
                                            {{$l->op2}}
                                        </td>
                                        <td>
                                            {{$l->op3}}
                                        </td>
                                        <td>
                                            {{$l->op4}}
                                        </td>
                                        <td>
                                            <strong>{{$l->correct_op}}</strong> 
                                        </td>
                                        <td class="text-danger">
                                            {{$l->start_dt}}
                                        </td>
                                        <td class="text-danger">
                                            {{$l->end_dt}}
                                        </td>
                                       
                                        <td class="project-state">
                                            <span class="badge badge-success">{{$l->status}}</span>
                                        </td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-primary btn-sm" href="{{"/pollactive/".$l['id']}}">
                                                <i class="fas fa-active">
                                                </i>
                                                Active
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="{{"/polldeactive/".$l['id']}}">
                                                <i class="fas fa-Deactive">
                                                </i>
                                                Deactive
                                            </a>
                                            <!-- <a class="btn btn-info btn-sm" href="{{"/polledit/".$l['id']}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a> -->

                                            <a class="btn btn-danger btn-sm"  href="{{"/polldelete/".$l['id']}}">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
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
