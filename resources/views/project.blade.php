@extends('header')

@section('app')
    <div class="container-fluid" style="background-color: #008adc; height: 100vh;">
        <div class="d-flex pt-4">
            <h2 class="fw-semibold text-white"> {{$project->name}} </h2>
            <button class="ms-3 text-white fs-5 d-inline-block border-0"
                    style="color:white !important; border-radius: 5px; background-color: rgba(255, 255, 255, 0.3)">
                Пригласить
            </button>
            <h5 class="ms-3 mt-2 fw-semibold text-white"> {{$project->type->name}} </h5>

        </div>
        <div class="row mt-5">
            @foreach($tasks as $status => $tasksType)

                <div class="col-2">
                    <div class="text-start" style="background-color: rgba(0, 85, 128, 0.7); border-radius: 5px">
                        <span class="p-3 fs-5 text-white text-decoration-none">
                            {{json_decode($status)->name}}
                        </span>
                        <div class="px-2 mt-3 pb-3">
                            @foreach($tasksType as $task)
                                <div class="p-2 mb-3"
                                     style="border-radius: 5px; height: auto; width: 100%; background-color: {{$task->getColorPriority($task->priority)}}"
                                title="{{$task->priority}} приоритет">
                                    <span style="" class="text-black fw-medium fs-5">
                                        {{$task->name}}
                                    </span>
                                    <br>
                                    <span style="" class="text-black fw-medium fs-5">
                                        даты выполнения: {{$task->sdate}}
                                    </span>
                                </div>
                            @endforeach

                            <div class="mt-3">
                                <a href="#" data-bs-toggle="modal" data-bs-whatever="{{json_decode($status)->id}}"
                                   data-bs-target="#createTaskModal"
                                   class="text-white text-decoration-none " style="opacity: 0.7">
                                    Добавить задачу...
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModal"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Задача</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{route('create-task.post')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Название:</label>
                                    <input required type="text" class="form-control" name="name" id="">
                                    <input type="text" value="{{$project->id}}" class="d-none form-control"
                                           name="project_id">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Описание:</label>
                                    <input type="text" class="form-control" name="descr" id="descr">
                                    <input type="text" class="d-none form-control" name="type_id" id="type_id">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Дата выполнения:</label>
                                    <input required type="date" class="form-control" name="sdate" id="sdate">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Приоритет:</label>
                                    <div class="form-check">
                                        <input value="Низкий" class="form-check-input" type="radio" name="priority"
                                               id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Низкий
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input value="Средний" class="form-check-input" type="radio" name="priority"
                                               checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Средний
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input value="Высокий" class="form-check-input" type="radio" name="priority">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Высокий
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" style="background-color: #166492"
                                        id="add-new-project-btn">Создать задачу
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-2 mx-2 ">
                <div class="py-2 px-5 text-center" style="opacity: 0.8; background-color: #005580">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#createTypeModal"
                       class="text-white text-decoration-none">
                        Добавить список...
                    </a>

                </div>

                <div class="modal fade" id="createTypeModal" tabindex="-1" aria-labelledby="createTypeModal"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Новый статус</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{route('status-task.post')}}">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Название:</label>
                                        <input type="text" class="form-control" name="name" id="recipient-name">
                                        <input type="text" value="{{$project->id}}" class="d-none form-control"
                                               name="project_id">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" style="background-color: #166492"
                                            id="add-new-project-btn">Создать список
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        var exampleModal = document.getElementById('createTaskModal')
        exampleModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')

            var modalBodyInput = exampleModal.querySelector('.modal-body #type_id')
            modalBodyInput.value = recipient
        })
    </script>
@endsection

