> Aicha diab:
<?php
class GPA_Model {
    /**
     * دالة لحساب المعدل الفصلي
     * @param array $grades مصفوفة العلامات
     * @param array $credits مصفوفة المعاملات
     * @return float المعدل النهائي مقرباً لرقمين
     */
    public static function calculate($grades, $credits) {
        $totalPoints = 0;
        $totalCredits = 0;

        // التحقق من أن المدخلات مصفوفات وليست فارغة
        if (empty($grades) || empty($credits)) {
            return 0;
        }

        foreach ($grades as $index => $grade) {
            // التأكد من وجود معامل مطابق لكل علامة لتجنب أخطاء الـ Index
            if (isset($credits[$index])) {
                $totalPoints += ($grade * $credits[$index]);
                $totalCredits += $credits[$index];
            }
        }

        if ($totalCredits > 0) {
            $gpa = $totalPoints / $totalCredits;
            // تقريب المعدل لرقمين بعد الفاصلة (مثلاً 10.55)
            return round($gpa, 2); 
        }

        return 0;
    }
}
?>

