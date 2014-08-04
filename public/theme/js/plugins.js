/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */

$(function(){

});


function runFormValidation() {

    var news = $("#contact-feedback-form").validate({
        rules:{
            fio: {required : true},
            email: {required : true, email : true},
            phone: {required : true},
            content: {required : true}
        },
        messages : {
            fio : {required : 'Укажите Ваше полное имя'},
            email : {required : 'Укажите адрес электронной почты'},
            phone : {required : 'Укажите контактный номер телефона'},
            content : {required : 'Укажите текст вопроса'}
        },
        errorPlacement : function(error, element){error.insertAfter(element.parent());},
        submitHandler: function(form) {
            var options = {target: null,dataType:'json',type:'post'};
            options.beforeSubmit = function(formData,jqForm,options){
                $(form).find('.btn-form-submit').elementDisabled(true);
            },
                options.success = function(response,status,xhr,jqForm){
                    $(form).find('.btn-form-submit').elementDisabled(false);
                    if(response.status){
                        if(response.redirect !== false){
                            BASIC.RedirectTO(response.redirect);
                        }
                        $(form).replaceWith(response.responseText);
                    }else{
                        showMessage.constructor(response.responseText,response.responseErrorText);
                        showMessage.smallError();
                    }
                }
            $(form).ajaxSubmit(options);
        }
    });
}