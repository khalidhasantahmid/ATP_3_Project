var price=300;//initial price
//setting up canvas

function GoToCart(){
document.getElementById("Scanvas").value=document.getElementById("c").toDataURL();
document.getElementById("SendPrice").value=price;

document.getElementById("addCxProduct").submit();
}

var canvas = window._canvas = new fabric.Canvas('c', {
  backgroundColor: 'rgb(256, 256, 256)',
  selectionColor: 'gray',
  selectionLineWidth: 2,
  isDrawingMode: true
});
//var color='#FFFFFF';
canvas.backgroundColor=document.getElementById("color").value;//color;


var ctx = canvas.getContext('2d');


document.getElementById("Price").innerHTML = "Price :"+price;
//var myDataURL ="crew_front.png";


//var canvas = new fabric.Canvas('canvas');
var img = new Image();
img.onload = function() {

    // this is syncronous
    var f_img = new fabric.Image(img);
  //  canvas.setBackgroundImage(f_img);
  canvas.setBackgroundImage(img.src, canvas.renderAll.bind(canvas));
    canvas.renderAll();
;
    
};

img.src = TShirtFront;

var colorChangePrice=0;
  function ColorChange(){

    var col=document.getElementById("color").value;
    
    if(col!="#FFFFFF")
    {
      if(colorChangePrice==0){
      colorChangePrice=1;
      price=price+50;
      CheckPrice();
      }
    }
    else{
      colorChangePrice=0;
      price=price-50;
      CheckPrice();
    }
    canvas.set('backgroundColor', col);
    canvas.renderAll();
  }

//delete clicking button
function  DeleteContent()
    {
      var obj = canvas.getActiveObject();
     // alert(obj.get('type'));
    //canvas.remove(obj);
     
       //  canvas.renderAll();
var t=obj.get('type');
t=t.toString().trim();
//alert(t);
    if(t=="image")
    {
    price=price-200;
   // alert("img paisi");
    CheckPrice();
    }
    else if(t=="i-text"){
      price=price-50;
     //  alert("txt paisi");
        CheckPrice();  
    }else if(t=="path")
    {
     price=price-10;
    }
    else{
    //  alert(t+" "+typeof obj);
    }
     canvas.remove(obj);
    // alert("done");
         canvas.renderAll();
    }
    
//Deleting element on pressing del button

$(window).keydown(function(e) {    
    switch (e.keyCode) {
        case 46: // delete
        //alert("howdi Brother?");
         var obj = canvas.getActiveObject();
         var t=obj.get('type');
t=t.toString().trim();
//alert(t);
    if(t=="image")
    {
    price=price-200;
   // alert("img paisi");
    CheckPrice();
    }
    else if(t=="i-text"){
      price=price-50;
     //  alert("txt paisi");
        CheckPrice();  
    }else if(t=="path")
    {
     price=price-10;
    }
    else{
    //  alert(t+" "+typeof obj);
    }
         canvas.remove(obj);
         canvas.renderAll();
         return false;
    }
    return; 
});


    function  CheckPrice()
    {
      document.getElementById("Price").innerHTML = "Price :"+price;
      
    }



var imageSaver = document.getElementById('lnkDownload'); // suppose to save canvas as png image *somehow working*
imageSaver.addEventListener('click', saveImage, false);

function saveImage(e) {

   this.href = canvas.toDataURL({
        format: 'png',
        quality: 0.8
    });
 
    this.download = 'canvas.png';
     //alert("Y u No save? 22");
  
}



//Adding Image To canvas

document.getElementById('imgLoader').onchange = function handleImage(e) {
    var reader = new FileReader();
    reader.onload = function (event) { console.log('fdsf');
        var imgObj = new Image();
        imgObj.src = event.target.result;
        imgObj.onload = function () {
            // start fabricJS stuff
            
            var image = new fabric.Image(imgObj);
            image.set({
                left: 250,
                top: 250,
                angle: 20,
                padding: 10,
                cornersize: 10

            });

              price=price+200;
        CheckPrice();
        canvas.add(image);
           
            
            // end fabricJS stuff
        }
              
    }
    reader.readAsDataURL(e.target.files[0]);
}








//adding text to canvas

function Addtext() { 
var t= document.getElementById("textF").value;
var text = new fabric.IText(t,{fontSize:16,left:20,top:20});
canvas.add(text).setActiveObject(text);
  price=price+50;
  CheckPrice();
}
    
 
//changing text color

