// add if to delete
$(".btn-delete").click((e) => {
    if (!confirm("Ви точно хочете це видалити")) {
        e.preventDefault()
    }
})

// add class to sidebar
$(function ($) {
    let url = window.location.href
    $(".menu-item a").each(function () {
        if (this.href === url) {
            $(this).closest("li").addClass("active")
        }
    })
})

//
$("#uploadImg").change(function () {
    let reader = new FileReader()
    reader.onload = (e) => {
        $("#preview-image").html(`<img  alt="preview image" src="${e.target.result}" style="max-height: 250px;">`)
    }

    // 
    reader.readAsDataURL(this.files[0])
})
