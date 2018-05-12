

var csrf_token;

//this finction is used to retrive the response coming form server side

function loadDOC(method,url,htmlTag)

{

    var xhttp = new XMLHttpRequest(); 
    //using this , creates a variable to store HTTP requests

    xhttp.onreadystatechange = function() 
    //this one excute when recive answer from server side

    {

        if(this.readyState==4 && this.status==200)

        {
            
            console.log("CSRF token scuessfully fetched : "+this.responseText);
            document.getElementById(htmlTag).value = this.responseText;
            
            //return response
            
        }

    };

    xhttp.open(method,url,true);
    xhttp.send();

}

