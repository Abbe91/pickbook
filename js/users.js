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


//document.getElementById('register-form').addEventListener('submit', insertUser)

// function insertUser(event) {
//     event.preventDefault()
function insertUser() {
    let insertUserName = document.getElementsByName("insertUserName")[0].value
    let insertUserEmail = document.getElementsByName("insertUserEmail")[0].value
    let insertUserPhone = document.getElementsByName("insertUserPhone")[0].value
    let insertUserAddress = document.getElementsByName("insertUserAddress")[0].value
    let insertUserPostNo = document.getElementsByName("insertUserPostNo")[0].value
    let insertUserCity = document.getElementsByName("insertUserCity")[0].value
    let insertUserZipcode = document.getElementsByName("insertUserZipcode")[0].value
    let insertUserCountry = document.getElementsByName("insertUserCountry")[0].value
    let insertUserPassword = document.getElementsByName("insertUserPassword")[0].value
    let insertUseris_news_letter = document.getElementsByName("insertUseris_news_letter")[0].value
    let insertUserIsAdmin = document.getElementsByName("insertUserIsAdmin")[0].value
   
    var data = new FormData()
    data.append("action", "add");
    data.append("fulName",insertUserName );
    data.append("email",insertUserEmail );
    data.append("phone",insertUserPhone );
    data.append("adress",insertUserAddress );
    data.append("postNu",insertUserPostNo );
    data.append("ZIPcode",insertUserZipcode );
    data.append("city",insertUserCountry );
    data.append("country",insertUserPassword );
    data.append("Password",insertUserCity );
    data.append("IsAdmin",insertUserIsAdmin );
    data.append("is_news_letter",insertUseris_news_letter );
    makeRequest('./../server/recievers/userReciever.php', "POST", data, (result)=>{
        if(result){
            console.log(result);
            window.location = "/login.php"
        }
        console.log(result)
    }) 

}

function login(){
    let inlogningEmail = document.getElementsByName("myemail")[0].value
    let inlogningPassword = document.getElementsByName("mypassword")[0].value

    var data = new FormData()
    data.append("action", "add");
    data.append("myemail",inlogningEmail );
    data.append("mypassword",inlogningPassword );

    makeRequest('./../server/recievers/loginReciever.php', "POST", data, (result)=>{
        if (result) {
            window.location = "/index.php"
        } else {
            // TODO: show prompt about invalid username or password
        }
    }) 

}