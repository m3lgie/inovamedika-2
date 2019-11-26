    function ConfirmMessage() {
      swal({
                  title: "Apakah Kamu Yakin?",
                  text: "Data Yang Telah Dihapus Tidak Dapat Dikembalikan",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, delete it!",
                  closeOnConfirm: false,
                  closeOnCancel: false
              },
              function(isConfirm){
                  if(isConfirm){
                    setTimeout(function() {
                        $(".delete_form").submit();
                    }, 1000);

                      swal("Deleted!","Data Berhasil Dihapus", "success");
                  }
                  else{
                      swal("cancelled","Data Gagal Dihapus", "error");
                  }
              });
}
