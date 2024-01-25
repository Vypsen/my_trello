<div class="modal-dialog" id="task_{{$task->id}}">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="editableText" contenteditable="true"
                class="m-0 fw-bold modal-title task-name"> {{$task->name}}</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('update-task.post') }}">
            @csrf
            <div class="modal-body">
                <select id="task_type" class="form-control mb-2">
                    @foreach ($project->typesTasks as $type)
                        <option
                            value="{{$type->id}}" {{$type->id == $task->type_id ? 'selected' : ''}} >{{ $type->name }}</option>
                    @endforeach
                </select>

                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-list me-2"></i>
                        <label class="fs-6 fw-bold">Описание</label>
                    </div>
                    <div id="editableText" contenteditable="true" class="fs-6 task-descr"> {{$task->descr}} </div>
                    <hr>
                    <div class="fs-6 task-subtasks">

                        @foreach($subtasks as $subtask)
                            <div id="subtask_{{$subtask->id}}" class="form-check mb-2">
                                <input id="add-subtask-form" class=" form-control" value="{{ $subtask->name }}">
                            </div>
                        @endforeach

                        <a id="add-subtask" href="#" class="text-decoration-none" style="color: grey">
                            + подзадача...
                        </a>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="fs-6 fw-semibold">Дата выполнения:</label>
                        <input required value="{{$task->sdate}}" type="date" class="form-control fs-6" name="sdate"
                               id="sdate">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Приоритет:</label>
                        <div class="form-check">
                            <input value="Низкий" class="form-check-input" type="radio" name="priority"
                                {{$task->priority == 'Низкий' ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Низкий
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="Средний" class="form-check-input" type="radio" name="priority"
                                {{$task->priority == 'Срредний' ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Средний
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="Высокий" class="form-check-input" type="radio" name="priority"
                                {{$task->priority == 'Высокий' ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Высокий
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="modal-footer">
            <button type="submit" data-id="{{$task->id}}" class="btn btn-success"
                    style="background-color: #166492; border-color: #166492"
                    id="save-task-btn">Сохранить
            </button>
        </div>
    </div>

</div>

<script>

    $('#add-subtask').click(function () {
        link = '<input id="add-subtask-form" class="mt-2 form-control">'
        $('.task-subtasks').append(link)
    })

    $('#save-task-btn').click(function () {
        taskId = $(this).attr('data-id');

        dataForm = new FormData();

        console.log('#task_' + taskId)
        dataForm.append('taskId', taskId);
        dataForm.append('name', $('#task_' + taskId).find('.task-name').text())
        dataForm.append('descr', $('#task_' + taskId).find('.task-descr').text())
        dataForm.append('sdate', $('#task_' + taskId).find('#sdate').val())
        dataForm.append('priority', $('#task_' + taskId).find('input[name="priority"]:checked').val())
        dataForm.append('type_id', $('#task_' + taskId).find('#task_type option:selected').val())

        $('.task-subtasks > #add-subtask-form').each(function () {
            dataForm.append('subtasks[]', $(this).val())
        })

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/task/update',
            method: "POST",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
                $("#project_task_statuses").load(location.href + " #project_task_statuses > div:first");
                $("#task-box").modal('hide');
            },
            error: function (error) {
                console.log(error)
            }
        });
    })
</script>
