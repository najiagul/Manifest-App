const addbutton=document.querySelector('#one');
const colors=["rgb(144,204,244)","rgb(243,210,80)","rgb(247,136,136)"];
const addsomething=function(){
    
    const title=document.querySelector('#title2');
    
   
    const titlechild=document.querySelector('#title2').children[0];
  
    // const description=document.querySelector('#anotherid');
    const description=document.querySelector("#textarea2");
    const descriptionchild=document.querySelector('#textarea2').children[0];
    
    // document.body.append(description)
   
const firstcontainer=document.querySelector(".notescontainer")
   
    let newtitle=document.createElement('div');
    let newdescription=document.createElement('div');
    let newcontainer=document.createElement('div');
    let newbutton=document.createElement("span");
    newbutton.innerHTML="&times"
    newbutton.classList.add("button");
    
    firstcontainer.appendChild(newcontainer);
    const colorselection=document.querySelector("#colors").selectedIndex;
    
    
   
        newcontainer.style.backgroundColor=colors[colorselection];
        
    
    newcontainer.classList.add('container');
    newcontainer.appendChild(newbutton)


    newtitle.textContent=titlechild.value;
    
    newcontainer.appendChild(newtitle);
    newtitle.classList.add('title');
    
    
    newdescription.textContent=descriptionchild.value;
    

    newcontainer.appendChild(newdescription);
    newdescription.classList.add('description');
    
   
    
    title.value='';
    description.value='';
    
    
    const button=document.querySelectorAll(".button");
    const performthis=function(){
        
        this.parentElement.style.display="none";
    }
     button.forEach(buttons=>buttons.addEventListener('click',performthis));
   
}
addbutton.addEventListener('click',addsomething);

const button=document.querySelectorAll(".button");
const performthis=function(){
    
   
}
button.forEach(buttons=>buttons.addEventListener('click',performthis));