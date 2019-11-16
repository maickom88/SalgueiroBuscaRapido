$('#email').keyup(function(){

    var text = $(this).val();
    if (text){
        document.getElementById('email-label').style.transform="translateY(-30px)"
    }
    else if(!text){
        document.getElementById('email-label').style.transform="translateY(0px)"
    }
});

$('#senha').keyup(function(){

    var text = $(this).val();
    if (text){
        document.getElementById('senha-label').style.transform="translateY(-30px)"
    }
    else if(!text){
        document.getElementById('senha-label').style.transform="translateY(0px)"
    }
});


$('#nome').keyup(function(){

    var text = $(this).val();
    if (text){
        document.getElementById('nome-label').style.transform="translateY(-30px)"
    }
    else if(!text){
        document.getElementById('nome-label').style.transform="translateY(0px)"
    }
});

$('#confsenha').keyup(function(){

    var text = $(this).val();
    if (text){
        document.getElementById('senha-label-conf').style.transform="translateY(-30px)"
    }
    else if(!text){
        document.getElementById('senha-label-conf').style.transform="translateY(0px)"
    }
});

    $('#senha').keyup( function(){

     text = $(this).val();
    if (text.length < 7){
        document.getElementById('alerta').style.display="block"
    }
    else{
        document.getElementById('alerta').style.display="none"
    }
}
);
    $('#confsenha').keyup( function(){

     text2 = $(this).val();
    if (text2.length < 7){
        document.getElementById('alerta').style.display="block"
    }
    else{
        document.getElementById('alerta').style.display="none"
    }
}
);


