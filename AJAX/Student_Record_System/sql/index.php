<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Bucket-List</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <table id="main" border="4" cellspacing="8">
        <tr>
            <td>
                <h2 id="head">
                    Add your favourite spots to visit!
                </h2>
            </td>
        </tr>
        <tr>
            <td id="field" border="1">
                <form id="frm">
                    <b>Country:</b> <input type="text" id="cntry" name="Country"> &nbsp; &nbsp;
                    <b>Capital:</b> <input type="text" id="cptl" name="Capital"> &nbsp; &nbsp;
                    <b>Visit:</b> <input type="text" id="vst" name="Visit"> &nbsp; &nbsp;
                    <input type="submit" id="btn" value="Enter">
                </form>
            </td>
        </tr>
        <tr>
            <td id="list">
            </td>
        </tr>
    </table>

    <div id="err-msg"></div>
    <div id="scs-msg"></div>
    <div id="modal">
        <div id="modal-form">
            <h2 align="center">Edit Your Choice</h2>
            <hr>
            <table cellpadding="10px" width="100%">
                <!-- <tr>
                    <td>Country<b>:</b></td>
                    <td><input type="text" id="ecntry"></td>
                </tr>
                <tr>
                    <td>Capital<b>:</b></td>
                    <td><input type="text" id="ecptl"></td>
                </tr>
                <tr>
                    <td>Visit<b>:</b></td>
                    <td><input type="text" id="evst"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" id="esbmt" value="Save"></td>
                </tr> -->
            </table>
            <div id="cross">X</div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function loadTable() {
                $.ajax({
                    url: "display.php",
                    type: "POST",
                    success: function(data) {
                        $("#list").html(data);
                    }
                });
            }
            loadTable();

            $("#btn").on("click", function(e) {
                e.preventDefault();
                var country = $("#cntry").val();
                var capital = $("#cptl").val();
                var visit = $("#vst").val();

                if (country == "" || capital == "" || visit == "") {
                    $("#err-msg").html("All fields are required!").slideDown();
                    $("#scs-msg").slideUp();
                } else {
                    $.ajax({
                        url: "insert.php",
                        type: "POST",
                        data: {
                            c: country,
                            cp: capital,
                            v: visit
                        },
                        success: function(data) {
                            if (data == 1) {
                                loadTable();
                                $("#scs-msg").html("Data Inserted Successfully.").slideDown();
                                $("#err-msg").slideUp();
                            } else {
                                $("#err-msg").html("Can't Save Record.").slideDown();
                                $("#scs-msg").slideUp();
                            }
                        }
                    });
                }
            });
        });

        $(document).on("click", ".edt", function() {
            $("#modal").show();
            var cid = $(this).data("eid");

            $.ajax({
                url: "edit.php",
                type: "POST",
                data: {
                    edit: cid
                },
                success: function() {
                    $("#modal-form").html(data);
                }
            });
        });

        $("#cross").on("click", function() {
            $("#modal").hide();
        });
    </script>
</body>

</html>