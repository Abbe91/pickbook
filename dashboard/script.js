function makeRequest(url, method, formdata, callback) {
    fetch(url, {
        method: method,
        body: formdata
    }).then((data) => {
        return data.json()
    }).then((result) => {
        callback(result)
        
    }).catch((err)=>{
        console.log("Error: ", err)
    })
}

function dashlogin(){
    let inlogningEmail = document.getElementsByName("myemail")[0].value
    let inlogningPassword = document.getElementsByName("mypassword")[0].value

    var data = new FormData()
    data.append("action", "add");
    data.append("myemail",inlogningEmail );
    data.append("mypassword",inlogningPassword );

    makeRequest('../dashboard/dashServer/dashReciver/dashReciver.php', "POST", data, (result)=>{
        if (result) {
            
            window.location = "./dashboard.html"
        } else {
            // TODO: show prompt about invalid username or password
            console.log(false)
        }
    }) 

}