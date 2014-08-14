<div class="panel-body">
    <form id="myForm" method="POST">
        <div class="form-group">
            <label for="inputName">name</label>
            <input type="text" class="form-control" id="inputName" name="name" >
        </div>
        <div class="form-group">
            <label for="inputLname">Password</label>
            <input type="text" class="form-control" id="inputLname" name="lname" >
        </div>
        <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>
</div>
<script>
    $('#myForm').submit(function(e) {
        e.preventDefault();
        var currentForm = this;
        js:bootbox.confirm("Are you sure?", function(result) {
            if (result) {
                currentForm.submit();
            }
        });
    });
</script>