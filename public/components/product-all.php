<?php
// var global
$keywords = getGET('kw');
$pagination = 1;
// get full products 
$sqlGetFullProducts = 'SELECT * FROM sanpham, danhmuc WHERE danhmuc.id_danhmuc= sanpham.id_danhmuc && danhmuc.show_danhmuc = 1 && sanpham.show_sanpham = 1 ';
if ($keywords) $sqlGetFullProducts .= " && sanpham.tensanpham LIKE '%$keywords%' ";
$sqlGetFullProducts .= "ORDER BY sanpham.ngaytao DESC limit 3";
$listFullProduct = executeResult($sqlGetFullProducts);


?>

<div class="product-all-container">
    <link rel="stylesheet" href="../access/css/product-all.css">
    <div class="product-all_filter">
        <hr>
        <h4>TẤT CẢ SẢN PHẨM</h4>
        <hr>
        <form action="">
            <select class="custom-select mr-sm-2" id="filter-price">
                <option value="0">Sắp xếp giá</option>
                <option value="1">Từ thấp đến cao</option>
                <option value="2">Từ cao đến thấp</option>
            </select>
        </form>
        <hr>
    </div>
    <?php
    if (!$listFullProduct) {
        echo '    <p><i>Không tìm thấy kết quả cho từ khóa "' . $keywords . '" </i></p>
        ';
    }
    ?>
    <div class="products-all_flex">
        <?php
        // if ($listFullProduct) {
        //     foreach ($listFullProduct as $data) {
        //         echo ' 
        //         <div class="product-all_item">
        //             <div class="product-all_image">
        //                 <a href="?page=product&id=' . $data['id_sanpham'] . '">
        //                     <img src="' . $targetDir . $data['anhsanpham1'] . '" alt="">
        //                     <img src="' . $targetDir . $data['anhsanpham2'] . '" alt="">
        //                 </a>
        //             </div>
        //             <div class="product-all_des">
        //                 <h6><a href="?page=product&id=' . $data['id_sanpham'] . '">' . $data['tensanpham'] . '</a></h6>
        //                 <div class="product-all_discount">
        //                     ';
        //         if ($data['giacu']) {
        //             echo '<p class="discount">' . $data['giacu'] . 'đ   </p>';
        //         }
        //         echo '
        //                     <p>' . number_format($data['giamoi']) . 'đ</p>
        //                 </div>
        //             </div>
        //         </div>';
        //     }
        // }
        ?>
    </div>
    <center><button id="pagination">Tải thêm...</button></center>
</div>
<script>
$(document).ready(function() {
    let txtSearchTop = $('#search-top').val();



    // const abc = document.getElementsByClassName('product-all_item')
    // console.log(abc);
    // selFilterPrice.change(function() {
    //     let filterPriceElement = document.getElementsByClassName('product-all_item');
    //     console.log(filterPriceElement.sort());
    // })

    var indexPagination = 1;


    $('#filter-price').change(function() {
        $('.products-all_flex').html('')

        $('.products-all_flex').ready(function() {
            $.get({
                url: '../controller/public/ajax_products-pagination.php',
                data: {
                    selFilterPrice: $('#filter-price').val(),
                    txtSearchTop,
                    indexPagination: 1
                },
                beforeSend: function() {
                    const loader = `<div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    </div>`;
                    $('center').append(loader);
                },
                success: function(data) {
                    $('.products-all_flex').append(data)
                    $('.justify-content-center').remove();
                }
            });
        })
    })
    $('.products-all_flex').ready(function() {
        $.get({
            url: '../controller/public/ajax_products-pagination.php',
            data: {
                selFilterPrice: $('#filter-price').val(),
                txtSearchTop,
                indexPagination: 1
            },
            beforeSend: function() {
                const loader = `<div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    </div>`;
                $('center').append(loader);
            },
            success: function(data) {
                $('.products-all_flex').append(data)
                $('.justify-content-center').remove();
            }
        });
    })

    $('#pagination').click((event) => {
        event.preventDefault();
        indexPagination++
        $.get({
            url: '../controller/public/ajax_products-pagination.php',
            data: {
                selFilterPrice: $('#filter-price').val(),
                txtSearchTop,
                indexPagination
            },
            beforeSend: function() {
                const loader = `<div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    </div>`;
                $('center').append(loader);
            },
            success: function(data) {
                $('.products-all_flex').append(data)
                $('.justify-content-center').remove();
                if (!data) {
                    $('center').html('');
                }
            }
        });
    })
    // $('#filter-price').change(function() {
    //     console.log($('#filter-price').val());
    // const selFilterPrice = $('#filter-price').val();
    //     $.get({
    //         url: '../controller/public/ajax_products-pagination.php',
    //         data: {
    //             txtSearchTop,
    //             indexPagination: 1,
    //             selFilterPrice
    //         },
    //         beforeSend: function() {
    //             const loader = `<div class="d-flex justify-content-center">
    //                 <div class="spinner-border" role="status">
    //                     <span class="sr-only">Loading...</span>
    //                 </div>
    //                 </div>`;
    //             $('center').append(loader);
    //         },
    //         success: function(data) {
    //             $('.products-all_flex').html('');
    //             $('.products-all_flex').append(data)
    //             $('.justify-content-center').remove();
    //         }
    //     });

    // })
})
</script>