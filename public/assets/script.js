"use strict"

$(document).ready(function(){

/*$.getJSON('/gallery/search', function(json) {
    //console.log(json);

    $("#autocomplete").autocomplete({
            source: $.map(json, function (v, i) {
                return {
                    //label: v.format+' / '+v.name+' ('+v.code+')',
                    label: v.name+v.tag,
                    value: v.name,
                    imgsrc: v.path,
                    name: v.name,
                    tag: v.tag,
                    id: v.id
                    //value: v.format+' / '+v.name+' ('+v.code+')'                
                };
            })
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {  
           return $( "<li>" )  
               .append('<a href="/singleview/'+item.imgsrc+'"><img src="/assets/img/'+item.imgsrc+'" class="searchImage " alt="'+item.name+'"/></a>')  
               .append('<a href="/singleview/'+item.imgsrc+'">'+item.name+'</a>')
               .append('<a href="/singleview/'+item.imgsrc+'">'+item.tag+'</a>')
               .appendTo( ul );  
       };


});*/

//console.log("i am working 1");
  $("#autocomplete").autocomplete({
      source: function( request, response ) {

        console.log("i am working in ajax");

          $.ajax({  
              url: "/gallery/search",
              method: "GET",
              dataType: "json",  
              data: {  
                   term: request.term  
              },  
              success: function( data ) {  
                  response( $.map( data, function( result ) {  
                      return {  
                          label: result.name+result.tag,  
                          value: result.name,
                          imgsrc: result.path,
                          name: result.name,
                          id: result.id,
                          tag: result.tag
                        }  
                  }));  
              }  
          });  
      },
      minLength: 1
  }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {  
      return $( "<li>" )  
          .append('<a class="searchBorder" href="/singleview?id='+item.id+'"><img src="/assets/img/'+item.imgsrc+'" class="searchImage" alt="'+item.name+'"/></a>')  
          .append('<a href="/singleview?id='+item.id+'" class="searchBorder">'+item.name+'</a>')
          .append('<a href="/singleview?id='+item.id+'" class="searchBorder">Tags: '+item.tag+'</a>')
          .appendTo( ul );  
    };
      

  /*$('#show').click(function(){

     var json = {
          id: 12,
          name: 'alamin'
     };

     var dataString = JSON.stringify(json);

      $.ajax({
        url: 'person.php',
        method: 'POST',
        data: {mydata: dataString},
        success: function(response){
          //alert("Response: "+response);
          //var value = JSON.parse(response);
          //alert(response.name);
        },
        error: function(error){
          alert('Error: '+error);
        }
      });
  });*/

});
