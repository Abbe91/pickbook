
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

function getAllProduct() {
    makeRequest("./../server/recievers/productReciever.php?action=getAll", "GET", null, (result) => {

        for(let i = 0; i < result.length; i++){

            let product = result[i];
            let trTag = document.createElement("tr");
        
            document.getElementById("table").append(trTag);
            
            trTag.innerText = JSON.stringify(product);
        
            console.log(result);
        }

        for(let i = 0; i < result.length; i++){
            console.log(result[i]);
            document.getElementById("product_id").innerHTML = JSON.stringify(result) ;
         }
        console.log(result)
    })
}
getAllProduct();


function insertProduct() {
    let insertProductName = document.getElementsByName("insertProductName")[0].value
    let insertDescription = document.getElementsByName("insertDescription")[0].value
    let insertQuantity = document.getElementsByName("insertQuantity")[0].value
    let insertUnitPrice = document.getElementsByName("insertUnitPrice")[0].value
    let insertDiscount = document.getElementsByName("insertDiscount")[0].value
    let insertImage = document.getElementsByName("productImg")[0].files[0]

    var data = new FormData()

    data.append("action", "add");
    data.append("product_name", insertProductName);
    data.append("description", insertDescription);
    data.append("quantity", insertQuantity);
    data.append("unit_price", insertUnitPrice);
    data.append("discount", insertDiscount);
    data.append("image", insertImage);

    makeRequest('./../server/recievers/productReciever.php', "POST", data, (result)=>{
        console.log(result)
    }) 
}


function deleteProduct() {
    let deleteOneProduct = document.getElementsByName("deleteOneProduct")[0].value

    var data = new FormData()
    data.append("action", "deleteOneProduct");
    data.append("productName", deleteOneProduct);

    makeRequest("./../server/recievers/productReciever.php", "POST", data, (result)=>{
        console.log(result)
    })
}

function deleteAllProduct() {
    var data = new FormData()
    data.append("action", "deleteAllProduct");

    makeRequest("./../server/recievers/productReciever.php", "POST", data, (result)=>{
        console.log(result)
    })
}

function getAllaNewsLetter() {
   
    makeRequest("./../server/recievers/newsLetterReciever.php?action=getNewsUser", "GET", null, (result) => {

        let table = document.getElementById("newsLetter")

        for(let i = 0; i < result.length; i++){

            let userName = (result[i].fulName);
            let email = (result[i].email);

            let row = document.createElement("tr");

            let userNameTD = document.createElement("td");
            let emailTD = document.createElement("td");

            userNameTD.innerText = userName;
            emailTD.innerText = email;

            row.appendChild(userNameTD);
            row.appendChild(emailTD);

            table.appendChild(row);



        }
    })
}
getAllaNewsLetter();



function sendNewsletter() {
    
        let emailForNewsLetter = document.getElementsByName("emailForNewsLetter")[0].value
        let nameForNewsLetter = document.getElementsByName("nameForNewsLetter")[0].value 
        
        var data = new FormData()

        data.append("action", "add");
        data.append("emailForNewsLetter", emailForNewsLetter);
        data.append("nameForNewsLetter", nameForNewsLetter);
    
        makeRequest("./../server/recievers/addTonewsletterReciver.php", "POST", data, (result)=>{
            console.log(result)
        })
}

function deletNewsletter() {
        let deletEmailNaewsleter = document.getElementsByName("deleteOneEmail")[0].value 

        var data = new FormData()

        data.append("action","deletNewsletter");
        data.append("deleteOneEmail", deletEmailNaewsleter);
        makeRequest("./../server/recievers/addTonewsletterReciver.php", "POST", data, (result)=>{
            console.log(result)
        })
}

