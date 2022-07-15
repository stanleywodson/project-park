$(function () {
	async function test()
	{
		try {
			const response = await axios.post('/park/pricing/index')
				.then(response => {
					console.log(response.data);
				})

		} catch (error) {
			console.log(error)
		}
	}

	test()
})
