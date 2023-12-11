const updateBtn = document.querySelector('button[type="submit"]');
const form = document.querySelector('form');

updateBtn.onclick = function(e) {
    e.preventDefault();
    let ok = confirm("Bạn có chắc chắn muốn sửa?");
    if (ok) {
        form.submit();
    }
}