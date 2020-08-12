const ss=document.querySelector(".ss");
        const takess=function(){
            html2canvas(document.querySelector("#canvas")).then(canvas => {
    document.body.appendChild(canvas)}
    );let image=canvas.toDataURL('img/jpeg');
   console.log(image)
        }
   ss.addEventListener('click',takess);
 
        const canvas=document.querySelector("#canvas");
        console.log(canvas);
        const ctx=canvas.getContext("2d");
        console.log(ctx);
        canvas.width=window.innerWidth;
        canvas.height=window.innerHeight;
        ctx.strokeStyle="#BADASS";
        ctx.lineJoin='round';
        ctx.lineCap='round';
       ctx.lineWidth="5";
        let isDrawing=false;
        let lastX=0;
        let lastY=0;
        
        const Draw=function(e){
        
            if (!isDrawing) return; // stop the fn from running when they are not moused down
            // console.log(e);
            // ctx.strokeStyle = `hsl(${hue}, 100%, 50%)`;
            ctx.beginPath();
            // start from
            ctx.moveTo(lastX, lastY);
            // go to
            ctx.lineTo(e.offsetX, e.offsetY);
            ctx.stroke();
            [lastX, lastY] = [e.offsetX, e.offsetY];

        }
       



        canvas.addEventListener('mousedown', (e) => {
  isDrawing = true;
  [lastX, lastY] = [e.offsetX, e.offsetY];
});
const inputs=document.querySelectorAll("input");
const button=document.querySelector(".ledeffect");

    console.log(inputs);
    

        function getPattern() {
  var patternCanvas = document.createElement('canvas'),
     // dotWidth = 20,
     // dotDistance = 5,
      ctx = patternCanvas.getContext('2d');

 patternCanvas.width = 35; patternCanvas.height = 20;
  ctx.fillStyle = 'red';
  ctx.fillRect(0, 0, 5, 20);
  ctx.fillStyle = 'orange';
  ctx.fillRect(5, 0, 10, 20);
  ctx.fillStyle = 'yellow';
  ctx.fillRect(10, 0, 15, 20);
  ctx.fillStyle = 'green';
  ctx.fillRect(15, 0, 20, 20);
  ctx.fillStyle = 'lightblue';
  ctx.fillRect(20, 0, 25, 20);
  ctx.fillStyle = 'blue';
  ctx.fillRect(25, 0, 30, 20);
  ctx.fillStyle = 'purple';
  ctx.fillRect(30, 0, 35, 20);
  return ctx.createPattern(patternCanvas, 'repeat');
}
// let color;



        const updatevalue=function(){
          console.log(this);
          const suffix=this.dataset.sizing || '';
          console.log(suffix);
          document.documentElement.style.setProperty(`--${this.name}`,this.value+suffix);
          ctx.lineWidth=(this.value);
          ctx.strokeStyle=(this.value);
          console.log("wow");
          console.log(this.value);
          ctx.shadowBlur=0;
          
        //  color=this.value;
        
        //   console.log(color);
        //   ctx.shadowBlur = 10;
// ctx.shadowColor = this.value;
// ctx.strokeStyle = getPattern();


        }
        const triggerfunction=function(){
            console.log("this works");
            const color=document.querySelector(".color").value;
            console.log(color);
            ctx.shadowBlur = 10;
            ctx.shadowColor = color;


        }
        const patternbuttonfunc=function(){
            console.log("thisss");

            ctx.shadowBlur=0;
            ctx.strokeStyle = getPattern();

            

        }
        
        inputs.forEach(input=>input.addEventListener('change',updatevalue));
        inputs.forEach(input=>input.addEventListener('mouseover',updatevalue));
        button.addEventListener('click',triggerfunction);
        const patternbutton=document.querySelector(".patternbutton");
        patternbutton.addEventListener("click",patternbuttonfunc);

        


       


        


canvas.addEventListener('mousemove', Draw);
canvas.addEventListener('mouseup', () => isDrawing = false);
canvas.addEventListener('mouseout', () => isDrawing = false);



    