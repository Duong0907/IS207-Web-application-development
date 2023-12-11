function search(keyword, callback) {
    var xhr = new XMLHttpRequest();

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            callback(JSON.parse(this.responseText));
        }
    });

    xhr.open("POST", "/api/search");
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(JSON.stringify({
        "keyword": keyword
    }));
}

function newProductElement(ImageLink, ProductName, SalePrice) {
    let newElement = document.createElement('div');
    newElement.classList.add('col-md-4', 'col-sm-6', 'col-xs-12', 'thumbnail');
    newElement.innerHTML = `
        <img class='img-responsive' src='${ImageLink}'>
        <p class='product-name'> ${ProductName}</p>
        <p class='product-price'> ${SalePrice}</p>
    `
    return newElement;
}

function newProductElementsList(result) {
    let productListContainer = document.getElementById('search-result');

    // Clear previous result
    productListContainer.innerHTML = '';
    result.forEach(element => {
        const productElement = newProductElement(element['ImageLink'], element['ProductName'], element['SalePrice']);
        productListContainer.appendChild(productElement);
    });
}

const searchInput = document.getElementById('keyword');
searchInput.onkeydown = function(e) {
    if (e.code === 'Enter') {
        let keyword = e.target.value.trim();
        search(keyword, newProductElementsList);
    }
}

const searchBtn = document.querySelector('.input-group-btn');
searchBtn.onclick = function(e) {
    let keyword = searchInput.value.trim();
    search(keyword, newProductElementsList);
}