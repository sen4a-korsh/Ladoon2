$(document).ready(function (){

    $("#registerFrom").submit( function (e){
        e.preventDefault()

        // const data =  $("#registerFrom").serializeArray();


        const first_name = $.trim($('input[name="first_name"]').val());
        const last_name = $.trim($('input[name="last_name"]').val());
        const email = $.trim($('input[name="email"]').val());
        const password = $.trim($('input[name="password"]').val());
        const password_confirmation = $.trim($('input[name="password_confirmation"]').val());

        if(email === '' || password === '' || first_name === '' || last_name === ''){
            $('#error').html('Fill in all fields!');
        }else{
            $.ajaxSetup({
                headers: {
                    'X_CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                dataType: 'text',
                // data: data,
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    password: password,
                    password_confirmation: password_confirmation,
                },
                success (data){
                    data = JSON.parse(data)
                    console.log(data.code)
                    if (data.code == 200){
                        console.log('complete')
                        $('#card-body').html( '<div class="text-center text-success"><h2>' + data.msg + '</h2></div>');
                    }else if(data.code == 405){
                        $('#error').html(data.msg);
                    }
                }
            })
        }
    })
})
