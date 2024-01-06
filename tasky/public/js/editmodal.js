var resolve = document.getElementsByClassName('resolve');

Array.from(resolve).forEach(function (element) {
    element.addEventListener('click', function (e) {
        cover=e.target.parentNode.parentNode.parentNode;
        console.log(cover);
        $taskdescription=cover.querySelector("#description").value;
        console.log($taskdescription);
        task_description.innerHTML=$taskdescription;
        sno.value = e.target.id;
        $('#resolve').modal('toggle');
    });
});

var deletes = document.getElementsByClassName('delete');

Array.from(deletes).forEach(function (element) {
    element.addEventListener('click', function (e) {
        sno.value = e.target.id;
        $('#deletemodal').modal('toggle');
    });
});

var image = document.getElementsByClassName('task-image');
Array.from(image).forEach(function (element) {
    element.addEventListener('click', function (e) {
        modal_task_image.setAttribute("src", e.target.attributes[0].value);
        $('#review-task').modal('toggle');
    });
});