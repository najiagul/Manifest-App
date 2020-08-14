document.addEventListener('DOMContentLoaded', function () {
    let listitems=document.getElementsByTagName("li");
    console.log(listitems.length);
     for(let x=0;x<listitems.length;x++){
       var span=document.createElement("span");
       var trash=document.createElement("i");
       trash.className="fa fa-trash";
        span.className="close";

        span.appendChild(trash);
        listitems[x].appendChild(span);
        span.appendChild(trash);
       console.log("pls");

        }



        var close=document.getElementsByClassName("close");
        for(let x=0;x<close.length;x++){
            close[x].addEventListener('click',function(){
                removetheitem(close[x]);
            },false);
        }


        var list = document.querySelector('ul');
        list.addEventListener('click', function(ev) {
                if (ev.target.tagName === 'LI') {
                     ev.target.classList.toggle('checked');
                }

        }, false);


        let addbutton=document.querySelector(".additem")
        addbutton.addEventListener('click',function(){
            additemstolist();
        })

},false);
const removetheitem=function(y){
    console.log(y);
    let div=y.parentElement;
    div.style.display="none";
}

const additemstolist=function(){
    let input_item=document.getElementById("input_value").value;
    let newli=document.createElement("li");
    let textnode1=document.createTextNode(input_item);
    newli.appendChild(textnode1);
    if(textnode1=""){
        alert("please write something");
    }
    else{
        document.getElementById("mylist").appendChild(newli)
    }
    document.getElementById("input_value").value="";
    var span=document.createElement("span");
       var trash=document.createElement("i");
       trash.className="fa fa-trash";
        span.className="close";
        span.appendChild(trash);
        newli.appendChild(span);



        var close=document.getElementsByClassName("close");
        for(let x=0;x<close.length;x++){
            close[x].addEventListener('click',function(){
                removetheitem(close[x]);
            },false);
        }
        const removetheitem=function(y){
            let div=y.parentElement;
            div.style.display="none";
        }
} 