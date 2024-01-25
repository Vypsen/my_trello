$(document).ready(function () {


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
})