addHandler('TextBoxcolor', function(obj) {
      setStyle(obj, 'fill', this.value);
    }, 'onchange');


    
//changing text font

addHandler('font-family', function(obj) {
      setStyle(obj, 'fontFamily', this.value);
    }, 'onchange');
    

    //changing text backGround color
addHandler('text-bg-color', function(obj) {
      setStyle(obj, 'textBackgroundColor', this.value);
    }, 'onchange');
        

      // changing text size
addHandler('text-font-size', function(obj) {
      setStyle(obj, 'fontSize', this.value);
      document.getElementById("F_size").innerHTML = "Font Size : "+this.value;
      
    }, 'onchange');
    
//other stuffs
function setStyle(object, styleName, value) {
    if (object.setSelectionStyles && object.isEditing) {
        var style = { };
        style[styleName] = value;
        object.setSelectionStyles(style).setCoords();
        
    }
    else {
    
        object[styleName] = value;
    }
    
};
function  getStyle(object, styleName) {
    return (object.getSelectionStyles && object.isEditing)
    ? object.getSelectionStyles()[styleName]
    : object[styleName];
}
function addHandler(id, fn, eventName) {
    document.getElementById(id)[eventName || 'onclick'] = function() {
        var el = this;
        if (obj = canvas.getActiveObject()) {
            fn.call(el, obj);
            canvas.renderAll();
        }
    };
    canvas.renderAll();
}  

//other stuffs ends


//Drawing stuffs everything



