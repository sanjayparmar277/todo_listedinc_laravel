@extends('layouts.app')

@section('content')
    <h1>Todos listed inc</h1>
    <hr>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    {{-- Created alert component for common uses --}}
                    <x-alert></x-alert>

                    <form action="{{ route('todo_save') }}" method="POST" class="row gy-2 gx-3 align-items-center">
                        @csrf
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Task</label>
                                    <input type="text" class="form-control" name="task" placeholder="Your task">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit" style="position: relative; top: 30px; width: 100%">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>
    <h2>Pending tasks</h2>
    <hr>

    <x-alert-update-delete></x-alert-update-delete>

    <ul class="list-group">
         @if ( count($pending_todos) > 0)
            @foreach($pending_todos as $pending_todo)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-8">
                            <strong>
                                {{ $pending_todo->task }}
                            </strong>
                        </div>
                        <div class="col-md-4">
                            <span class="bi-calendar4-event" data-bs-toggle="tooltip" data-bs-html="true" title="<em>Task created at</em>" style="margin-right: 10px;"> - <i>{{ date('d-m-Y', strtotime($pending_todo->created_at)) }}</i></span>
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false">
                                {{-- <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false" style="margin-right: 10px;"> --}}
                                    <span class="bi-pencil-fill" data-bs-toggle="tooltip" data-bs-html="true" title="<em>edit</em>"></span>
                                {{-- </a> --}}
                            </button>
                            <form action="{{ route('todo_delete', $pending_todo->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <span class="bi-trash-fill" data-bs-toggle="tooltip" data-bs-html="true" title="<em>delete</em>"></span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="collapse mt-2" id="collapse-{{ $loop->index }}">
                        <div class="card card-body">
                            <form action="{{ route('todo_update', $pending_todo->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="task" value="{{ $pending_todo->task }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="mb-3">
                                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="status" {{ ($pending_todo->status == 1) ? "checked" : "" }}>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Complete
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="mb-3">
                                            <button class="btn btn-info" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        @else
            <li class="list-group-item">
                <span style="color: red">{{ 'No Task found!' }}</span>
            </li>
        @endif
    </ul>

    <br>

    <h2>Completed tasks</h2>
    <hr>
    <ul class="list-group">
        @foreach($completed_todos as $completed_todo)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-9">
                        <strong>
                            <del>{{ $completed_todo->task }}<del>
                        </strong>
                    </div>
                    <div class="col-md-3">
                        <span class="bi-calendar4-event" data-bs-toggle="tooltip" data-bs-html="true" title="<em>Task created at</em>" style="margin-right: 10px;"> - <i>{{ date('d-m-Y', strtotime($completed_todo->created_at)) }}</i></span>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
