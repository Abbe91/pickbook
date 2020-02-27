
let productToUpdate

function makeRequest(url, method, formdata, callback) {
    fetch(url, {
        method: method,
        body: formdata
    }).then((data) => {
        return data.json()
    }).then((result) => {
        callback(result)
    }).catch((err) => {
        console.log("Error: ", err)
    })
}

function getAllProduct() {
    makeRequest("./../server/recievers/productReciever.php?action=getAll", "GET", null, (result) => {
        let table = document.getElementById("table")

        for (let i = 0; i < result.length; i++) {
            let product_id = (result[i].product_id);
            let product_cat = (result[i].product_cat);
            let product_name = (result[i].product_name);
            let description = (result[i].description);
            let quantity = (result[i].quantity);
            let unit_price = (result[i].unit_price);
            let discount = (result[i].discount);
            let image = (result[i].image);

            let row = document.createElement("tr");

            let idTd = document.createElement("td");
            let product_catTd = document.createElement("td");
            let nameTd = document.createElement("td");
            let descriptionTd = document.createElement("td");
            let quantityTd = document.createElement("td");
            let unit_priceTd = document.createElement("td");
            let discountTd = document.createElement("td");
            let imageTd = document.createElement("td");
            let deleteButton = document.createElement("button");
            let updateButton = document.createElement("button");

            row.id = product_id;
            idTd.innerText = product_id;
            product_catTd.innerText = product_cat;
            nameTd.innerText = product_name;
            descriptionTd.innerText = description;
            quantityTd.innerText = quantity;
            unit_priceTd.innerText = unit_price;
            discountTd.innerText = discount;
            imageTd.innerText = image;
            deleteButton.innerText = "Delete";
            updateButton.innerText = "Update";

            deleteButton.style.background = "#B35462";
            updateButton.style.background = "#66B375";

            deleteButton.onclick = function () {
                deleteProduct(product_id);
            }
            updateButton.onclick = function () {
                prepareUpdateProduct(result[i])
            }

            row.appendChild(idTd);
            row.appendChild(product_catTd);
            row.appendChild(nameTd);
            row.appendChild(descriptionTd);
            row.appendChild(quantityTd);
            row.appendChild(unit_priceTd);
            row.appendChild(discountTd);
            row.appendChild(imageTd);
            row.appendChild(deleteButton);
            row.appendChild(updateButton);

            table.appendChild(row);
        }
    })
}
getAllProduct();

function showAllOrderOnTable() {
    makeRequest("./../server/recievers/orderReciever.php?action=getAllOrder", "GET", null, (result) => {
        let orderTable = document.getElementById("orderTable");

        for (let i = 0; i < result.length; i++) {
            let orderId = (result[i].orderId);
            let users_id = (result[i].users_id);
            let orderDate = (result[i].orderDate);
            let shippingaddress = (result[i].shippingaddress);
            let wight = (result[i].wight);
            let total_price = (result[i].total_price);

            let row = document.createElement("tr");

            let orderIdTd = document.createElement("td");
            let users_idTd = document.createElement("td");
            let orderDateTd = document.createElement("td");
            let shippingaddressTd = document.createElement("td");
            let wightTd = document.createElement("td");
            let total_priceTd = document.createElement("td");

            orderIdTd.innerText = orderId;
            users_idTd.innerText = users_id;
            orderDateTd.innerText = orderDate;
            shippingaddressTd.innerText = shippingaddress;
            wightTd.innerText = wight;
            total_priceTd.innerText = total_price;

            row.appendChild(orderIdTd);
            row.appendChild(users_idTd);
            row.appendChild(orderDateTd);
            row.appendChild(shippingaddressTd);
            row.appendChild(wightTd);
            row.appendChild(total_priceTd);

            orderTable.appendChild(row);
        }
    })
}
showAllOrderOnTable();

