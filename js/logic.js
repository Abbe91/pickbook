
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

        // for(let i = 0; i < result.length; i++){
        //     console.log(result[i]);
        //     document.getElementById("product_id").innerHTML = JSON.stringify(result) ;
        //  }
        // console.log(result)
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
