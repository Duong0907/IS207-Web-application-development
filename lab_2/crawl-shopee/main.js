function CrawlDataOnePage() {
    var shopItemList = [];
    var itemList = document.querySelectorAll('.shopee-search-item-result__item a');

    for (let i = 0; i < itemList.length; i++) {
        try {
            var newShopItem = {};

            var item = itemList[i];
            var contentTag = item.children[0].children[0].children[1];

            // Get name 
            var nameTag = contentTag.children[0].children[0].children[0];
            var name = nameTag.innerText;
            newShopItem.name = name;

            // Get address
            var addressTag = contentTag.children[3];
            var address = addressTag.innerText;
            newShopItem.address = address;

            // Get price
            var priceTag = contentTag.children[1];
            var spanTags = priceTag.querySelectorAll('span');

            if (spanTags.length === 6) {
                newShopItem.fromPrice = spanTags[2].innerText;
                newShopItem.toPrice = spanTags[5].innerText;
            } else if (spanTags.length === 3) {
                var oldPrice = priceTag.children[0].innerText;
                oldPrice = oldPrice.substring(1, oldPrice.length);

                newShopItem.oldPrice = oldPrice;
                newShopItem.newPrice = spanTags[2].innerText;
            } else {
                newShopItem.price = spanTags[2].innerText;
            }
        } catch (err) {
            continue;
        }

        shopItemList.push(newShopItem);
    }
    console.log(shopItemList);
}

async function scrollToBottom(callback) {
    return new Promise(resolve => {
        var scrollId;
        var height = 0;
        var minScrollHeight = 500;
        scrollId = setInterval(function () {
            if (height <= document.body.scrollHeight) {
                window.scrollBy(0, minScrollHeight);
            }
            else {
                clearInterval(scrollId);
                callback();
                resolve();
            }
            height += minScrollHeight;
        }, 0);
    });
}

async function CrawlDataAllPage(n) {
    for (let i = 1; i <= n; i++) {
        await scrollToBottom(function () {
            console.log(`Page ${i}:`);
            CrawlDataOnePage();
            document.querySelector('.shopee-mini-page-controller__next-btn').click();
        });
    }
}

CrawlDataAllPage(5);