const hamburger=document.querySelector('.hamburger');
            const navlinks=document.querySelector('.nav-links')
            hamburger.addEventListener('click',()=>{
                navlinks.classList.toggle('open');
            })
            
            
            
            var prevScrollpos = window.pageYOffset;
            window.onscroll = function() {
              var currentScrollPos = window.pageYOffset;
              if (prevScrollpos > currentScrollPos) {
                document.querySelector("nav").style.top = "0";
              } else {
                document.querySelector("nav").style.top = "-12vh";
              }
              prevScrollpos = currentScrollPos; 
            }
            
            
            
            
            
            
            
            document.addEventListener('DOMContentLoaded', function () {
                let listitems=document.getElementsByClassName("list-items");
                
                 for(let x=0;x<listitems.length;x++){
                   var span=document.createElement("span");
                   var trash=document.createElement("i");
                   trash.className="fa fa-trash";
                    span.className="close";
                    
                    span.appendChild(trash);
                    listitems[x].appendChild(span);
                    span.appendChild(trash);
                    }
            
            
            
                    var close=document.getElementsByClassName("close");
                    for(let x=0;x<close.length;x++){
                        close[x].addEventListener('click',function(){
                            removetheitem(close[x]);
                        },false);
                    }
                
            
                    var list = document.querySelector('#mylist');
                    // var list = document.querySelector('ul');
                    list.addEventListener('click', function(ev) {
                       
                            
                            if(ev.target.tagName === "LI"){
                              
                                ev.target.classList.toggle('checked');                }
            
                    }, false);
            
            
                    let addbutton=document.querySelector("#addforjavascript")
                    addbutton.addEventListener('click',function(){
                        additemstolist();
                    })
            
            },false);
            const removetheitem=function(y){
                
                let div=y.parentElement;
                div.style.display="none";
            }
            
            const additemstolist=function(){
                let input_item_parent=document.getElementsByClassName("inputvalue")[0];
               
                input_item=input_item_parent.children[0].value
              
               
                let newli=document.createElement("li");
                newli.classList.add("list-items")
                let textnode1=document.createTextNode(input_item);
                newli.appendChild(textnode1);
                if(textnode1=""){
                    alert("Please write something");
                }
                else{
                    document.getElementById("mylist").appendChild(newli)
                }
                document.getElementsByClassName("inputvalue").value="";
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
