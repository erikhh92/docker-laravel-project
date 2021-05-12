export function isUniqueEmail(email) {

	if (email === '') return true;
	return axios.get('/users/check-unique-email/'+email)
	.then(res => {
		return res.data;
	});

}