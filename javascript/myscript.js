$(document).ready(function(){
    $(".them-vao-gio-hang").click(function (event) {
        event.preventDefault();
        var masanphamjs = $(this).parent("div").parent("div").find("h5").attr("data-masanpham");
        var tensanphamjs = $(this).parent("div").parent("div").find("h5").html();
        var soluonghientai = $(".so-luong-gio-hang").html();
        var anhsanphamjs = $(this).parent("div").parent("div").parent("div").find("img").attr("src");
        var giasanphamjs = $(this).parent("div").parent("div").find(".gia-san-pham").html();
        //alert(giasanphamjs);
        //alert(".gia-san-pham");
        $.ajax({
            url: "xuligiohang.php",
            type: "post",
            datatype: "json",
            //contentType: "application/json; charset=utf-8",
            data: {
                "masanpham": masanphamjs,
                "anhsanpham": anhsanphamjs,
                "giasanpham": giasanphamjs,
            },
            success : function (data) {
                //console.log(masanphamjs);
                //alert(data[1].thongbao);
                console.log(data.thongbao);
                if(data.thongbao == 2) {
                    alert("San pham da co trong gio hang, vui long vao trang gio hang de kiem tra so luong");
                }
                else{
                    var giohang = parseInt($(".so-luong-gio-hang").html());
                    $(".so-luong-gio-hang").html(giohang +1);
                }

            },
            error: function (result) {
                alert("Co loi ajax");
                console.log(result);
            }

        })

    });

    //tang so luong
    $(".btn-tang").click(function(){
        const giagoc = $(this).parent("th").parent("tr").find(".gia-san-pham2").html();
        var somoi = parseInt($(this).parent("th").find("input").attr("value"))+1;
        $(this).parent("th").find("input").attr("value",somoi);
        var giahientai = somoi*giagoc;
        $(this).parent("th").parent("tr").find(".gia-san-pham").html(giahientai);
        var tonggia = parseInt($(".tong-gia").html());
        tonggia+=parseInt(giagoc);
        $(".tong-gia").html(tonggia);
        $(this).parent("th").find("span").html(somoi);
        }
    );
    //giam so luong
    $(".btn-giam").click(function(){
        const giagoc = $(this).parent("th").parent("tr").find(".gia-san-pham2").html();
        var somoi = parseInt($(this).parent("th").find("input").attr("value"));
        if(somoi>1){
            $(this).parent("th").find("input").attr("value",somoi-1);
            var somoi2 = parseInt($(this).parent("th").find("input").attr("value"));;
            var giahientai = somoi2*giagoc;
            $(this).parent("th").parent("tr").find(".gia-san-pham").html(giahientai);
            var tonggia = parseInt($(".tong-gia").html());
            tonggia-=parseInt(giagoc);
            $(".tong-gia").html(tonggia);
            $(this).parent("th").find("span").html(somoi2);
        }
        }
    );

    //nhap xong
    $(".so-luong-style").focusout(function () {
        var soluonghientai = parseInt($(this).parent("th").find("span").html());
        var somoi = parseInt($(this).val());
        const giagoc = parseInt($(this).parent("th").parent("tr").find(".gia-san-pham2").html());
        if(parseInt($(this).val())==$(this).val()){;
            $(this).attr("value",somoi);
            var giahientai = somoi*giagoc;
            $(this).parent("th").parent("tr").find(".gia-san-pham").html(giahientai);
            var tonggia = parseInt($(".tong-gia").html());
            var chenhlech =soluonghientai-parseInt($(this).attr("value"));
            if(chenhlech>0){
                tonggia-=(parseInt(giagoc)*(soluonghientai-parseInt($(this).attr("value"))));
            }
            if (chenhlech<0){
                tonggia+=(parseInt(giagoc)*(-chenhlech));
            }
            $(".tong-gia").html(tonggia);
            $(this).parent("th").find("span").html(somoi);
        } else{
            alert("Vui long nhap so");
        }
    });

})
