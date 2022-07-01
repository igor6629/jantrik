<!-- Визуализация добавления товара -->
$('#editor1').summernote();

<!-- Подтверждение удаления -->
$('.delete').click(function (){
    let res = confirm("Подтвердите действие");
    if (!res) return false;
});

<!-- Активные ссылки в сайдбаре -->
$('.nav-sidebar a').each(function(){
    let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
    let link = this.href;
    if (link == location){
        $(this).addClass('active');
        $(this).closest('.open').addClass('menu-open');
    }
})

/* Связанные товары */
$(".select2").select2({
    placeholder: "Название товара",
    //minimumInputLength: 2,
    cache: true,
    ajax: {
        url: adminpath + "/product/related-product",
        delay: 250,
        dataType: 'json',
        data: function (params) {
            return {
                q: params.term,
                page: params.page
            };
        },
        processResults: function (data, params) {
            return {
                results: data.items,
            };
        },
    },
});

// Удаление картинки галереи
$('.del-item').on('click', function (){
    let res = confirm("Подтвердите действие");
    if (!res) return false;
    let $this = $(this);
    let id = $this.data('id');
    let src = $this.data('src');
    $.ajax({
        url: adminpath + '/product/delete-gallery',
        data: {id: id, src: src},
        type: 'POST',
        beforeSend: function (){
            $this.closest('.file-upload').find('.overlay').css({'display':'block', 'margin': '0 auto'});
        },
        success: function (res){
            setTimeout(function(){
                $this.closest('.file-upload').find('.overlay').css({'display':'none'});
                if (res == 1){
                    $this.fadeOut();
                }
            }, 1000);
        },
        error: function (error){
            setTimeout(function(){
                $this.closest('.file-upload').find('.overlay').css({'display':'none'});
                alert('Ошибка');
            }, 1000);
        }
    });
});

/* Загрузка картинок
    let buttonSingle = document.getElementById("single");
*/
if($('div').is('#single')){
    var buttonSingle = $("#single"),
        buttonMulti = $("#multi"),
        file;
}
if(buttonSingle){
    new AjaxUpload(buttonSingle, {
        action: adminpath + buttonSingle.data('url') + "?upload=1",
        data: {name: buttonSingle.data('name')},
        name: buttonSingle.data('name'),
        onSubmit: function(file, ext){
            if (! (ext && /^(jpg|png|jpeg|gif)$/i.test(ext))){
                alert('Ошибка! Разрешены только картинки');
                return false;
            }
            buttonSingle.closest('.file-upload').find('.overlay').css({'display':'block', 'margin': '0 auto'});
        },
        onComplete: function(file, response){
            setTimeout(function(){
                buttonSingle.closest('.file-upload').find('.overlay').css({'display':'none'});
                response = JSON.parse(response);
                $('.' + 'single').html('<img src="/images/product/' + response.file + '" style="max-height: 150px; display: block; margin: 0 auto">');
            }, 1000);
        }
    });
}

if(buttonMulti){
    new AjaxUpload(buttonMulti, {
        action: adminpath + buttonMulti.data('url') + "?upload=1",
        data: {name: buttonMulti.data('name')},
        name: buttonMulti.data('name'),
        onSubmit: function(file, ext){
            if (! (ext && /^(jpg|png|jpeg|gif)$/i.test(ext))){
                alert('Ошибка! Разрешены только картинки');
                return false;
            }
            buttonMulti.closest('.file-upload').find('.overlay').css({'display':'block','margin:' : '0 auto'});

        },
        onComplete: function(file, response){
            setTimeout(function(){
                buttonMulti.closest('.file-upload').find('.overlay').css({'display':'none'});

                response = JSON.parse(response);
                $('.' + buttonMulti.data('name')).append('<img src="/images/product/' + response.file + '" style="max-height: 150px;" >');
            }, 1000);
        }
    });
}

// Модификатор товара
const mods = document.getElementById('modification')
const title = document.getElementById('mod_title');
const price = document.getElementById('mod_price');
const btn = document.getElementById('mods');
const btnDelete = document.getElementById('mods_delete');

if (mods){
    btn.addEventListener('click', function (){
        let cloneTitle = title.cloneNode(true);
        let clonePrice = price.cloneNode(true);
        mods.appendChild(cloneTitle);
        mods.appendChild(clonePrice);
    })
btnDelete.addEventListener('click', function (){
    title.remove();
    price.remove();
    btn.remove();
    btnDelete.remove();
})

}
