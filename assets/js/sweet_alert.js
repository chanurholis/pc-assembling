const flashData = $('.flash-data').data('flashdata');
const Login = $('.login').data('login');

if (flashData) {
	Swal.fire(
		'Data',
		'Berhasil ' + flashData,
		'success'
	)
}

if (Login) {
	Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 4500,
			timerProgressBar: true,
		})

		.fire({
			title: 'Signed in successfully',
		})
}

// tombol-hapus
$('.tombol-hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "data akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

// tombol hapus user
$('.tombol-hapus-user').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "User akan dihapus?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus User!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

// tombol reset password
$('.tombol-reset-password').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "Password akan direset?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Reset Password!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});
