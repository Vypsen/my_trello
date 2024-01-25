<div class="modal fade" id="addUserProject" tabindex="-1" aria-labelledby="addUserProject"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить человека в проект</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('add-user-project.post')}}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">E-mail:</label>
                        <input type="text" class="form-control" name="email" id="email">
                        <input type="text" value="{{$project->id}}" class="d-none form-control"
                               name="project_id">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input checked value="1" class="form-check-input" type="radio"
                                   name="role_id"
                                   id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Редактор
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="2" class="form-check-input" type="radio" name="role_id"
                                   id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Исполнитель
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button  type="submit" class="btn btn-success" style="background-color: #166492"
                             id="add-new-project-btn">Добавить
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
