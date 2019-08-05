var TShirtBack="/assets/mk/crew_back.png";
var TShirtFront="/assets/mk/crew_front.png";
var Side=0;
var canvasFront;
var canvasBack =0;

  function  BgNull(){ //sets bakground to null and shows T-shirt back
        //canvasBack=JSON.stringify(canvas);
canvas.setBackgroundImage(TShirtBack, canvas.renderAll.bind(canvas));
canvas.backgroundColor=color;
if(canvasBack==0){
canvasBack=JSON.stringify(canvas);
}
canvas.loadFromJSON(canvasBack);
canvas.renderAll();
        }


        function  FlipCanvas(){ // flips Tshirts Back and Front ** Jhamela ase etay
if(Side==0){
        document.getElementById("Flipper").innerHTML = "T-Shirt Front";

       canvasFront=JSON.stringify(canvas);
     // alert(canvasFront);
    //  canvas.setBackgroundImage(TShirtBack, canvas.renderAll.bind(canvas));
     // canvasBack=JSON.stringify(canvas);
      canvas.clear();
      BgNull();
      //canvas.loadFromJSON(canvasBack);
      
     // alert(canvasBack);
     // canvas.renderAll();
      Side=1;
      }
      else{
            document.getElementById("Flipper").innerHTML = "T-Shirt Back";

       canvasBack=JSON.stringify(canvas);
       canvas.clear();
      canvas.loadFromJSON(canvasFront);
    //  alert(canvasFront);
      canvas.renderAll();
      Side=0;  
      }
}    

