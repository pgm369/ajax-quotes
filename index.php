<html>
  <head>
    <title>AJAX Quotes</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Dancing+Script&family=Lobster&display=swap');


      
        /* CSS to hide the quote container initially and apply fade-in animation */
        #quoteContainer {
            display: none;
		        font-size:xx-large;
            text-shadow: 4px 4px 4px #aaa;
        }


        /* CSS for the fade-in animation */
        .fade-in {
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

    </style>
  </head>
  <body>
    <h1>AJAX Quotes</h1>
    <p><em>The AJAX Quotes website is a dynamic web application that retrieves random quotes from a server-side PHP script using AJAX (Asynchronous JavaScript and XML) technology. When users click on the page, the website sends an asynchronous request to the server, which responds with a randomly selected quote. The quote is then displayed on the webpage with a fade-in animation and styled using different font families for each quote. The website also periodically fetches new quotes at intervals every few seconds. Users can enjoy an ever-changing assortment of thought-provoking quotes, making the browsing experience engaging and inspirational.</em></p>
    <p>Click below to return a random quote:</p>
    <div id="quoteContainer">Quotes go here</div>
    <script>
      //helps us loop the array of fonts
      var counter = 0;
      
      function getRandomQuote(){
        var fonts = ["Dancing Script","Abril Fatface","Lobster"];

        //create ajax object
        var xhr = new XMLHttpRequest();

        //target the server page
        xhr.open('GET','random_quotes.php',true);

        //if data comes back, show it here
        xhr.onload = function(){
          if(xhr.status>= 200 && xhr.status < 300){//all ok, show data
            //document.querySelector("#quoteContainer").innerText = xhr.responseText;
            var quoteContainer = document.querySelector("#quoteContainer");

            //retrieve text from php page
            quoteContainer.innerText = xhr.responseText;

            //add font family
            quoteContainer.style.fontFamily = fonts[counter];
            counter++;
            if(counter >= fonts.length){
              counter = 0;
            }
            
            //make element visible
            quoteContainer.style.display = "block";
            
            //add fade in class
            quoteContainer.classList.add("fade-in");

            setTimeout(function(){
            quoteContainer.classList.remove("fade-in");
            }, 1000)
          
          }else{//show error
            document.querySelector("#quoteContainer").innerText = "Failed to fetch quote:" + xhr.status;
          }
        };

        //if trouble, investigate here
        xhr.onerror = function(){
          alert("Oh oh! We recieved an XHR error!")
        };
        
        //send data to server
        xhr.send();
        
      }

      function displayRandomQuote(){
        //add event listener to the "quoteContainer" div to call getRandomQuote() on click
    document.querySelector("#quoteContainer").addEventListener("click", getRandomQuote);
        //retrieve quote
        getRandomQuote();
        //run every 5 seconds
        setInterval(getRandomQuote,5000);

      }
      //run on page load
      displayRandomQuote();

      
    </script>
  </body>
</html>
