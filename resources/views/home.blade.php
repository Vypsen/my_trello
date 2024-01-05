@extends('header')

@section('app')
    <div class="container mt-5">
        <div class="row">
            @foreach($projects as $project)
                <div class="col-3 mb-3 hover-zoom">
                    <a href="{{route('project', ['id' => $project->id])}}"
                       style="overflow: hidden;display: block; height: 100px; border-radius: 5px; border: 1px solid #bbbbbb; background-color: #166492; box-shadow: 0px 0px 10px 2px rgba(34, 60, 80, 0.2);"
                       class=" text-decoration-none position-relative" id="add-project">
                        <div class="ms-3">
                            <span class="d-block fs-5 " style="color: white; margin-top: 5px">
                                {{$project->name}}
                            </span>
                            <span class="d-block " style="color: #eeeeee;">
                                {{$project->descr}}
                            </span>
                            <span class="position-absolute top-0 end-0 me-2" style="color: #eeeeee;">
                                {{$project->type->name}}
                            </span>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-3 mb-3">
                <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"
                   style="display: block; height: 100px; border-radius: 5px; border: 1px solid #bbbbbb"
                   class=" text-decoration-none" id="add-project">
                    <span class="d-block fs-5 text-center" style="color: #777; margin-top: 30px">
                        <i class="fa-solid fa-plus"></i> создать проект
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Новый проект</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{route('projects.post')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Название:</label>
                            <input type="text" class="form-control" name="name" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Описание:</label>
                            <textarea class="form-control" name="descr" id="message-text"></textarea>
                        </div>
                        <div class="form-check">
                            <input value="1" class="form-check-input" type="radio" name="type_id"
                                   id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Публичный
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="2" class="form-check-input" type="radio" name="type_id" id="flexRadioDefault2"
                                   checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Приватный
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" style="background-color: #166492"
                                id="add-new-project-btn">Создать проект
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

