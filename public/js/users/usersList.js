
$(function() {
    $('#tableList').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/users/loadList",
        order: [],
        columns: [
            {data: 'no', orderable: false},
            {data: 'employee_id'},
            {data: 'firstname'},
            {data: 'lastname'},
            {data: 'username'},
            {data: 'email'},  
            {data: 'date_register'},
            // {data: 'activity'},
            {data: 'status','className':'text-center'},
        ]
    });
});