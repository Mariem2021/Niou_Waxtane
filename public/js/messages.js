
var exp ;
function expedition(expe){
    exp = expe;
}
Buttons = document.getElementsByClassName("submit");
var destinataire; 

for(var i =0; i<Buttons.length; i++){
    console.log("Bonsoir" +i );
    //console.log(Buttons[i].innerText);
    Buttons[i].addEventListener("click", function(e){
    console.log(this.innerText);
    destinataire = this.innerText;
    e.preventDefault(); 
/* 
    let formData = new FormData();
    formData.append('user', this.innerText);
    //formData.append('password', 'azerty123');

    fetch("/messages", {
        method: "POST",
        body: formData
    })
    //.then(response => response.json())
    .then(response => console.log(response))
    .catch(error => alert("Erreur : " + error));

}); */
    //console.log("Hello world");
/*     $.ajax({
        url: "/messages",
        data: { user: this.innerText},
        type: "POST",
        context: document.body
      }).done(function(response) {
        console.log(response); 
        //let data = JSON.stringify(response);
      }).fail(function(error){
        alert("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
      });
    }); */

     var xhr = new XMLHttpRequest;
     var parser = new DOMParser();
     var responseHtmlFormat;

    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
           console.log(this.response);
           parser = new DOMParser()
           responseHtmlFormat = parser.parseFromString(this.response, 'text/html')
           var messagesTab = responseHtmlFormat.getElementsByTagName("p");
           //console.log(messagesTab[1]);
           //console.log(responseHtmlFormat.getElementsByTagName("p")[1].innerText);
           while (messages.firstChild) {
            messages.removeChild(messages.firstChild);
        }
            for(var i = 0; i < messagesTab.length; i++) { 
                if(messagesTab[i].classList.contains("envoi")){
                    messages.innerHTML+='<p class = "envoi">'+ messagesTab[i].innerHTML +'</p>';
                }else if(messagesTab[i].classList.contains("recu")){
                    messages.innerHTML+='<p class = "recu">'+ messagesTab[i].innerHTML +'</p>'; 
                }
                

                //messages.innerHTML+='<br />'
            //console.log(this.getAllResponseHeaders());
            }
            messages.innerHTML+='<form id="formMessage"><input type="text" id="msEnvoi" placeholder="Envoyez un message"><input type="submit" value="Envoyer">';
            messages.innerHTML+='</form>';
        } else if(this.readyState == 4){
            alert("Une erreur est survenue");
        }



    }
    
    xhr.open("POST","/messages",true);
   // xhr.responseType = "json";
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("user="+this.innerText);
    return false;

    }); 

}

    document.addEventListener("submit",function(e){
        e.preventDefault();
        //mess = document.getElementById("msEnvoi");


        var xhr = new XMLHttpRequest;

        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
            // console.log(this);
                parser = new DOMParser()
                responseHtmlFormat = parser.parseFromString(this.response, 'text/html')
                var etat = responseHtmlFormat.getElementsByTagName("span")[0];
                console.log(etat.innerText);
                if(etat.innerText == 'vrai'){
                    element = document.getElementById(""+destinataire+"")
                    element.dispatchEvent(new Event('click'));
                }
            }
        }

        xhr.open("POST","/registermessage",true);
        // xhr.responseType = "json";
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("destmess="+destinataire+"&message="+ msEnvoi.value+"&expeditmess="+exp);
        
        console.log(destinataire);
        
        console.log(msEnvoi.value);
        
        console.log(exp);
        return false;

    });


/*
function(dest){

}
*/
/*
Buttons = document.getElementsByTagName("button");

    console.log(Buttons[0]);

 document.getElementsByTagName("button").addEventListener("onclick", function(e){
    e.preventDefault();
    console.log("Hello world");
    var_xhr = new XMLHttpRequest;
    return False;

});
*/
/*
for(var i =0; i<Buttons.length; i++){
    console.log("Bonsoir" +i );
    Buttons[i].addEventListener("click", function(e){
    e.preventDefault();
    //console.log("Hello world");
    var xhr = new XMLHttpRequest;

    xhr.onreadystatechange = function(){
        //if(this.readyState == 4 && this.status == 200){
            console.log(this.readyState);
            console.log(this.status);   
        //}
    }
    xhr.open("GET","");
    xhr.send();
    return false;

    });

}
*/
/*
console.log("Bonsoir");
document.getElementById("boss").addEventListener("click", function(e){
    e.preventDefault();
    console.log("Hello world");
   // var_xhr = new XMLHttpRequest;
    return false;

});
*/