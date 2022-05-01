import Swal from "sweetalert2";

export default () => ({
    openModal () {
        event.preventDefault();
        $('#module-modal').modal('show');
    },

    saveFile(){
        // let btn = $(event.currentTarget),
        //     form = btn.closest('form');

        let form = $('#import_files');
        let url = $(form).attr('action');
        let form_data = new FormData(form[0]);

        axios.post(url, form_data).then((data) => {
            Swal.fire({
                title: data.data.message,
                type: 'success',
                toast: false,
                position:'top-middle',
                showCancelButton: false,
                showConfirmButton: false
            });
            $('#module-modal').modal('hide');
            setTimeout(()=>{
                location.reload();
            }, 2000)

        }).catch(function (error) {
            $('.import_file_error').text(error.response.data.errors.file);
        })
    }
})
