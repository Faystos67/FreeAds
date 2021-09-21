$(document).ready(function () {
    $('.delete-ad').click(function () {
        let href = $(this).attr('data-attr')
        $("#post-delete").attr("action", href)
    })
})
