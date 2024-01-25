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
                        <input type="text" value="{{$id_project}}" class="d-none form-control"
                               name="project_id">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Описание:</label>
                        <textarea type="text" class="form-control" name="descr" id="descr"></textarea>
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
