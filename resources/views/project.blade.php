@extends('header')

@section('project_name', $project->name)

@section('app')

    <div id="project" class="container-fluid ps-0" style="background-color: #c3e9ff; height: 100vh;">
        <div class="d-inline-flex p-3 mt-4"
             style="background-color: rgba(23, 117, 171, 0.7); border-radius: 0 5px 5px 0">
            @if($project->type_id == 1 and $role == 1)
                <button data-bs-toggle="modal" data-bs-target="#addUserProject"
                        class="text-white ms-3 fs-5 d-inline-block border-0"
                        style="color:white !important; border-radius: 5px; background-color: rgba(255, 255, 255, 0.3)">
                    Пригласить
                </button>
            @endif
            <h5 class="ms-3 mt-2 fw-semibold text-white">
                @if($project->type_id == 2)
                    <i class="fa-solid fa-lock"></i>
                @else
                    <i class="fa-solid fa-lock-open"></i>
                @endif
                {{$project->type->name}}
            </h5>
        </div>
        <div id="project_task_statuses">

            <div class="row mt-5 ms-2">
                @foreach($tasks as $status => $tasksType)
                    <div class="col-2" id="{{json_decode($status)->id}}">
                        <div class="text-start"
                             style="background-color: rgba(23, 117, 171, 0.7); border-radius: 5px;box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2); ">
                        <span
                            class="fw-bold text-uppercase w-100 d-block pt-3 ps-3 fs-6 text-white text-decoration-none">
                            {{json_decode($status)->name}}
                        </span>
                            <hr>
                            <div class="px-3 mt-3 pb-3">
                                @foreach($tasksType as $task)
                                    <div class="p-3 view-task mb-3 position-relative bg-white"
                                         style="border-radius: 5px; height: auto; width: 100%; box-shadow: 0px 0px 20px 0px rgba(34, 60, 80, 0.2);"
                                         title="{{$task->priority}} приоритет"
                                         data-id="{{$task->id}}">
                                        <div class="">
                                        <span class="py-1 px-3"
                                              style="border-radius: 5px; background-color: {{$task->getColorPriority($task->priority)}}">
                                            Приоритет: {{ $task->priority }}
                                        </span>
                                        </div>
                                        <span style="" class="text-black fw-semibold fs-6">
                                        {{$task->name}}
                                    </span>
                                        <br>
                                        <span style="" class="text-black fs-6 ">
                                        До: {{date('d.m.Y', strtotime($task->sdate))}}
                                    </span>
                                    </div>
                                @endforeach
                                @if($role == 1)
                                    <div class="mt-3">
                                        <a href="#" data-bs-toggle="modal"
                                           data-bs-whatever="{{json_decode($status)->id}}"
                                           data-bs-target="#createTaskModal"
                                           class="text-white text-decoration-none" style="opacity: 0.7">
                                            Добавить задачу...
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                @include('create-task', ['id_project' => $project->id])

                <div class="col-2 mx-2 ">
                    @if($role == 1)
                        <div class="py-2 px-5 text-center"
                             style="opacity: 0.8; background-color: rgba(23, 117, 171, 0.7)">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#createTypeModal"
                               class="text-white text-decoration-none">
                                Добавить список...
                            </a>
                        </div>
                    @endif
                </div>

                <div class="modal fade" id="task-box" tabindex="-1" aria-labelledby="createTypeModal"
                     aria-hidden="true">
                </div>
                @include('new-status', ['id_project' => $project->id])
                @include('add_user')
            </div>
        </div>
    </div>

    <style>
        .view-task {
            cursor: pointer;
        }
    </style>

    <script>
        var exampleModal = document.getElementById('createTaskModal')
        exampleModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')

            var modalBodyInput = exampleModal.querySelector('.modal-body #type_id')
            modalBodyInput.value = recipient
        })

        $('.view-task').click(function () {
            var taskId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: '/task/' + taskId,
                success: function (response) {
                    $("#task-box").html(response);
                    $("#task-box").modal('show');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        })
    </script>
@endsection
