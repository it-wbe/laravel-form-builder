<?php if($validatorOptions['showJSLibs']): ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<?php endif;?>
<?php if($validatorOptions['showJSValidation']): ?>
    <script type="text/javascript">
        $("#<?=$form_id?>").validate({
            wrapper: 'span',
            errorPlacement: function (error, element) {
                error.addClass("text-danger")
                error.insertAfter(element);
            },
            submitHandler: function(form) {
                let temp_form = form;
                $.ajax({'type':"POST",'url':"<?= route('kris.form-submit')?>", data:$(form).serialize(),
                success:function(data){
                    if(data.success == true){
                        temp_form.parentElement.innerHTML = "<div class='success'>"+data.message+"</div>";
                    }else{
                        temp_form.parentElement.appendChild("<div class='error'>"+data.message+"</div>")
                    }
                    // console.log(form_c);
                    // let parent = form.pare form.hide();
                    // console.log(data);
                },
                beforeSend: function() {
                    // setting a timeout
                    $(form).onsubmit = function (e) {
                        return false;
                    };
                },
                });
            },
            rules:{<?php foreach ($rules as $rule):?><?= $rule ?><?endforeach;?>}
        });
    </script>
<?php endif;?>