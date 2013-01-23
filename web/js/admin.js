$(document).ready(function(){

	$('#cro_reservations_filters_userid').keyup(function(key)
	{
		$('#email-list').empty();
		if (this.value.length >= 1) {
			$.ajax({
				type: 'GET',
				timeout: 5000,
				url: '/admin.php/users/emaillist',
				data: { limit: 25, find: this.value },

				success:function(data){
					var arrEmail = eval(data);
					var emailList = [];

					if(arrEmail){
						for (var i=0;i<arrEmail.length;i++) { 
							emailList.push(arrEmail[i].email)
						}

						$("#cro_reservations_filters_userid").autocomplete( { source: emailList });
					}
				}	
			});
		}
	});
});