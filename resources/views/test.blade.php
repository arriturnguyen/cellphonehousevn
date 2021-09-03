@extends('layouts.master')

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/cartstyle.css">
@endsection

@section('content')

  <h1 class="your-cart"></h1>


<div class="shopping-cart">

  <div id="navbar"><span>Push.js Tutorial</span></div>
  <div id="wrapper">
      <button id="notify-button">Notify Me!!</button>
      <button id="clear-button">Clear All!</button>
      <button id="check-button">Check Permission</button>
  </div>
  
  <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.5/push.js"></script>
  <script>
    $.ajax({
        type: 'GET',
        url: 'test/getData'
    }).done(function(res) {
      if(res.status === 'success'){
          // Delete image element from UI
          console.log(res);
          let data = res.data;
          for (let item in data) {
            if (data.hasOwnProperty(item)) {
              console.log(data[item]);
              setTimeout(function() {
                 Push.create(data[item].word + ' (' + data[item].read + ')',{
                      body: data[item].mean,
                      icon: 'img/product04.png',
                      timeout: 12000,
                      onClick: function () {
                          window.focus();
                          this.close();
                      }
                  });
              },item*18000);  
            }
          }
        }else{
          // Show message error
          alert(res.msg); 
        }
    });
    //   $.ajax({
    //   url: 'test/getData',
    //   type: 'GET',
    //   dataType: 'json',
    //   success: function(res){
    //       if(res.status){
    //         // Delete image element from UI
    //         console.log(res);
    //         let data = res.data;
    //         for (let i=0; i<data.length; i++) {
    //           console.log(data[i]);
    //           Push.create(data[i].word,{
    //               body: data[i].mean,
    //               icon: '/product04.png',
    //               timeout: 2000,
    //               onClick: function () {
    //                   window.focus();
    //                   this.close();
    //               }
    //           });
    //         }
    //       }else{
    //         // Show message error
    //         alert(res.msg);
    //       }
    //   },
    //   error: function(err){
    //     console.log(err);
    //   }
    // });
    //   $("#notify-button").click(function(){
    //     Push.create("Hello world!",{
    //         body: "This is example of Push.js Tutorial",
    //         icon: '/Logo_small.png',
    //         timeout: 2000,
    //         onClick: function () {
    //             window.focus();
    //             this.close();
    //         }
    //     });
    //   });
    //   $("#clear-button").click(function(){ 
    //        Push.clear();
    //   });
    //   $("#check-button").click(function(){ 
    //         console.log(Push.Permission.has());
    //   });
  </script>	

@endsection