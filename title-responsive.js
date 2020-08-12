const hamburger=document.querySelector('.hamburger');
const navlinks=document.querySelector('.nav-links')
hamburger.addEventListener('click',()=>{
    console.log("wow");
    navlinks.classList.toggle('open');
})
const appearright=function(e){
    const description=document.querySelectorAll(".description");
    const description2=document.querySelector(".description-bw")
    
    description.forEach(one=>{
        const slideInAt=window.scrollY+window.innerHeight-one.offsetHeight/2;
        
        const bottomofdiv=one.offsetTop+one.clientHeight;
       
        const halfShown=slideInAt>one.offsetTop;
        const isNotscrolledpast=window.scrollY<bottomofdiv;
        if(halfShown && isNotscrolledpast){
            one.classList.add("description-after");
        }
        else {
             one.classList.remove("description-after");
        }    
    })
    const slideInAt2=window.scrollY+window.innerHeight-description2.offsetHeight/2;
        
        const bottomofdiv2=description2.offsetTop+description2.clientHeight;
        
        const halfShown2=slideInAt2>description2.offsetTop;
        const isNotscrolledpast2=window.scrollY<bottomofdiv2;
        if(halfShown2 && isNotscrolledpast2){
            description2.classList.add("description-after");
        }
        else {
             description2.classList.remove("description-after");
        }    


}
const appearleft=function(){
    const imagesfeatures=document.querySelectorAll(".images-features");
    console.log(imagesfeatures)
    const imagesfeatures2=document.querySelector(".images-features-bw");
   
    imagesfeatures.forEach(two=>{
        const slideInAt=window.scrollY+window.innerHeight-two.offsetHeight/2;
        
        const bottomofdiv=two.offsetTop+two.clientHeight;
        console.log("Wow")
        // console.log(bottomofdiv);
        const halfShown=slideInAt>two.offsetTop;
        const isNotscrolledpast=window.scrollY<bottomofdiv;
        if(halfShown && isNotscrolledpast){
            two.classList.add("images-after");
        }
        else {
             two.classList.remove("images-after");
        }    
    })
    const slideInAt2=window.scrollY+window.innerHeight-imagesfeatures2.offsetHeight/2;
        // console.log(slideInAt);
        // console.log(one.offsetHeight)
        const bottomofdiv2=imagesfeatures2.offsetTop+imagesfeatures2.clientHeight;
        // console.log(bottomofdiv);
        const halfShown2=slideInAt2>imagesfeatures2.offsetTop;
        const isNotscrolledpast2=window.scrollY<bottomofdiv2;
        if(halfShown2 && isNotscrolledpast2){
            imagesfeatures2.classList.add("images-after");
        }
        else {
            imagesfeatures2.classList.remove("images-after");
        }   


}
window.addEventListener('scroll',appearleft);
window.addEventListener('scroll',appearright);
