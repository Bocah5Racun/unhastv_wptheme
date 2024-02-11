const productItems = document.querySelectorAll(
  ".galeri-produk__carousel__item"
);

productItems.forEach((item, index) => {
  const produkImage = item.querySelector(".produk-img");
  const produkName = item.querySelector(".produk-name");
  const produkHarga = item.querySelector(".produk-harga");

  wp.ajax.post({
    type: "post",
    url: `${window.location.origin}/wp-admin/admin-ajax.php`,
    data: {
      action: "load_product",
      offset: index,
    },
    complete: (res, status) => {
      console.log(JSON.parse(res.responseText));
    },
  });
});
