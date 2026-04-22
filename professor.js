document.addEventListener('DOMContentLoaded', function() {
    console.log("نظام إدارة الجامعة جاهز");

    const semesterSelect = document.getElementById('semester');
    if(semesterSelect) {
        semesterSelect.addEventListener('change', function() {
            // هنا يتم جلب المواد التابعة للسداسي المختار
            alert('تم اختيار السداسي: ' + this.value);
        });
    }
});
