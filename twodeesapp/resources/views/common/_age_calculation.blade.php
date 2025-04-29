@php
    function calculate_age($dateOfBirth) {
        $dobUnixTimestamp = strtotime($dateOfBirth);
        $age = intval(date('Y', time() - $dobUnixTimestamp)) - 1970;
        return $age;
    }
@endphp