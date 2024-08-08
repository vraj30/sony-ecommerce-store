function displayProducts(id) {
    $.ajax({
        url: 'products.php',
        type: 'post',
        data: { "id": id },
        success: function (data) {
            $("#products").html(data);
        }
    })
}