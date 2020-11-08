(function($){
    $('.quizbook ul li .respuesta').on('click',function(){
       // $('.quizbook ul li .respuesta').removeClass('selecionada') // seleciona una pero si selcciono otro se borra todo
      $(this).siblings().removeAttr('data-seleciona')
       $(this).siblings().removeClass('selecionada') //permite selecionar primps
       $(this).addClass('selecionada')
       $(this).attr('data-seleciona',true)


    })


    $('#quizbook_enviar').on('submit', function(e){
        var cantidadPreguntas 
        e.preventDefault()
        var $respuesta = $('[data-seleciona]')
       // console.log($respuesta) ver que imprime

       var id_respuesta = []
       $.each($respuesta,function(key,value){
         //   console.log(key)
           // console.log(value.id)

            id_respuesta.push(value.id)
       })

       var datos = {
           action : 'quizbook_resultados',
           data : id_respuesta
       }

      cantidadPreguntas =  datos.data.length
       

       $.ajax({
        url: admin_url.ajax_url,
        type: 'post',
        data: datos
   }).done(function(respuesta) {
     //  console.log(respuesta);
     
    var valorAprobado =  cantidadPreguntas * 10
    var clase
    if(respuesta.total === valorAprobado){
        clase = 'aprobado'
    }else{
        clase = 'noaprobado'
    }

    $('#quizbook_resultado').append('total: ' + respuesta.total).addClass(clase)
    $('#quizbook_btn_submit').remove()
    });
    })
})(jQuery)