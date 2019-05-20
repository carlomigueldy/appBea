<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
      function printlayer(Layer){
        var generator = window.open(",'name,");
        var layetext = document.getElementById(layer);
        generator.document.write(layetext.innerHTML.replace("Print Me"));

        generator.document.close();
        generator.print();
        generator.close();
      }

      function genPDF() {
	
        var doc = new jsPDF();
        
          var specialElementHandlers = {
              '#hidediv' : function(element,render) {return true;}
          };
          
          doc.fromHTML($('#testdiv').get(0), 20,20,{
                      'width':500,
                  'elementHandlers': specialElementHandlers
          });
        
        doc.save('Test.pdf');
        
      }
    </script>
        {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .footer {
          position: fixed;
          left: 0;
          bottom: 0;
          width: 100%;
          background-color: grey;
          color: white;
          text-align: center;
        }
    </style>
  </head>
  <body>
    @include('inc.nav')
    <div class="container" id="HTMLtoPDF">
      <br>
        @yield('content')
    </div>
    
    {{-- print-js --}}
    <script src="print.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    <!-- these js files are used for making PDF -->
    <script src="pdf-js/js/jspdf.js"></script>
    <script src="pdf-js/js/jquery-2.1.3.js"></script>
    <script src="pdf-js/js/pdfFromHTML.js"></script>
  </body>
</html> 