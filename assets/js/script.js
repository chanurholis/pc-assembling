const flashData = $('.flash-data').data('flashdata');

if (flashData == 'ditambah') {
	Swal.fire({
		position: 'top-end',
		type: 'success',
		title: 'Your work has been saved',
		showConfirmButton: false,
		timer: 1500
	})
}