function insertProduct() {
    let categorySelect = document.getElementById("categorySelect")
    let insertProductCategory = categorySelect.options[categorySelect.selectedIndex].value
    let insertProductName = document.getElementsByName("insertProductName")[0].value
    let insertDescription = document.getElementsByName("insertDescription")[0].value
    let insertQuantity = document.getElementsByName("insertQuantity")[0].value
    let insertUnitPrice = document.getElementsByName("insertUnitPrice")[0].value
    let insertDiscount = document.getElementsByName("insertDiscount")[0].value
    let insertImage = document.getElementsByName("productImg")[0].files[0]

    var data = new FormData()

    data.append("action", "add");
    data.append("product_cat", insertProductCategory);
    data.append("product_name", insertProductName);
    data.append("description", insertDescription);
    data.append("quantity", insertQuantity);
    data.append("unit_price", insertUnitPrice);
    data.append("discount", insertDiscount);
    data.append("image", insertImage);

     if (insertProductCategory == "") {
        alert("Välj category!")
    } if (insertProductName == "") {
        alert("Skriv produknamn")
    } if (insertDescription == "") {
        alert("Skriv produkt beskrivning")
    } if (insertQuantity == "") {
        alert("Ange antal för produkten du vill spara")
    } if (insertUnitPrice == "") {
        alert("Ange pris för produkten som vill spara")
    } if (insertDiscount == "") {
        alert("Ange rabat för produkten")
    } 

     makeRequest('./../server/recievers/productReciever.php', "POST", data, (result) => {
        if (result == true) {
            alert("Produkten har sparat i databasen")
        } else {
            alert("Det gick inte spara produkten försök igen!")
        }
        if (result === true) {
            location.reload();
        }
    }) 
}

function fillFormWithData(product) {
    document.getElementById("categorySelect").value = product.product_cat
    document.getElementsByName("insertProductName")[0].value = product.product_name
    document.getElementsByName("insertDescription")[0].value = product.description
    document.getElementsByName("insertQuantity")[0].value = product.quantity
    document.getElementsByName("insertUnitPrice")[0].value = product.unit_price
    document.getElementsByName("insertDiscount")[0].value = product.discount
    document.getElementsByName("productImg")[0].files[0] = product.image
};

function prepareUpdateProduct(product) {
    //console.log(product);
    productToUpdate = product
    showInsertSection();
    fillFormWithData(product);

    document.getElementById("productInsertRubric").innerText ="Uppdatera Produkt";
    const insertBtn = document.getElementById("insertProductButton");
    insertBtn.style.display = "none";
};

function updateProduct() {
 productToUpdate = {
        product_id: productToUpdate.product_id,
        product_cat: document.getElementById("categorySelect").value,
        product_name: document.getElementsByName("insertProductName")[0].value,
        description: document.getElementsByName("insertDescription")[0].value,
        quantity: document.getElementsByName("insertQuantity")[0].value,
        unit_price: document.getElementsByName("insertUnitPrice")[0].value,
        discount: document.getElementsByName("insertDiscount")[0].value,
        image:document.getElementsByName("productImg")[0].files[0]
    };

        var data = new FormData();

        data.append("action", "updateProduct");
        data.append("product_id", productToUpdate.product_id);
        data.append("product_cat", productToUpdate.product_cat);
        data.append("product_name", productToUpdate.product_name);
        data.append("description", productToUpdate.description);
        data.append("quantity", productToUpdate.quantity);
        data.append("unit_price", productToUpdate.unit_price);
        data.append("discount", productToUpdate.discount);
        data.append("image", productToUpdate.image);

    makeRequest('./../server/recievers/productReciever.php', "POST", data, (result) => {
        //console.log(result);
        if(result){
            location.reload();
            alert("Produkten har uppdaterat");
        }
    })
}

function deleteProduct(id) {
    var data = new FormData()
    data.append("action", "deleteOneProduct");
    data.append("product_id", id);

    makeRequest("./../server/recievers/productReciever.php", "POST", data, (result) => {
        if (result) {
            const row = document.getElementById(id);
            row.remove()
        }
    })
}

