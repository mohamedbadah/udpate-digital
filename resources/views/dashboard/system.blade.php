{{-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Real Time Data Display</title>
  </head>
  <body onload = "table();">
    <script type="text/javascript">
      function table(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
          document.getElementById("table").innerHTML = this.responseText;
        }
        xhttp.open("GET", "http://127.0.0.1:8000/digital_signage/collage-enginnering/17665-258");
        xhttp.send();
      }

      setInterval(function(){
        table();
      }, 1);
    </script>
    <div id="table">

    </div>
  </body>
</html> --}}