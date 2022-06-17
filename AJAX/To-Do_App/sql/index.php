<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
    <title>To-Do List App</title>
</head>

<body>
    <div class="wrapper">
        <h2 class="title">To-Do List</h2>
        <div class="inputFields">
            <input type="text" id="taskValue" placeholder="Enter a task.">
            <button type="submit" id="addBtn" class="btn"><i class="fa fa-plus"></i></button>
        </div>
        <div class="content">
            <ul id="tasks">

            </ul>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            function loadTasks() {
                $.ajax({
                    url: "show.php", //show tasks
                    type: "POST",
                    success: function(data) {
                        $("#tasks").html(data);
                    }
                });
            }

            loadTasks();

            $("#addBtn").on("click", function(e) {
                e.preventDefault();
                var task = $("#taskValue").val();
                if (task == "") {
                    alert("Please Enter a valid task!");
                } else {
                    $.ajax({
                        url: "add-task.php", //adding tasks
                        type: "POST",
                        data: {
                            task: task
                        },
                        success: function(data) {
                            if (data == 1) {
                                loadTasks();
                                alert("Task added successfully!");
                            } else {
                                alert("Something went wrong. Please try again!");
                            }
                        }
                    });
                }
            });

            $(document).on("click", "#removeBtn", function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                $.ajax({
                    url: "remove.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data == 1) {
                            loadTasks();
                        } else {
                            alert("Something went wrong. Please try again!");
                        }
                    }
                });
            });

            $(document).on("click", "#dltck", function(e) {
                e.preventDefault();
                var task_ids = [];
                i = 0;
                $(".chkr:checked").each(function() {
                    task_ids[i] = $(this).val();
                    i++;
                });
                if (task_ids == "") {
                    alert("Please select the record first!");
                } else {
                    if (confirm("Are you sure you want to delete these tasks?")) {

                        $.ajax({
                            url: 'deletem.php',
                            type: "POST",
                            data: {
                                ids: task_ids
                            },
                            success: function(data) {
                                if (data == 1) {
                                    $(".chkr:checked").each(function() {
                                        $(this).parent().parent().remove();
                                    });
                                } else {
                                    alert("Unknown error while deleting!");
                                }
                            }
                        });
                    }
                }
            });

        });
    </script>
</body>

</html>