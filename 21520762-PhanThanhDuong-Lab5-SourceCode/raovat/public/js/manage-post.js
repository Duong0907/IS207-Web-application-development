const deleteBtns = document.getElementsByClassName('delete-btn');

for (let i = 0; i < deleteBtns.length; i++) {
    deleteBtns[i].onclick = function(e) {
        e.preventDefault();
        let ok = confirm("Bạn có chắc chắn muốn xóa?");
        if (ok) {
            const form = e.target.parentElement;
            form.submit();
        }
    }
}