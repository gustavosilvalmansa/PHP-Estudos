let btn_subscribe = document.querySelector('#btn_subscribe');

btn_subscribe.onclick = function(){
		axios.post('/public/user/subscribe').then((response) => {
			console.log(response);
		});
};