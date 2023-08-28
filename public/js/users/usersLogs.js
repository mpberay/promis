
$(function() {
    $('#tableLogs').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/users/loadLogs",
        order: [],
        columns: [
            {data: 'no', orderable: false},
            {data: 'userID'},
            {data: 'username'},
            {data: 'fullName'},
            {data: 'sessionID'},
            {data: 'hostname'},
            {data: 'date'},
            {data: 'activity'},
            {data: 'action','className':'text-center'},
        ]
    });
});