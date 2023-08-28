function sweetAlert(time,title,msg,status){
    Swal.fire({
        title: 'Please wait . . .',
        timer: time,
        onOpen: function () {
            swal.showLoading();
        }
    }).then(
        function () {
            Swal.fire(title,msg,status)
        },
        // handling the promise rejection
        function (dismiss) {
            if (dismiss === 'timer') {
               
            }
        }
    );
}