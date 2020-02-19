
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
       
        let table = document.getElementById("table") 
        
        for(let i = 0; i < result.length; i++){
            
            let product_id = (result[i].product_id);
            let product_name = (result[i].product_name);
            let description = (result[i].description);
            let quantity = (result[i].quantity);
            let unit_price =(result[i].unit_price);
            let discount = (result[i].discount);
            let image = (result[i].image);
            
            let row = document.createElement("tr");

            let nameTd = document.createElement("td");
            let idTd = document.createElement("td");
            let descriptionTd = document.createElement("td");
            let quantityTd = document.createElement("td");
            let unit_priceTd = document.createElement("td");
            let discountTd = document.createElement("td");
            let imageTd = document.createElement("td");

            nameTd.innerText = product_name;
            idTd.innerText = product_id;
            descriptionTd.innerText = description;
            quantityTd.innerText = quantity;
            unit_priceTd.innerText = unit_price;
            discountTd.innerText = discount;
            imageTd.innerText = image;
    
            row.appendChild(nameTd);
            row.appendChild(idTd);
            row.appendChild(descriptionTd);
            row.appendChild(quantityTd);
            row.appendChild(unit_priceTd);
            row.appendChild(discountTd);
            row.appendChild(imageTd);

            table.appendChild(row);
        }
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
