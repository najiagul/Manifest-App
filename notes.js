const addbutton=document.querySelector('.addbutton');
const colors=["rgb(144,204,244)","rgb(243,210,80)","rgb(247,136,136)"];
const addsomething=function(){
    console.log("eow");
    const description=document.querySelector('.descriptionone');
    const title=document.querySelector('.titleone');
const firstcontainer=document.querySelector(".notescontainer")
   console.log(firstcontainer)
    let newtitle=document.createElement('div');
    let newdescription=document.createElement('div');
    let newcontainer=document.createElement('div');
    let newbutton=document.createElement("span");
    newbutton.innerHTML="&times"
    newbutton.classList.add("button");
    
    firstcontainer.appendChild(newcontainer);
    const colorselection=document.querySelector("#colorselection").selectedIndex;
    console.log(colorselection);
    
   
        newcontainer.style.backgroundColor=colors[colorselection];
        console.log("wow");
    
    newcontainer.classList.add('container');
    newcontainer.appendChild(newbutton)


    newtitle.textContent=title.value;
    
    newcontainer.appendChild(newtitle);
    newtitle.classList.add('title');
    
    
    newdescription.textContent=description.value;
    console.log(newtitle.textContent)

    newcontainer.appendChild(newdescription);
    newdescription.classList.add('description');
    
    console.log(newdescription);
    
    title.value='';
    description.value='';
    
    
    const button=document.querySelectorAll(".button");
    const performthis=function(){
        console.log("eoe");
        console.log(this);
        console.log(this.parentElement)
        this.parentElement.style.display="none";
    }
    button.forEach(buttons=>buttons.addEventListener('click',performthis));
   
}
addbutton.addEventListener('click',addsomething);

const button=document.querySelectorAll(".button");
const performthis=function(){
    
    console.log(this);
}
button.forEach(buttons=>buttons.addEventListener('click',performthis));
