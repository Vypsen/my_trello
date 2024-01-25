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
                        <input type="text" value="{{$id_project}}" class="d-none form-control"
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
