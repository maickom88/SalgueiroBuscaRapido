

    var controller = 0
    var aux = 0
    function getEmpre(one){
        
        if(one==1)
        {
            controller++
            if(controller==1 & aux==0){
                document.getElementById("empresa").style.animation="getpainel 1s 0.5s"
                document.getElementById("click").style.animation="push 1s 0.5s"
                document.getElementById("click").style.left="-35px"
                document.getElementById("empresa").style.transform="translateX(0px)"
                document.getElementById("click").style.background="white"
                document.getElementById("click").style.color="black"
                document.getElementById("bloco").style.zIndex="2"
                
                
                aux++
            }
            else if(controller==2 & aux!=0){
                document.getElementById("empresa").style.animation="getpainelvoltar 1s 0.5s"
                document.getElementById("click").style.animation="pushvoltar 1s 0.5s"
                document.getElementById("click").style.left="235px"
                document.getElementById("empresa").style.transform="translateX(300px)"
                document.getElementById("click").style.background="black"
                document.getElementById("click").style.color="white"
                document.getElementById("bloco").style.zIndex="-1"
                controller=0 
                aux=0
            }
        }
    }

 var controller = 0
    var aux = 0
    function mostrarsenha(one){
        
         if(one==1)
        {
            controller++
            if(controller==1 & aux==0){
                aux++
                var tb = document.getElementById('senha');

                 tb.type="text"
            }
            else if(controller==2 & aux!=0){
                var tb = document.getElementById('senha');
                tb.type="password"
                controller=0 
                aux=0
            }
        }
    }

 var controllerp = 0
    var auxp = 0
    function mostrarsenha2(onep){
        
        if(onep==1)
        {
            controllerp++
            if(controllerp==1 & auxp==0){
                auxp++
                var tbp = document.getElementById('senha-2');

                tbp.type="text"
            }
            else if(controllerp==2 & auxp!=0){
                var tbp = document.getElementById('senha-2');
                tbp.type="password"
                controllerp=0 
                auxp=0
            }
        }
    }


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


$('#email-2').keyup(function(){

    var text = $(this).val();
    if (text){
        document.getElementById('email-label-2').style.transform="translateY(-30px)"
    }
    else if(!text){
        document.getElementById('email-label-2').style.transform="translateY(0px)"
    }
});

$('#senha-2').keyup(function(){

    var text = $(this).val();
    if (text){
        document.getElementById('senha-label-2').style.transform="translateY(-30px)"
    }
    else if(!text){
        document.getElementById('senha-label-2').style.transform="translateY(0px)"
    }
});




    function calcular(){
    var valor1 = parseInt(document.getElementById('txt1').value, 10);
    var valor2 = parseInt(document.getElementById('txt2').value, 10);
    document.getElementById('result').value = valor1 + valor2;
}
