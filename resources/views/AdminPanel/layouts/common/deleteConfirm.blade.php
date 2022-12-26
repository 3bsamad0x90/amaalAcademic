<script>
    function confirmDelete(url,id) {
        Swal.fire({
            title: 'هل أنت متأكد؟',
            text: 'لن تستطيع استعادة تلك البيانات مرة أخرى',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'نعم، احذف!',
            cancelButtonText: 'إلغاء',
            customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ms-1'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    method   : 'get',
                    url      : url,
                    dataType : 'json',
                    success : function(data){
                        if(data != "false"){
                            Swal.fire({
                                icon: 'success',
                                title: 'تم الحذف بنجاح',
                                text: 'لقد قام النظام بحذف كافة البيانات بنجاح',
                                customClass: {
                                confirmButton: 'btn btn-success'
                                }
                            });
                            $('#row_'+data).fadeOut();
                            $('#row_'+data).remove();
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'لم يتم الحذف',
                                text: 'لم ننجح في حذف البيانات يرجى التواصل مع الدعم الفني',
                                customClass: {
                                confirmButton: 'btn btn-success'
                                }
                            });
                        }
                    }
                })
            }
        });
    }
</script>
