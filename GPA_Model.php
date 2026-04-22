
<?php
class GPA_Model {
    // دالة لحساب المعدل الفصلي
    public static function calculate($grades, $credits) {
        $totalPoints = 0;
        $totalCredits = 0;

        foreach ($grades as $index => $grade) {
            $totalPoints += ($grade * $credits[$index]);
            $totalCredits += $credits[$index];
        }

        return ($totalCredits > 0) ? ($totalPoints / $totalCredits) : 0;
    }
}
?>
