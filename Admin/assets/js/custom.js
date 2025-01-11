$(document).ready(function () {
  // Use event delegation to handle click events on dynamically generated delete buttons

  //Sweet Aler for Products
  $(document).on("click", ".delete_product", function (e) {
    e.preventDefault();
    var id = $(this).val();
    //alert(id);

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover !",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: "POST",
          url: "product_process.php",
          data: {
            'product_id': id,
            'delete_product' : true
          },
          success: function (response) {
            console.log(response);
            if (response == 200) 
            {
              swal("Success!", "Product Deleted Successfully!", "success");
              $("#products").load(location.href + " #products");
            } 
            else if(response == 500)
            {
              swal("Error!", "Error in Query!", "error");
            }
          }
        });
      }
    });
  });

  
  //sweet alert for Category
  $(document).on("click", ".delete_category", function (e) {
    e.preventDefault();
    var id = $(this).val();
    //alert(id);

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover !",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: "POST",
          url: "category_process.php",
          data: {
            'category_id': id,
            'delete_category' : true
          },
          success: function (response) {
            console.log(response);
            if (response == 200) 
            {
              swal("Success!", "Product Deleted Successfully!", "success");
              $("#category").load(location.href + " #category");
            } 
            else if(response == 500)
            {
              swal("Error!", "Error in Query!", "error");
            }
          }
        });
      }
    });
  });
});
