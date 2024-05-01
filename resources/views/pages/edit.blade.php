@extends('layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Task Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('task.update', $task->id) }}">
                {!! csrf_field() !!}
                  @method("PATCH")







                    <!-- <div class="row">
                        <div class="col-md-12">
                            <label>Task Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $task->title }}">
                        </div>                       
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" value="{{ $task->description }}">
                        </div>
                    </div> -->

                    <div class="mb-3">
                        <label for="taskFormTitle" class="form-label">Task Title</label>
                        <input type="text" name="title" class="form-control" id="taskFormTitle" value="{{ $task->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="taskFormDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="taskFormDescription" rows="3"> {{ $task->description }} </textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-secondary btn-md">Update</button>
                        </div>

                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
    </style>
@endpush