(function() {
  var $ = function(id){return document.getElementById(id)};

  fabric.Object.prototype.transparentCorners = false;

  var drawingModeEl = $('drawing-mode'),
      drawingOptionsEl = $('drawing-mode-options'),
      drawingColorEl = $('drawing-color'),
      drawingShadowColorEl = $('drawing-shadow-color'),
      drawingLineWidthEl = $('drawing-line-width'),
      drawingShadowWidth = $('drawing-shadow-width'),
    //  drawingShadowOffset = $('drawing-shadow-offset'),
     clearEl = $('clear-canvas');

  clearEl.onclick = function() { canvas.clear() ;
 // canvasBack=0;
 // canvasFront=0;
 colorChangePrice=0;
 price=300;
 CheckPrice();
 //alert(price);
  var imgObj1 = new Image();
  if(Side==0){
        imgObj1.src = "/assets/mk/crew_front.png";
       // canvasBack=0;
        }else{
        imgObj1.src = "/assets/mk/crew_back.png";  

    }
        imgObj1.onload = function () {
           
            var image = new fabric.Image(imgObj1);
            image.set({
           
                selectable: false
            });
            canvas.add(image);
            }
  };//add image

  drawingModeEl.onclick = function() {
    canvas.isDrawingMode = !canvas.isDrawingMode;
    if (canvas.isDrawingMode) {
      drawingModeEl.innerHTML = 'Cancel drawing mode';
      drawingOptionsEl.style.display = '';
    }
    else {
      drawingModeEl.innerHTML = 'Enter drawing mode';
      drawingOptionsEl.style.display = 'none';
    }
  };

  if (fabric.PatternBrush) {
    //alert("ho ho");
    var vLinePatternBrush = new fabric.PatternBrush(canvas);
    vLinePatternBrush.getPatternSrc = function() {

      var patternCanvas = fabric.document.createElement('canvas');
      patternCanvas.width = patternCanvas.height = 10;
      var ctx = patternCanvas.getContext('2d');

      ctx.strokeStyle = this.color;
      ctx.lineWidth = 5;
      ctx.beginPath();
      ctx.moveTo(0, 5);
      ctx.lineTo(10, 5);
      ctx.closePath();
      ctx.stroke();

      return patternCanvas;
    };

    var hLinePatternBrush = new fabric.PatternBrush(canvas);
    hLinePatternBrush.getPatternSrc = function() {

      var patternCanvas = fabric.document.createElement('canvas');
      patternCanvas.width = patternCanvas.height = 10;
      var ctx = patternCanvas.getContext('2d');

      ctx.strokeStyle = this.color;
      ctx.lineWidth = 5;
      ctx.beginPath();
      ctx.moveTo(5, 0);
      ctx.lineTo(5, 10);
      ctx.closePath();
      ctx.stroke();

      return patternCanvas;
    };

    var squarePatternBrush = new fabric.PatternBrush(canvas);
    squarePatternBrush.getPatternSrc = function() {

      var squareWidth = 10, squareDistance = 2;

      var patternCanvas = fabric.document.createElement('canvas');
      patternCanvas.width = patternCanvas.height = squareWidth + squareDistance;
      var ctx = patternCanvas.getContext('2d');

      ctx.fillStyle = this.color;
      ctx.fillRect(0, 0, squareWidth, squareWidth);

      return patternCanvas;
    };

    var diamondPatternBrush = new fabric.PatternBrush(canvas);
    diamondPatternBrush.getPatternSrc = function() {

      var squareWidth = 10, squareDistance = 5;
      var patternCanvas = fabric.document.createElement('canvas');
      var rect = new fabric.Rect({
        width: squareWidth,
        height: squareWidth,
        angle: 45,
        fill: this.color
      });

      var canvasWidth = rect.getBoundingRect().width;

      patternCanvas.width = patternCanvas.height = canvasWidth + squareDistance;
      rect.set({ left: canvasWidth / 2, top: canvasWidth / 2 });

      var ctx = patternCanvas.getContext('2d');
      rect.render(ctx);

      return patternCanvas;
    };

    var img = new Image();
    //img.src = '../assets/honey_im_subtle.png';

    var texturePatternBrush = new fabric.PatternBrush(canvas);
    texturePatternBrush.source = img;
  }

  $('drawing-mode-selector').onchange = function() {

    if (this.value === 'hline') {
      canvas.freeDrawingBrush = vLinePatternBrush;
    }
    else if (this.value === 'vline') {
      canvas.freeDrawingBrush = hLinePatternBrush;
    }
    else if (this.value === 'square') {
      canvas.freeDrawingBrush = squarePatternBrush;
    }
    else if (this.value === 'diamond') {
      canvas.freeDrawingBrush = diamondPatternBrush;
    }
    else if (this.value === 'texture') {
      canvas.freeDrawingBrush = texturePatternBrush;
    }
    else {
      canvas.freeDrawingBrush = new fabric[this.value + 'Brush'](canvas);
    }

    if (canvas.freeDrawingBrush) {

      canvas.freeDrawingBrush.color = drawingColorEl.value;
      canvas.freeDrawingBrush.width = parseInt(drawingLineWidthEl.value, 10) || 1;
      canvas.freeDrawingBrush.shadow = new fabric.Shadow({
        blur: parseInt(drawingShadowWidth.value, 10) || 0,
        offsetX: 0,
        offsetY: 0,
        affectStroke: true,
        color: drawingShadowColorEl.value,
      });
    }
  };

  drawingColorEl.onchange = function() {
    canvas.freeDrawingBrush.color = this.value;
  };
  drawingShadowColorEl.onchange = function() {
    canvas.freeDrawingBrush.shadow.color = this.value;
  };
  drawingLineWidthEl.onchange = function() {
    canvas.freeDrawingBrush.width = parseInt(this.value, 10) || 1;
    this.previousSibling.innerHTML = this.value;
  };
  drawingShadowWidth.onchange = function() {
    canvas.freeDrawingBrush.shadow.blur = parseInt(this.value, 10) || 0;
    this.previousSibling.innerHTML = this.value;
  };
 /* drawingShadowOffset.onchange = function() {
    canvas.freeDrawingBrush.shadow.offsetX = parseInt(this.value, 10) || 0;
    canvas.freeDrawingBrush.shadow.offsetY = parseInt(this.value, 10) || 0;
    this.previousSibling.innerHTML = this.value;
  };*/

  if (canvas.freeDrawingBrush) {

    canvas.freeDrawingBrush.color = drawingColorEl.value;
    canvas.freeDrawingBrush.width = parseInt(drawingLineWidthEl.value, 10) || 1;
    canvas.freeDrawingBrush.shadow = new fabric.Shadow({
      blur: parseInt(drawingShadowWidth.value, 10) || 0,
      offsetX: 0,
      offsetY: 0,
      affectStroke: true,
      color: drawingShadowColorEl.value,
    });
  }
})();


   
(function() {

  fabric.util.addListener(fabric.window, 'load', function() {
    var canvas = this.__canvas || this.canvas,
        canvases = this.__canvases || this.canvases;

    canvas && canvas.calcOffset && canvas.calcOffset();

    if (canvases && canvases.length) {
      for (var i = 0, len = canvases.length; i < len; i++) {
        canvases[i].calcOffset();
      }
    }
  });
})();
