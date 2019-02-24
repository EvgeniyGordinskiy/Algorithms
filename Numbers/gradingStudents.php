<?php

function gradingStudents($grades) {
    foreach($grades as &$grade) {
        if ($newGrade = check_available_grades($grade)) {
            $grade = $newGrade;
        }
    }
    return $grades;
}

function check_available_grades($grade)
{
    $res = null;
    if ($grade >= 38 && $grade % 5 !== 0) {
        foreach(range(1,2) as $key => $check) {
            if (($grade + $check) % 5 === 0) {
                return $grade + $check;
            }
        }
    } else {
        return $grade;
    }
}