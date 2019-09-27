
$(document).ready(function(){

    $(".selects").change(function () {
           $('#div').text('');
           var healthy_unhealthy_value = $(this).val();
			$.post('healthy_unhealthy_model.php',{name:healthy_unhealthy_value
			},function(data){

           $('#div').append(data);


			});

    });

})
