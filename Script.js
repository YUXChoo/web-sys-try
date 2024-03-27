document.addEventListener('DOMContentLoaded', function() {
    const productID = new URLSearchParams(window.location.search).get('id');

    fetch(`php/fetch_product_details.php?id=${productID}`)
    .then(response => response.json())
    .then(data => {
        document.getElementById('productName').innerText = data.name;
        document.getElementById('productDescription').innerText = data.description;
        document.getElementById('productPrice').innerText = `$${data.price}`;
        document.getElementById('productImage').src = data.image_url;
        document.getElementById('productImage').alt = data.name;
    })
    .catch(error => console.error('Error:', error));
});