function deleteAllProduct() {
    var data = new FormData()
    data.append("action", "deleteAllProduct");

    makeRequest("./../server/recievers/productReciever.php", "POST", data, (result) => {
        console.log(result)
        if(result){
            location.reload();
            alert("alla produkter tagits bort");
        }
    })
}

function getAllaNewsLetter() {
    makeRequest("./../server/recievers/newsLetterReciever.php?action=getNewsUser", "GET", null, (result) => {
        let table = document.getElementById("newsLetter")

        for (let i = 0; i < result.length; i++) {
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

    makeRequest("./../server/recievers/addTonewsletterReciver.php", "POST", data, (result) => {

    })
}

function deletNewsletter() {
    let deletEmailNaewsleter = document.getElementsByName("deleteOneEmail")[0].value

    var data = new FormData()

    data.append("action", "deletNewsletter");
    data.append("deleteOneEmail", deletEmailNaewsleter);
    makeRequest("./../server/recievers/addTonewsletterReciver.php", "POST", data, (result) => {

    })
}

function getAllCategory() {
    makeRequest("./../server/recievers/getCategoryReciver.php?action=getAllCategory", "GET", null, (result) => {
        
        let selectElement = document.getElementById("categorySelect")

        for (let i = 0; i < result.length; i++) {

            let categoryName = (result[i].categoryName);

            let optionElement = document.createElement("option")
            optionElement.innerText = categoryName
            optionElement.value = result[i].category_id

            selectElement.appendChild(optionElement)
        }
    }) 
}
getAllCategory();

// ### Show ProdcutList Section ### //
function showProductList() {
    var orderList = document.getElementById("orderList");
    var insertProduct = document.getElementById("insertProduct");
    var newsLetterList = document.getElementById("listNewsLetter");

    orderList.style.display = "none";
    insertProduct.style.display = "none";
    newsLetterList.style.display = "none";

    var productList = document.getElementById("productList");
    if (productList.style.display === "none") {
        productList.style.display = "block";
    } else {
        productList.style.display = "none";
    }
}
showProductList();

// ### Show OrderList Seection ### //
function showOrderList() {
    var productList = document.getElementById("productList");
    var insertProduct = document.getElementById("insertProduct");
    var newsLetterList = document.getElementById("listNewsLetter");
    var insertCategory = document.getElementById("insertCategory");

    productList.style.display = "none";
    insertProduct.style.display = "none";
    newsLetterList.style.display = "none";
    insertCategory.style.display = "none";

    var orderList = document.getElementById("orderList");
    if (orderList.style.display === "none") {
        orderList.style.display = "block";
    } else {
        orderList.style.display = "none";
    }
}
showProductList();

// ### InsertProdukt Section ### ///
function showInsertSection() {
    var productList = document.getElementById("productList");
    var orderList = document.getElementById("orderList");
    var newsLetterList = document.getElementById("listNewsLetter");
    var insertCategory = document.getElementById("insertCategory");

    productList.style.display = "none";
    orderList.style.display = "none";
    newsLetterList.style.display = "none";
    insertCategory.style.display = "none";

    var insertProduct = document.getElementById("insertProduct");
    if (insertProduct.style.display === "none") {
        insertProduct.style.display = "block";
    } else {
        insertProduct.style.display = "none";
    }
}

// ### showNewsLetterList Section ### //
function showNewsLetterList() {
    var productList = document.getElementById("productList");
    var orderList = document.getElementById("orderList");
    var insertProduct = document.getElementById("insertProduct");
    var insertCategory = document.getElementById("insertCategory");

    productList.style.display = "none";
    orderList.style.display = "none";
    insertProduct.style.display = "none";
    insertCategory.style.display = "none";

    var newsLetterList = document.getElementById("listNewsLetter");
    if (newsLetterList.style.display === "none") {
        newsLetterList.style.display = "block";
    } else {
        newsLetterList.style.display = "none";
    }
}
// ### showshowInsertCategory Section ### //
function showInsertCategory() {
    var productList = document.getElementById("productList");
    var orderList = document.getElementById("orderList");
    var insertProduct = document.getElementById("insertProduct");
    var insertCategory = document.getElementById("insertCategory");

    productList.style.display = "none";
    orderList.style.display = "none";
    insertProduct.style.display = "none";
    insertCategory.style.display = "none";

    var insertCategory = document.getElementById("insertCategory");
    if (insertCategory.style.display === "none") {
        insertCategory.style.display = "block";
    } else {
        insertCategory.style.display = "none";
    }
}


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
            window.location = "../index.php"
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
   // console.log(inlogningEmail,inlogningPassword);
    makeRequest('../server/recievers/loginReciever.php', "POST", data, (result)=>{
        if (result) {
            window.location = "/index.php"
        } else {
            // TODO: show prompt about invalid username or password
        }
    }) 
}

// ### Serach Function For AdminPanel ### //
$(document).ready(function(){
    $("#searchInput").on("keyup", function() {
      const value = $(this).val().toLowerCase();
      $("#table tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });


  function insertCategory() {
    let insertCategoryProductt_id = document.getElementsByName("insertCategoProductID")[0].value
    let insertCategoryName = document.getElementsByName("insertCategoryName")[0].value
    let insertCategoryDescription = document.getElementsByName("insertCategoryDescription")[0].value
    
    var data = new FormData()

    data.append("action", "InsertCategory");
    data.append("productt_id", insertCategoryProductt_id);
    data.append("categoryName", insertCategoryName);
    data.append("categoryDescription", insertCategoryDescription);
 

     makeRequest('./../server/recievers/InsertCategoryReciever.php', "POST", data, (result) => {
        if(result == true){
            alert("Kategori har sparat")
            location.reload();
        }else{
            alert("Det gick inte spara kategori")
        }
    })
}
function showCategoryOnTable() {
    makeRequest("./../server/recievers/getCategoryReciver.php?action=getAllCategory", "GET", null, (result) => {
        
        let categoryTable = document.getElementById("categoryTable");

        for (let i = 0; i < result.length; i++) {
            let categoryId = (result[i].category_id);
            let producttId = (result[i].productt_id);
            let categoryName = (result[i].categoryName);
            let categoryDescription	 = (result[i].categoryDescription	);

            let row = document.createElement("tr");
            
            let categoryIdTd = document.createElement("td");
            let producttIdTd = document.createElement("td");
            let categoryNameTd = document.createElement("td");
            let categoryDescriptionTd = document.createElement("td");
            let deleteButtonForCategory = document.createElement("button");
            let updateButtonForCategory = document.createElement("button");

            row.id = categoryId;
            categoryIdTd.innerText = categoryId;
            producttIdTd.innerText = producttId;
            categoryNameTd.innerText = categoryName;
            categoryDescriptionTd.innerText = categoryDescription;
            deleteButtonForCategory.style.background = "#B35462";
            updateButtonForCategory.style.background = "#66B375";

            deleteButtonForCategory.innerText = "Delete";
            updateButtonForCategory.innerText = "Update";
            
            deleteButtonForCategory.onclick = function () {
                deleteCategory(categoryId);
            }
            updateButtonForCategory.onclick = function () {
                //prepareUpdateProduct(result[i])
            }

            row.appendChild(categoryIdTd);
            row.appendChild(producttIdTd);
            row.appendChild(categoryNameTd);
            row.appendChild(categoryDescriptionTd);
            row.appendChild(deleteButtonForCategory);
            row.appendChild(updateButtonForCategory);

            categoryTable.appendChild(row);
        }
    })

}
showCategoryOnTable();

function deleteCategory(id) {
    var data = new FormData()
    data.append("action", "deleteOneCategory");
    data.append("category_id", id);

    makeRequest("./../server/recievers/getCategoryReciver.php", "POST", data, (result) => {
        if (result) {
            const row = document.getElementById(id);
            row.remove()
        }
    })
}