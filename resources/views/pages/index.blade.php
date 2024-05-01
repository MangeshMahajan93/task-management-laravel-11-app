@extends('layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Task Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

                <div class="form-area">
                    <form method="POST" action="{{ route('task.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="taskFormTitle" class="form-label">Task Title</label>
                            <input type="text" name="title" class="form-control" id="taskFormTitle" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="taskFormDescription" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="taskFormDescription" rows="3"></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-secondary btn-md">Add</button>
                            </div>  
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary position-relative">
                                Pending Task
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $taskCount }} 
                                    </span>
                                </button>
                            </div>
                            
                            


                        </div>
                    </form>
                </div>


                <table class="table mt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ( $tasks as $key => $task )

                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $task->title }}</td>
                            <td scope="col">{{ $task->description }}</td>
                            <td scope="col">

                                                    
                             <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='{{ route('task.edit', $task->id) }}'">Edit</button>

                            
                            <form action="{{ route('task.destroy', $task->id) }}" method="POST" style ="display:inline">
                             @csrf
                            @method('DELETE')


                            <button type="submit" class="btn btn-outline-danger">Delete</button>

                            </form>
                            </td>
                          </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-3">
                <form method="POST" action="{{ route('task.clear') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Clear All Tasks</button>
                </form>
            </div>
        </div>
        
    </div>

@endsection

@push('css')
    <style>    
    </style>
@endpush