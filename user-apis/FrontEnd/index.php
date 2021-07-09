<!DOCTYPE html>
<html>
    <head>
        <title>Users Api</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">

            <script>
                const api_url = 'http://localhost/user-apis/api/posts/read.php';
                async function getapi(url) {
    
                    // Storing response
                    const response = await fetch(url);
                    
                    // Storing data in form of JSON
                    var data = await response.json();
                    console.log(data);
                    if (response) {
                        hideloader();
                    }
                    show(data);
                }
                // Calling that async function
                getapi(api_url);
                
                // Function to hide the loader
                function hideloader() {
                    document.getElementById('loading').style.display = 'none';
                }
                // Function to define innerHTML for HTML table
                function show(data) {
                    let tab = ``;
                    console.log(data.data);
                    var count = 0;
                    for (let r of data.data) {
                        count += 1;
                        if(count<=3){
                        tab += `<div class="card">
                            <h5 class="card-header">${r.id}</h5>
                            <div class="card-body">
                                <h5 class="card-title">${r.name}</h5>
                                <p class="card-text">${r.email}</p>
                                <p class="card-footer">${r.mobile}</p>
                                </br>
                            </div>
                        </div>`;
                        }if(count>3){
                            tab += `<a class="btn btn-primary" href='http://localhost/user-apis/FrontEnd/index1.php'>next</a>`;
                        }

                    }
                    //Setting innerHTML as tab variable
                    document.getElementById("employees").innerHTML = tab;
                }
            </script>
            <h2>Registerd / Signup </h2>
            <div class="d-flex justify-content-center">
                <div class="spinner-border" 
                    role="status" id="loading">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class='container' id = "employees">

            </div>                  
            <ul class="pagination">
            </ul> 
        </div>
    </body>
</html>