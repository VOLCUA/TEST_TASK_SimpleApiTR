<div class="container">
    <form id="dateRangeForm">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="fromDate">From:</label>
                <input type="date" class="form-control" id="fromDate" name="fromDate" value="2024-01-01">
            </div>
            <div class="form-group col-md-6">
                <label for="toDate">To:</label>
                <input type="date" class="form-control" id="toDate" name="toDate" value="2024-03-07">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div id="tableContainer"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dateRangeForm').submit(function(event) {
            event.preventDefault();
            var fromDate = $('#fromDate').val();
            var toDate = $('#toDate').val();

            $.ajax({
                url: '?api=info',
                method: 'POST',
                data: { from: fromDate, to: toDate },
                success: function(response) {
                    var data = JSON.parse(response);
                    var tableHtml = '<table class="table"><thead><tr><th>ID</th><th>Email</th><th>Status</th><th>FTD</th></tr></thead><tbody>';
                    data.forEach(function(item) {
                        tableHtml += '<tr><td>' + item.id + '</td><td>' + item.email + '</td><td>' + item.status + '</td><td>' + item.ftd + '</td></tr>';
                    });
                    tableHtml += '</tbody></table>';
                    $('#tableContainer').html(tableHtml);
                },
                error: function() {
                    console.log('Error fetching data');
                }
            });
        });
    });
</script>