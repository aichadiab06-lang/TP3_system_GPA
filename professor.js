
document.addEventListener('DOMContentLoaded', function() {
    console.log("نظام إدارة الجامعة جاهز للعمل");

    const semesterSelect = document.getElementById('semester');
    const coursesContainer = document.querySelector('.box-container');

    if(semesterSelect) {
        semesterSelect.addEventListener('change', function() {
            const selectedSemester = this.value;
            
            // إضافة تأثير بصري بسيط عند التغيير
            if(coursesContainer) {
                coursesContainer.style.opacity = '0.5';
                
                // محاكاة جلب البيانات (يمكنكِ لاحقاً ربطها بـ AJAX)
                setTimeout(() => {
                    console.log('تم تحديث المواد للسداسي: ' + selectedSemester);
                    coursesContainer.style.opacity = '1';
                }, 300);
            }

            // إذا أردتِ إظهار رسالة بسيطة للمستخدم في الصفحة بدل alert الممل
            const statusMsg = document.querySelector('.status-message');
            if(statusMsg) {
                statusMsg.textContent = 'أنت تشاهد الآن مواد السداسي: ' + selectedSemester;
            }
        });
    }
});

